<?php
/**
 * Created by PhpStorm.
 * User: Kushan
 * Date: 2016-12-16
 * Time: AM 9.35
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Users;
use AppBundle\Form\UsersForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class SecurityController extends Controller
{

    /**
     * @Route("/sign-in", name="sign_in")
     */
    public function signInAction()
    {
        $authenticationUtils = $this->get('security.authentication_utils');
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
            'SignIn/sign_in.html.twig',
            array(
                // last username entered by the user
                'last_username' => $lastUsername,
                'error'         => $error,
                'page_title'=>'login'
            )
        );
    }

    /**
     * @Route("/sign-up", name="sign_up")
     */
    public function signUpAction(Request $request)
    {
        // 1) build the form
        $user = new Users();

        $form = $this->createForm(UsersForm::class, $user);


        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $this->get('security.password_encoder')->encodePassword($user, $user->getPassword());
            $user->setPassword($password);

            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('dashboard_view');
        }

        return $this->render(
            'SignIn/sign_up.html.twig',
            array('form' => $form->createView())
        );
    }
    /**
     * @Route("/forgot-password", name="forgot_password")
     */
    public function forgotPasswordAction(Request $request)
    {
        if($request->isMethod('POST')){
            $identify = $request->get('identify');
            $user = $this->getRepository('User')->loadUserByUsername($identify);

            if(isset($user)){
                $identification_key = sha1((new \DateTime('now'))->format('Y-m-d H:i:s'));
                $user->setIdentificationKey($identification_key);
                $rand = rand(1000,10000);
                $user->setActivationCode($rand);
                $this->insert($user);

                // send validation code
                $validationMethod = $user->getValidateMethod();
                switch ($validationMethod){
                    case 'MOBILE':
                        $provider = $this->get('app.smsService')->getServiceProviderByName('MOBITEL');
                        $status = $provider->sendSMS('Your account identification code is : '.$rand,$user->getMobile());
                        if($status != 200){
                            $this->addFlash(
                                'error',
                                'An error occurred while sending the SMS. Please contact our call center for assistance.'
                            );
                        }
                        break;

                    case 'EMAIL':
                        // send activation email
                        $obj = new \stdClass();
                        $obj->to = $user->getEmail();
                        $obj->code = $rand;
                        $obj->username = $user->getUsername();
                        $this->get('app_mailer')->sendIdentificationEmail($obj);
                        break;
                }

                return $this->redirectToRoute('forgot_password_confirm_user',array('key'=>$identification_key));
            }
            else{
                $this->addFlash(
                    'error',
                    'Your username is incorrect'
                );
            }
        }
        return $this->render('Login/forgot_password.html.twig');
    }


    /**
     * @Route("/google-validate", name="google_validate")
     */
    public function googleValidate(Request $request)
    {
        if($request->isMethod('POST')){
            $id_token = $request->get('idtoken');
            $result = json_decode(file_get_contents('https://www.googleapis.com/oauth2/v3/tokeninfo?id_token='.$id_token));

            $user = $this->getDoctrine()->getRepository('AppBundle:Users')->findOneBy(array('googleID'=>$result->sub));
            if(isset($user)){
                $token = new UsernamePasswordToken($user, null, 'main',$user->getRoles());
                $this->get('security.token_storage')->setToken($token);
                $this->get('session')->set('_security_main', serialize($token));
                return $this->redirectToRoute('new_dashboard');
            }else{
                $user = new Users();
                $em = $this->getDoctrine()->getManager();
                if(isset($result->email)){
                    $existEmailUser = $this->getDoctrine()->getRepository('AppBundle:Users')->findOneBy(array('email'=>$result->email));
                    if(isset($existEmailUser)){
                        if(!$existEmailUser->getStatus()){
                            $existEmailUser->setStatus(1);
                        }

                        $existEmailUser->setGoogleId($result->sub);
                        $token = new UsernamePasswordToken($existEmailUser, null, 'main', $existEmailUser->getRoles());
                        $this->get('security.token_storage')->setToken($token);
                        $this->get('session')->set('_security_main', serialize($token));
                        return $this->redirectToRoute('new_dashboard');
                    }
                    else{
                        $user->setEmail($result->sub.'@google.com');
                        $user->setName($result->name);
                        $user->setUsername($result->sub);
                        $user->setGoogleID($result->sub);

                        $user->setStatus(1);
                        $encoder = $this->container->get('security.password_encoder');
                        $encoded = $encoder->encodePassword($user, rand(1000,10000));
                        $user->setPassword($encoded);


                        $em->persist($user);
                        $em->flush();
                        $token = new UsernamePasswordToken($user, null, 'main', $user->getRoles());
                        $this->get('security.token_storage')->setToken($token);
                        $this->get('session')->set('_security_main', serialize($token));
                        return $this->redirectToRoute('new_dashboard');
                    }

                }

            }
        }
        return $this->redirectToRoute('sign_in');

    }
}
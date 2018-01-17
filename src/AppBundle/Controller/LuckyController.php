<?php
/**
 * Created by PhpStorm.
 * User: Kushan
 * Date: 2018-01-01
 * Time: PM 3.07
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends Controller
{
    /**
     * @Route("/lucky/number")
     */
    public function numberAction()
    {
        $number = mt_rand(0, 100);

        /*return $this->render('Lucky/number.html.twig',array(
            'number'=> $number,
        )

    );*/
        return $this->render('SignIn\sign_in.html.twig'

        );
    }
}
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

class DashboardController extends Controller
{


    /**
     * @Route("/dashboard/view",name="dashboard_view")
     */
    public function dashboardViewAction()
    {

        $centralNodeCount=0;
        $activeCentralNodeCount=0;
        $agNodeCount=0;
        $activeAGNodeCount=0;
        $ugNodeCount=0;
        $activeUGNodeCount=0;

        $centarlNodeArray=[];
        $agNodeArray=[];
        $ugNodeArray=[];

        $user= $this->getUser();

        $allCentralNodes=$this->getDoctrine()->getRepository('AppBundle:CentralNode')->findBy(
            array('userId' => $user)
        );
        $allAGNodes=$this->getDoctrine()->getRepository('AppBundle:AGNode')->findBy(
            array('userId' => $user)
        );
        $allUGNodes=$this->getDoctrine()->getRepository('AppBundle:UGNode')->findBy(
            array('userId' => $user)
        );
        foreach ($allCentralNodes as $cn){
            $centralNodeCount+=1;
            if(($cn->getDeleteStatus())==0){
                $activeCentralNodeCount+=1;
            }
        }
        foreach ($allAGNodes as $agn){
            $agNodeCount+=1;
            if(($agn->getDeleteStatus())==0){
                $activeAGNodeCount+=1;
            }
        }

        $centarlNodeArray[]=$centralNodeCount;
        $centarlNodeArray[]=$activeCentralNodeCount;
        $agNodeArray[]=$agNodeCount;
        $agNodeArray[]=$activeAGNodeCount;


        foreach ($allUGNodes as $items){
            $ugNodeCount+=1;
            if(($items->getDeleteStatus())==0){
                $activeUGNodeCount+=1;
            }

            $tempArray=array();
            $vwcArray=array();
            $rssiArray=array();
            $lqiArray=array();

            $finalObj = new \stdClass();

            $ugNode= $items->getId();
            $sensorData=$this->getDoctrine()->getRepository('AppBundle:SensorData')->findBy(
                array('underGroundNodeId'=>$ugNode)
            );

            foreach ($sensorData as $item){
                $ugnId=$item->getUnderGroundNodeId();
                $agnId = $ugnId->getAboveGroundNodeId();
                $cnId = $ugnId->getCentralNodeId();
                $sensorId =$ugnId->getId();
                $centalNodeId =$cnId->getCentralNodeId();
                $aboveGroundNodeId =$agnId->getAboveGroundNodeId();
                $tempArray[]=$item->getTemperature();
                $vwcArray[]=$item->getVwc();
                $rssiArray[]=$item->getRssi();
                $lqiArray[]=$item->getLqi();

                $sensorDataArray = new \stdClass();
                $sensorDataArray->ug_node_id =$ugnId;
                $sensorDataArray->vwc = $item->getVwc();
                $sensorDataArray->temperature = $item->getTemperature();
                $sensorDataArray->central_node_id=$ugnId->getAboveGroundNodeId();
                $sensorDataArray->ag_node_id=$ugnId->getCentralNodeId();
//            $sensorDataArray->user_id= $item->getUserId();
                $sensorDataArray->rssi= $item->getRssi();
                $sensorDataArray->lqi= $item->getLqi();
                $sensorDataArray->tra= $item->getTra();
                $sensorDataArray->trrs= $item->getTrrs();
                $sensorDataArray->trr= $item->getTrr();
                $sensorDataArray->cra= $item->getCra();
                $sensorDataArray->crs= $item->getCrs();
                $sensorDataArray->crr= $item->getCrr();
                $sensorDataArray->smr= $item->getSmr();
                $sensorDataArray->caf= $item->getCaf();
                $sensorDataArray->af= $item->getAf();
                $sensorDataArray->otf= $item->getOtf();
                $sensorDataArray->rdf= $item->getRdf();
                $sensorDataArray->tef= $item->getTef();
                $sensorDataArray->tte= $item->getTte();
                $sensorDataArray->tto= $item->getTto();

            }
            $finalObj->sensorId = $sensorId;
            $finalObj->underGroundNodeId = $ugnId->getUnderGroundNodeId();
            $finalObj->centalNodeId = $centalNodeId;
            $finalObj->aboveGroundNodeId = $aboveGroundNodeId;
            $finalObj->sensorData = $sensorDataArray;
            $finalObj->temperatureData =$tempArray;
            $finalObj->vwcData =$vwcArray;
            $finalObj->rssiData =$rssiArray;
            $finalObj->lqiData =$lqiArray;

            $dataArray[]=$finalObj;
        }
        $ugNodeArray[]=$ugNodeCount;
        $ugNodeArray[]=$activeUGNodeCount;
        return $this->render('Graphs\graphs.html.twig',array(
            'user'=>$user,
            'central'=>$centarlNodeArray,
            'aboveground'=>$agNodeArray,
            'underground'=>$ugNodeArray,
            'arr'=>$dataArray,
        ));
    }

    /**
     * @Route("/dashboard/graphs",name="dashboard_graphs")
     */
    public function graphsViewAction()
    {
        return $this->render('Graphs\graphs.html.twig');

    }


    /**
     * @Route("/dashboard/tables",name="dashboard_tables")
     */
    public function tablesViewAction()
    {

        $centralNodeCount=0;
        $activeCentralNodeCount=0;
        $agNodeCount=0;
        $activeAGNodeCount=0;
        $ugNodeCount=0;
        $activeUGNodeCount=0;

        $centarlNodeArray=[];
        $agNodeArray=[];
        $ugNodeArray=[];

        $user= $this->getUser();

        $allCentralNodes=$this->getDoctrine()->getRepository('AppBundle:CentralNode')->findBy(
            array('userId' => $user)
        );
        $allAGNodes=$this->getDoctrine()->getRepository('AppBundle:AGNode')->findBy(
            array('userId' => $user)
        );
        $allUGNodes=$this->getDoctrine()->getRepository('AppBundle:UGNode')->findBy(
            array('userId' => $user)
        );
        foreach ($allCentralNodes as $cn){
            $centralNodeCount+=1;
            if(($cn->getDeleteStatus())==0){
                $activeCentralNodeCount+=1;
            }
        }
        foreach ($allAGNodes as $agn){
            $agNodeCount+=1;
            if(($agn->getDeleteStatus())==0){
                $activeAGNodeCount+=1;
            }
        }

        $centarlNodeArray[]=$centralNodeCount;
        $centarlNodeArray[]=$activeCentralNodeCount;
        $agNodeArray[]=$agNodeCount;
        $agNodeArray[]=$activeAGNodeCount;


        foreach ($allUGNodes as $items){
            $ugNodeCount+=1;
            if(($items->getDeleteStatus())==0){
                $activeUGNodeCount+=1;
            }

            $tempArray=array();
            $vwcArray=array();
            $rssiArray=array();
            $lqiArray=array();

            $finalObj = new \stdClass();

            $ugNode= $items->getId();
            $sensorData=$this->getDoctrine()->getRepository('AppBundle:SensorData')->findBy(
                array('underGroundNodeId'=>$ugNode)
            );

            foreach ($sensorData as $item){
                $ugnId=$item->getUnderGroundNodeId();
                $agnId = $ugnId->getAboveGroundNodeId();
                $cnId = $ugnId->getCentralNodeId();
                $sensorId =$ugnId->getId();
                $centalNodeId =$cnId->getCentralNodeId();
                $aboveGroundNodeId =$agnId->getAboveGroundNodeId();
                $tempArray[]=$item->getTemperature();
                $vwcArray[]=$item->getVwc();
                $rssiArray[]=$item->getRssi();
                $lqiArray[]=$item->getLqi();

                $sensorDataArray = new \stdClass();
                $sensorDataArray->ug_node_id =$ugnId;
                $sensorDataArray->vwc = $item->getVwc();
                $sensorDataArray->temperature = $item->getTemperature();
                $sensorDataArray->central_node_id=$ugnId->getAboveGroundNodeId();
                $sensorDataArray->ag_node_id=$ugnId->getCentralNodeId();
//            $sensorDataArray->user_id= $item->getUserId();
                $sensorDataArray->rssi= $item->getRssi();
                $sensorDataArray->lqi= $item->getLqi();
                $sensorDataArray->tra= $item->getTra();
                $sensorDataArray->trrs= $item->getTrrs();
                $sensorDataArray->trr= $item->getTrr();
                $sensorDataArray->cra= $item->getCra();
                $sensorDataArray->crs= $item->getCrs();
                $sensorDataArray->crr= $item->getCrr();
                $sensorDataArray->smr= $item->getSmr();
                $sensorDataArray->caf= $item->getCaf();
                $sensorDataArray->af= $item->getAf();
                $sensorDataArray->otf= $item->getOtf();
                $sensorDataArray->rdf= $item->getRdf();
                $sensorDataArray->tef= $item->getTef();
                $sensorDataArray->tte= $item->getTte();
                $sensorDataArray->tto= $item->getTto();

            }
            $finalObj->sensorId = $sensorId;
            $finalObj->underGroundNodeId = $ugnId->getUnderGroundNodeId();
            $finalObj->centalNodeId = $centalNodeId;
            $finalObj->aboveGroundNodeId = $aboveGroundNodeId;
            $finalObj->sensorData = $sensorDataArray;
            $finalObj->temperatureData =$tempArray;
            $finalObj->vwcData =$vwcArray;
            $finalObj->rssiData =$rssiArray;
            $finalObj->lqiData =$lqiArray;

            $dataArray[]=$finalObj;
        }
        $ugNodeArray[]=$ugNodeCount;
        $ugNodeArray[]=$activeUGNodeCount;

        return $this->render('Graphs\tables.html.twig',array(
            'user'=>$user,
            'central'=>$centarlNodeArray,
            'aboveground'=>$agNodeArray,
            'underground'=>$ugNodeArray,
            'arr'=>$dataArray,
        ));

    }

}
<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/api/getdata", name="get_data")
     */
    public function getDataAction(){
        $connectedUGNodes=[];
//        $allUGNodes=$this->getDoctrine()->getRepository('AppBundle:UGNode')->findAll();
        $connectedUGNodes[]=$this->getDoctrine()->getRepository('AppBundle:SensorData')->findOneBy(
            array('underGroundNodeId'=>1)
        );
        $connectedUGNodes[]=$this->getDoctrine()->getRepository('AppBundle:SensorData')->findOneBy(
            array('underGroundNodeId'=>2)
        );
        $connectedUGNodes[]=$this->getDoctrine()->getRepository('AppBundle:SensorData')->findOneBy(
            array('underGroundNodeId'=>3)
        );

//        var_dump($connectedUGNodes);
//        exit();
        $allSensorData=$this->getDoctrine()->getRepository('AppBundle:SensorData')->findAll();

        $dataArray=[];
        $count =0;

        foreach ($connectedUGNodes as $items){
            $ugId=$items->getUnderGroundNodeId();
            $ugNode=$ugId->getId();
            $count+=1;
            $tempArray=array();
            $vwcArray=array();
            $rssiArray=array();
            $lqiArray=array();
            $finalObj = new \stdClass();
//            $ugNode= $items->getId();
            $sensorData=$this->getDoctrine()->getRepository('AppBundle:SensorData')->findBy(
                array('underGroundNodeId'=>$ugNode)
            );

            foreach ($sensorData as $item){
                $tt=($item->getUnderGroundNodeId());
                $sensorId =$tt->getId();
                $tempArray[]=$item->getTemperature();
                $vwcArray[]=$item->getVwc();
                $rssiArray[]=$item->getRssi();
                $lqiArray[]=$item->getLqi();

                $sensorDataArray = new \stdClass();
                $sensorDataArray->ug_node_id = $item->getUnderGroundNodeId();
                $sensorDataArray->vwc = $item->getVwc();
                $sensorDataArray->temperature = $item->getTemperature();
//            $ugNodeArray->central_node_id=$item->getCentralNodeId();
//            $ugNodeArray->ag_node_id= $item->getAboveGroundNodeId();
//            $ugNodeArray->user_id= $item->getUserId();
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
            $finalObj->sensorData = $sensorDataArray;
            $finalObj->temperatureData =$tempArray;
            $finalObj->vwcData =$vwcArray;
            $finalObj->rssiData =$rssiArray;
            $finalObj->lqiData =$lqiArray;

            $dataArray[]=$finalObj;
        }

        return new JsonResponse($dataArray);
    }

}

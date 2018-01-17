<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SensorData
 *
 * @ORM\Table(name="sensor_data")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SensorDataRepository")
 */
class SensorData
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="vwc", type="integer", length=10)
     */
    private $vwc;

    /**
     * @var string
     *
     * @ORM\Column(name="rssi", type="integer", length=10)
     */
    private $rssi;

    /**
     * @var string
     *
     * @ORM\Column(name="lqi", type="integer", length=10)
     */
    private $lqi;

    /**
     * @var string
     *
     * @ORM\Column(name="tra", type="integer", length=10)
     */
    private $tra;

    /**
     * @var string
     *
     * @ORM\Column(name="trrs", type="integer", length=10)
     */
    private $trrs;

    /**
     * @var string
     *
     * @ORM\Column(name="trr", type="integer", length=10)
     */
    private $trr;

    /**
     * @var string
     *
     * @ORM\Column(name="cra", type="integer", length=10)
     */
    private $cra;

    /**
     * @var string
     *
     * @ORM\Column(name="crs", type="integer", length=10)
     */
    private $crs;

    /**
     * @var string
     *
     * @ORM\Column(name="crr", type="integer", length=10)
     */
    private $crr;

    /**
     * @var string
     *
     * @ORM\Column(name="smr", type="integer", length=10)
     */
    private $smr;

    /**
     * @var string
     *
     * @ORM\Column(name="caf", type="integer", length=10)
     */
    private $caf;

    /**
     * @var string
     *
     * @ORM\Column(name="af", type="integer", length=10)
     */
    private $af;

    /**
     * @ORM\Column(name="datetime", type="datetime")
     */
    private $datetime;

    /**
     * @var string
     *
     * @ORM\Column(name="otf", type="integer", length=10)
     */
    private $otf;

    /**
     * @var string
     *
     * @ORM\Column(name="rdf", type="integer", length=10)
     */
    private $rdf;

    /**
     * @var string
     *
     * @ORM\Column(name="tef", type="integer", length=10)
     */
    private $tef;

    /**
     * @var string
     *
     * @ORM\Column(name="tte", type="integer", length=10)
     */
    private $tte;

    /**
     * @var string
     *
     * @ORM\Column(name="tto", type="integer", length=10)
     */
    private $tto;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="temperature", type="integer", length=10)
     */
    private $temperature;

//    /**
//     * @var \CENTRALNODE
//     *
//     * @ORM\ManyToOne(targetEntity="CentralNode", inversedBy="sensorData")
//     * @ORM\JoinColumns({
//     *   @ORM\JoinColumn(name="central_node_id", referencedColumnName="id")
//     * })
//     */
//    private $centralNodeId;
//
//    /**
//     * @var \ABOVEGROUNDNODE
//     *
//     * @ORM\ManyToOne(targetEntity="AGNode", inversedBy="sensorData")
//     * @ORM\JoinColumns({
//     *   @ORM\JoinColumn(name="above_ground_node_id", referencedColumnName="id")
//     * })
//     */
//    private $aboveGroundNodeId;

    /**
     * @var \UNDERGROUNDNODE
     *
     * @ORM\ManyToOne(targetEntity="UGNode", inversedBy="sensorData")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="under_ground_node_id", referencedColumnName="id")
     * })
     */
    private $underGroundNodeId;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set vwc
     *
     * @param integer $vwc
     *
     * @return SensorData
     */
    public function setVwc($vwc)
    {
        $this->vwc = $vwc;

        return $this;
    }

    /**
     * Get vwc
     *
     * @return integer
     */
    public function getVwc()
    {
        return $this->vwc;
    }

    /**
     * Set rssi
     *
     * @param integer $rssi
     *
     * @return SensorData
     */
    public function setRssi($rssi)
    {
        $this->rssi = $rssi;

        return $this;
    }

    /**
     * Get rssi
     *
     * @return integer
     */
    public function getRssi()
    {
        return $this->rssi;
    }

    /**
     * Set lqi
     *
     * @param integer $lqi
     *
     * @return SensorData
     */
    public function setLqi($lqi)
    {
        $this->lqi = $lqi;

        return $this;
    }

    /**
     * Get lqi
     *
     * @return integer
     */
    public function getLqi()
    {
        return $this->lqi;
    }

    /**
     * Set tra
     *
     * @param integer $tra
     *
     * @return SensorData
     */
    public function setTra($tra)
    {
        $this->tra = $tra;

        return $this;
    }

    /**
     * Get tra
     *
     * @return integer
     */
    public function getTra()
    {
        return $this->tra;
    }

    /**
     * Set trrs
     *
     * @param integer $trrs
     *
     * @return SensorData
     */
    public function setTrrs($trrs)
    {
        $this->trrs = $trrs;

        return $this;
    }

    /**
     * Get trrs
     *
     * @return integer
     */
    public function getTrrs()
    {
        return $this->trrs;
    }

    /**
     * Set trr
     *
     * @param integer $trr
     *
     * @return SensorData
     */
    public function setTrr($trr)
    {
        $this->trr = $trr;

        return $this;
    }

    /**
     * Get trr
     *
     * @return integer
     */
    public function getTrr()
    {
        return $this->trr;
    }

    /**
     * Set cra
     *
     * @param integer $cra
     *
     * @return SensorData
     */
    public function setCra($cra)
    {
        $this->cra = $cra;

        return $this;
    }

    /**
     * Get cra
     *
     * @return integer
     */
    public function getCra()
    {
        return $this->cra;
    }

    /**
     * Set crs
     *
     * @param integer $crs
     *
     * @return SensorData
     */
    public function setCrs($crs)
    {
        $this->crs = $crs;

        return $this;
    }

    /**
     * Get crs
     *
     * @return integer
     */
    public function getCrs()
    {
        return $this->crs;
    }

    /**
     * Set crr
     *
     * @param integer $crr
     *
     * @return SensorData
     */
    public function setCrr($crr)
    {
        $this->crr = $crr;

        return $this;
    }

    /**
     * Get crr
     *
     * @return integer
     */
    public function getCrr()
    {
        return $this->crr;
    }

    /**
     * Set smr
     *
     * @param integer $smr
     *
     * @return SensorData
     */
    public function setSmr($smr)
    {
        $this->smr = $smr;

        return $this;
    }

    /**
     * Get smr
     *
     * @return integer
     */
    public function getSmr()
    {
        return $this->smr;
    }

    /**
     * Set caf
     *
     * @param integer $caf
     *
     * @return SensorData
     */
    public function setCaf($caf)
    {
        $this->caf = $caf;

        return $this;
    }

    /**
     * Get caf
     *
     * @return integer
     */
    public function getCaf()
    {
        return $this->caf;
    }

    /**
     * Set af
     *
     * @param integer $af
     *
     * @return SensorData
     */
    public function setAf($af)
    {
        $this->af = $af;

        return $this;
    }

    /**
     * Get af
     *
     * @return integer
     */
    public function getAf()
    {
        return $this->af;
    }

    /**
     * Set otf
     *
     * @param integer $otf
     *
     * @return SensorData
     */
    public function setOtf($otf)
    {
        $this->otf = $otf;

        return $this;
    }

    /**
     * Get otf
     *
     * @return integer
     */
    public function getOtf()
    {
        return $this->otf;
    }

    /**
     * Set rdf
     *
     * @param integer $rdf
     *
     * @return SensorData
     */
    public function setRdf($rdf)
    {
        $this->rdf = $rdf;

        return $this;
    }

    /**
     * Get rdf
     *
     * @return integer
     */
    public function getRdf()
    {
        return $this->rdf;
    }

    /**
     * Set tef
     *
     * @param integer $tef
     *
     * @return SensorData
     */
    public function setTef($tef)
    {
        $this->tef = $tef;

        return $this;
    }

    /**
     * Get tef
     *
     * @return integer
     */
    public function getTef()
    {
        return $this->tef;
    }

    /**
     * Set tte
     *
     * @param integer $tte
     *
     * @return SensorData
     */
    public function setTte($tte)
    {
        $this->tte = $tte;

        return $this;
    }

    /**
     * Get tte
     *
     * @return integer
     */
    public function getTte()
    {
        return $this->tte;
    }

    /**
     * Set tto
     *
     * @param integer $tto
     *
     * @return SensorData
     */
    public function setTto($tto)
    {
        $this->tto = $tto;

        return $this;
    }

    /**
     * Get tto
     *
     * @return integer
     */
    public function getTto()
    {
        return $this->tto;
    }

    /**
     * Set temperature
     *
     * @param integer $temperature
     *
     * @return SensorData
     */
    public function setTemperature($temperature)
    {
        $this->temperature = $temperature;

        return $this;
    }

    /**
     * Get temperature
     *
     * @return integer
     */
    public function getTemperature()
    {
        return $this->temperature;
    }

    /**
     * Set userId
     *
     * @param \AppBundle\Entity\Users $userId
     *
     * @return SensorData
     */
    public function setUserId(\AppBundle\Entity\Users $userId = null)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return \AppBundle\Entity\Users
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set underGroundNodeId
     *
     * @param \AppBundle\Entity\SensorData $underGroundNodeId
     *
     * @return SensorData
     */
    public function setUnderGroundNodeId(\AppBundle\Entity\SensorData $underGroundNodeId = null)
    {
        $this->underGroundNodeId = $underGroundNodeId;

        return $this;
    }

    /**
     * Get underGroundNodeId
     *
     * @return \AppBundle\Entity\SensorData
     */
    public function getUnderGroundNodeId()
    {
        return $this->underGroundNodeId;
    }

    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     *
     * @return SensorData
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime
     *
     * @return \DateTime
     */
    public function getDatetime()
    {
        return $this->datetime;
    }
}

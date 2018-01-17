<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UGNode
 *
 * @ORM\Table(name="u_g_node")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UGNodeRepository")
 */
class UGNode
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
     * @ORM\Column(name="under_ground_node_id", type="string", length=20, unique=true)
     */
    private $underGroundNodeId;

    /**
     * @var string
     *
     * @ORM\Column(name="under_ground_node_name", type="string", length=50)
     */
    private $underGroundNodeName;


    /**
     * @var bool
     *
     * @ORM\Column(name="delete_status", type="boolean")
     */
    private $deleteStatus;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $userId;

    /**
     * @var \CENTRALNODE
     *
     * @ORM\ManyToOne(targetEntity="CentralNode", inversedBy="ugn")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="central_node_id", referencedColumnName="id")
     * })
     */
    private $centralNodeId;

    /**
     * @var \ABOVEGROUNDNODE
     *
     * @ORM\ManyToOne(targetEntity="AGNode", inversedBy="agn")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="above_ground_node_id", referencedColumnName="id")
     * })
     */
    private $aboveGroundNodeId;

    /**
     * @ORM\OneToMany(targetEntity="SensorData", mappedBy="underGroundNodeId")
     */
    private $sensorData;

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
     * Set underGroundNodeId
     *
     * @param string $underGroundNodeId
     *
     * @return UGNode
     */
    public function setUnderGroundNodeId($underGroundNodeId)
    {
        $this->underGroundNodeId = $underGroundNodeId;

        return $this;
    }

    /**
     * Get underGroundNodeId
     *
     * @return string
     */
    public function getUnderGroundNodeId()
    {
        return $this->underGroundNodeId;
    }

    /**
     * Set underGroundNodeName
     *
     * @param string $underGroundNodeName
     *
     * @return UGNode
     */
    public function setUnderGroundNodeName($underGroundNodeName)
    {
        $this->underGroundNodeName = $underGroundNodeName;

        return $this;
    }

    /**
     * Get underGroundNodeName
     *
     * @return string
     */
    public function getUnderGroundNodeName()
    {
        return $this->underGroundNodeName;
    }

    /**
     * Set deleteStatus
     *
     * @param boolean $deleteStatus
     *
     * @return UGNode
     */
    public function setDeleteStatus($deleteStatus)
    {
        $this->deleteStatus = $deleteStatus;

        return $this;
    }

    /**
     * Get deleteStatus
     *
     * @return boolean
     */
    public function getDeleteStatus()
    {
        return $this->deleteStatus;
    }


    /**
     * Set centralNodeId
     *
     * @param \AppBundle\Entity\CentralNode $centralNodeId
     *
     * @return UGNode
     */
    public function setCentralNodeId(\AppBundle\Entity\CentralNode $centralNodeId = null)
    {
        $this->centralNodeId = $centralNodeId;

        return $this;
    }

    /**
     * Get centralNodeId
     *
     * @return \AppBundle\Entity\CentralNode
     */
    public function getCentralNodeId()
    {
        return $this->centralNodeId;
    }

    /**
     * Set aboveGroundNodeId
     *
     * @param \AppBundle\Entity\AGNode $aboveGroundNodeId
     *
     * @return UGNode
     */
    public function setAboveGroundNodeId(\AppBundle\Entity\AGNode $aboveGroundNodeId = null)
    {
        $this->aboveGroundNodeId = $aboveGroundNodeId;

        return $this;
    }

    /**
     * Get aboveGroundNodeId
     *
     * @return \AppBundle\Entity\AGNode
     */
    public function getAboveGroundNodeId()
    {
        return $this->aboveGroundNodeId;
    }

    /**
     * Set userId
     *
     * @param \AppBundle\Entity\Users $userId
     *
     * @return UGNode
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
     * Constructor
     */
    public function __construct()
    {
        $this->sensorData = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add sensorDatum
     *
     * @param \AppBundle\Entity\SensorData $sensorDatum
     *
     * @return UGNode
     */
    public function addSensorDatum(\AppBundle\Entity\SensorData $sensorDatum)
    {
        $this->sensorData[] = $sensorDatum;

        return $this;
    }

    /**
     * Remove sensorDatum
     *
     * @param \AppBundle\Entity\SensorData $sensorDatum
     */
    public function removeSensorDatum(\AppBundle\Entity\SensorData $sensorDatum)
    {
        $this->sensorData->removeElement($sensorDatum);
    }

    /**
     * Get sensorData
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSensorData()
    {
        return $this->sensorData;
    }
}

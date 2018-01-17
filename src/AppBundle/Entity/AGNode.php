<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AGNode
 *
 * @ORM\Table(name="a_g_node")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AGNodeRepository")
 */
class AGNode
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
     * @ORM\Column(name="above_ground_node_id", type="string", length=20, unique=true)
     */
    private $aboveGroundNodeId;

    /**
     * @var string
     *
     * @ORM\Column(name="above_ground_node_name", type="string", length=50)
     */
    private $aboveGroundNodeName;

    /**
     * @var bool
     *
     * @ORM\Column(name="delete_status", type="boolean")
     */
    private $deleteStatus;

    /**
     * @ORM\OneToMany(targetEntity="UGNode", mappedBy="underGroundNodeId")
     */
    private $ugn;


    /**
     * @var \CENTRALNODE
     *
     * @ORM\ManyToOne(targetEntity="CentralNode", inversedBy="agn")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="central_node_id", referencedColumnName="id")
     * })
     */
    private $centralNodeId;


    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $userId;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ugn = new \Doctrine\Common\Collections\ArrayCollection(

        );
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set aboveGroundNodeId
     *
     * @param string $aboveGroundNodeId
     *
     * @return AGNode
     */
    public function setAboveGroundNodeId($aboveGroundNodeId)
    {
        $this->aboveGroundNodeId = $aboveGroundNodeId;

        return $this;
    }

    /**
     * Get aboveGroundNodeId
     *
     * @return string
     */
    public function getAboveGroundNodeId()
    {
        return $this->aboveGroundNodeId;
    }

    /**
     * Set aboveGroundNodeName
     *
     * @param string $aboveGroundNodeName
     *
     * @return AGNode
     */
    public function setAboveGroundNodeName($aboveGroundNodeName)
    {
        $this->aboveGroundNodeName = $aboveGroundNodeName;

        return $this;
    }

    /**
     * Get aboveGroundNodeName
     *
     * @return string
     */
    public function getAboveGroundNodeName()
    {
        return $this->aboveGroundNodeName;
    }

    /**
     * Set deleteStatus
     *
     * @param boolean $deleteStatus
     *
     * @return AGNode
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
     * Add ugn
     *
     * @param \AppBundle\Entity\UGNode $ugn
     *
     * @return AGNode
     */
    public function addUgn(\AppBundle\Entity\UGNode $ugn)
    {
        $this->ugn[] = $ugn;

        return $this;
    }

    /**
     * Remove ugn
     *
     * @param \AppBundle\Entity\UGNode $ugn
     */
    public function removeUgn(\AppBundle\Entity\UGNode $ugn)
    {
        $this->ugn->removeElement($ugn);
    }

    /**
     * Get ugn
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUgn()
    {
        return $this->ugn;
    }

    /**
     * Set centralNodeId
     *
     * @param \AppBundle\Entity\CentralNode $centralNodeId
     *
     * @return AGNode
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
     * Set userId
     *
     * @param \AppBundle\Entity\Users $userId
     *
     * @return AGNode
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
}

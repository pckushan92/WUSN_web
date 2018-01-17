<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CentralNode
 *
 * @ORM\Table(name="central_node")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CentralNodeRepository")
 */
class CentralNode
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
     * @ORM\Column(name="central_node_id", type="string", length=20, unique=true)
     */
    private $centralNodeId;

    /**
     * @var string
     *
     * @ORM\Column(name="central_node_name", type="string", length=50)
     */
    private $centralNodeName;

    /**
     * @var bool
     *
     * @ORM\Column(name="delete_status", type="boolean")
     */
    private $deleteStatus;

    /**
     * @ORM\OneToMany(targetEntity="AGNode", mappedBy="centralNodeId")
     */
    private $agn;

    /**
     * @ORM\OneToMany(targetEntity="UGNode", mappedBy="centralNodeId")
     */
    private $ugn;

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
        $this->agn = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ugn = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set centralNodeId
     *
     * @param string $centralNodeId
     *
     * @return CentralNode
     */
    public function setCentralNodeId($centralNodeId)
    {
        $this->centralNodeId = $centralNodeId;

        return $this;
    }

    /**
     * Get centralNodeId
     *
     * @return string
     */
    public function getCentralNodeId()
    {
        return $this->centralNodeId;
    }

    /**
     * Set centralNodeName
     *
     * @param string $centralNodeName
     *
     * @return CentralNode
     */
    public function setCentralNodeName($centralNodeName)
    {
        $this->centralNodeName = $centralNodeName;

        return $this;
    }

    /**
     * Get centralNodeName
     *
     * @return string
     */
    public function getCentralNodeName()
    {
        return $this->centralNodeName;
    }

    /**
     * Set deleteStatus
     *
     * @param boolean $deleteStatus
     *
     * @return CentralNode
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
     * Add agn
     *
     * @param \AppBundle\Entity\AGNode $agn
     *
     * @return CentralNode
     */
    public function addAgn(\AppBundle\Entity\AGNode $agn)
    {
        $this->agn[] = $agn;

        return $this;
    }

    /**
     * Remove agn
     *
     * @param \AppBundle\Entity\AGNode $agn
     */
    public function removeAgn(\AppBundle\Entity\AGNode $agn)
    {
        $this->agn->removeElement($agn);
    }

    /**
     * Get agn
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAgn()
    {
        return $this->agn;
    }

    /**
     * Add ugn
     *
     * @param \AppBundle\Entity\UGNode $ugn
     *
     * @return CentralNode
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
     * Set userId
     *
     * @param \AppBundle\Entity\Users $userId
     *
     * @return CentralNode
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

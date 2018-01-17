<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Node
 *
 * @ORM\Table(name="node")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\NodeRepository")
 */
class Node
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
     * @ORM\Column(name="type", type="string", length=10, unique=true)
     */
    private $type;


    /**
     * @var string
     *
     * @ORM\Column(name="node_id", type="string", length=8, unique=true)
     */
    private $nodeId;

    /**
     * @var string
     *
     * @ORM\Column(name="node_name", type="string", length=30, unique=true)
     */
    private $nodeName;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="delete_status", type="boolean")
     */
    private $deleteStatus;


    /**
     * @ORM\OneToMany(targetEntity="Node", mappedBy="nodeId")
     */
    private $node;

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
     * Set type
     *
     * @param string $type
     *
     * @return Node
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }


    /**
     * Set nodeId
     *
     * @param string $nodeId
     *
     * @return Node
     */
    public function setNodeId($nodeId)
    {
        $this->nodeId = $nodeId;

        return $this;
    }

    /**
     * Get nodeId
     *
     * @return string
     */
    public function getNodeId()
    {
        return $this->nodeId;
    }

    /**
     * Set nodeName
     *
     * @param string $nodeName
     *
     * @return Node
     */
    public function setNodeName($nodeName)
    {
        $this->nodeName = $nodeName;

        return $this;
    }

    /**
     * Get nodeName
     *
     * @return string
     */
    public function getNodeName()
    {
        return $this->nodeName;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Node
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set deleteStatus
     *
     * @param boolean $deleteStatus
     *
     * @return Node
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
     * Constructor
     */
    public function __construct()
    {
        $this->node = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add node
     *
     * @param \AppBundle\Entity\Node $node
     *
     * @return Node
     */
    public function addNode(\AppBundle\Entity\Node $node)
    {
        $this->node[] = $node;

        return $this;
    }

    /**
     * Remove node
     *
     * @param \AppBundle\Entity\Node $node
     */
    public function removeNode(\AppBundle\Entity\Node $node)
    {
        $this->node->removeElement($node);
    }

    /**
     * Get node
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNode()
    {
        return $this->node;
    }
}

<?php

namespace Ynov\LabsBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;//permet de rajouter les contraintes d'unicité avec UniqueEntity
/**
 * Ynov\LabsBundle\Entity\Labsites
 *
 * @ORM\Table(name="labsites")
 * @ORM\Entity
 * @UniqueEntity(fields={"idlab","idsite"}, message="Cette relation est déjà enregistrée")
 */
class Labsites
{
    /** 
     * @var integer $idlabsite
     *
     * @ORM\Column(name="IDLABSITE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var Labs
     *
     * @ORM\ManyToOne(targetEntity="Ynov\LabsBundle\Entity\Labs", cascade={"persist","merge"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDLAB", referencedColumnName="IDLAB")
     * })
     */
    private $idlab;
    /**
     * @var Sites
     *
     * @ORM\ManyToOne(targetEntity="Ynov\LabsBundle\Entity\Site", cascade={"persist","merge"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDSITE", referencedColumnName="IDSITE")
     * })
     */
    private $idsite;


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
     * Set idlab
     *
     * @param \Ynov\LabsBundle\Entity\Labs $idlab
     * @return Labsites
     */
    public function setIdlab(\Ynov\LabsBundle\Entity\Labs $idlab = null)
    {
        $this->idlab = $idlab;

        return $this;
    }

    /**
     * Get idlab
     *
     * @return \Ynov\LabsBundle\Entity\Labs 
     */
    public function getIdlab()
    {
        return $this->idlab;
    }

    /**
     * Set idsite
     *
     * @param \Ynov\LabsBundle\Entity\Site $idsite
     * @return Labsites
     */
    public function setIdsite(\Ynov\LabsBundle\Entity\Site $idsite = null)
    {
        $this->idsite = $idsite;

        return $this;
    }

    /**
     * Get idsite
     *
     * @return \Ynov\LabsBundle\Entity\Site 
     */
    public function getIdsite()
    {
        return $this->idsite;
    }
    

}

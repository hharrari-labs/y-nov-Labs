<?php

namespace Ynov\LabsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ecole
 *
 * @ORM\Table(name="ecole")
 * @ORM\Entity
 */
class Ecole
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDECOLE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idecole;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMECOLE", type="string", length=50, nullable=true)
     */
    private $nomecole;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATECREATION", type="date", nullable=true)
     */
    private $datecreation;



    /**
     * Get idecole
     *
     * @return integer 
     */
    public function getIdecole()
    {
        return $this->idecole;
    }

    /**
     * Set nomecole
     *
     * @param string $nomecole
     * @return Ecole
     */
    public function setNomecole($nomecole)
    {
        $this->nomecole = $nomecole;

        return $this;
    }

    /**
     * Get nomecole
     *
     * @return string 
     */
    public function getNomecole()
    {
        return $this->nomecole;
    }

    /**
     * Set datecreation
     *
     * @param \DateTime $datecreation
     * @return Ecole
     */
    public function setDatecreation($datecreation)
    {
        $this->datecreation = $datecreation;

        return $this;
    }

    /**
     * Get datecreation
     *
     * @return \DateTime 
     */
    public function getDatecreation()
    {
        return $this->datecreation;
    }
}

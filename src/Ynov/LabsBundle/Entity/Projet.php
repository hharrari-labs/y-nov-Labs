<?php

namespace Ynov\LabsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Projet
 *
 * @ORM\Table(name="projet")
 * @ORM\Entity
 */
class Projet
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDPROJET", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMPROJET", type="string", length=50, nullable=false)
     */
    private $nomprojet;

    /**
     * @var integer
     *
     * @ORM\Column(name="STATUTPROJET", type="integer", nullable=true)
     */
    private $statutprojet;

    /**
     * @var string
     *
     * @ORM\Column(name="VIDEOPROJET", type="string", length=250, nullable=true)
     */
    private $videoprojet;

    /**
     * @var string
     *
     * @ORM\Column(name="DESCRIPTION", type="text", nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATECREATION", type="date", nullable=true)
     */
    private $datecreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATEMAJPROJET", type="date", nullable=true)
     */
    private $datemajprojet;

    /**
     * @var string
     *
     * @ORM\Column(name="TECHNOLOGIE", type="text", nullable=true)
     */
    private $technologie;

    /**
     * @var string
     *
     * @ORM\Column(name="EQUIPE", type="text", nullable=true)
     */
    private $equipe;

    /**
     * @var string
     *
     * @ORM\Column(name="LIENPROJET", type="string", length=250, nullable=true)
     */
    private $lienprojet;

    /**
     * @var string
     *
     * @ORM\Column(name="LOGO", type="string", length=250, nullable=true)
     */
    private $logo;

    /**
     * @var \Photo
     *
     * @ORM\ManyToOne(targetEntity="Photo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDPHOTO", referencedColumnName="IDPHOTO")
     * })
     */
    private $idphoto;

    /**
     * @var \Labs
     *
     * @ORM\ManyToOne(targetEntity="Labs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDLAB", referencedColumnName="IDLAB")
     * })
     */
    private $idlab;

    /**
     * @Assert\File(maxSize="6000000")
     */
    private $file;


    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDUTILISATEUR", referencedColumnName="IDUTILISATEUR")
     * })
     */
    private $idutilisateur;



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
     * Set nomprojet
     *
     * @param string $nomprojet
     * @return Projet
     */
    public function setNomprojet($nomprojet)
    {
        $this->nomprojet = $nomprojet;

        return $this;
    }

    /**
     * Get nomprojet
     *
     * @return string 
     */
    public function getNomprojet()
    {
        return $this->nomprojet;
    }

    /**
     * Set statutprojet
     *
     * @param integer $statutprojet
     * @return Projet
     */
    public function setStatutprojet($statutprojet)
    {
        $this->statutprojet = $statutprojet;

        return $this;
    }

    /**
     * Get statutprojet
     *
     * @return integer 
     */
    public function getStatutprojet()
    {
        return $this->statutprojet;
    }

    /**
     * Set videoprojet
     *
     * @param string $videoprojet
     * @return Projet
     */
    public function setVideoprojet($videoprojet)
    {
        $this->videoprojet = $videoprojet;

        return $this;
    }

    /**
     * Get videoprojet
     *
     * @return string 
     */
    public function getVideoprojet()
    {
        return $this->videoprojet;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Projet
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
     * Set datecreation
     *
     * @param \DateTime $datecreation
     * @return Projet
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

    /**
     * Set datemajprojet
     *
     * @param \DateTime $datemajprojet
     * @return Projet
     */
    public function setDatemajprojet($datemajprojet)
    {
        $this->datemajprojet = $datemajprojet;

        return $this;
    }

    /**
     * Get datemajprojet
     *
     * @return \DateTime 
     */
    public function getDatemajprojet()
    {
        return $this->datemajprojet;
    }

    /**
     * Set technologie
     *
     * @param string $technologie
     * @return Projet
     */
    public function setTechnologie($technologie)
    {
        $this->technologie = $technologie;

        return $this;
    }

    /**
     * Get technologie
     *
     * @return string 
     */
    public function getTechnologie()
    {
        return $this->technologie;
    }

    /**
     * Set equipe
     *
     * @param string $equipe
     * @return Projet
     */
    public function setEquipe($equipe)
    {
        $this->equipe = $equipe;

        return $this;
    }

    /**
     * Get equipe
     *
     * @return string 
     */
    public function getEquipe()
    {
        return $this->equipe;
    }

    /**
     * Set lienprojet
     *
     * @param string $lienprojet
     * @return Projet
     */
    public function setLienprojet($lienprojet)
    {
        $this->lienprojet = $lienprojet;

        return $this;
    }

    /**
     * Get lienprojet
     *
     * @return string 
     */
    public function getLienprojet()
    {
        return $this->lienprojet;
    }

    /**
     * Set logo
     *
     * @param string $logo
     * @return Projet
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set idphoto
     *
     * @param \Ynov\LabsBundle\Entity\Photo $idphoto
     * @return Projet
     */
    public function setIdphoto(\Ynov\LabsBundle\Entity\Photo $idphoto = null)
    {
        $this->idphoto = $idphoto;

        return $this;
    }

    /**
     * Get idphoto
     *
     * @return \Ynov\LabsBundle\Entity\Photo 
     */
    public function getIdphoto()
    {
        return $this->idphoto;
    }

    /**
     * Set idlab
     *
     * @param \Ynov\LabsBundle\Entity\Labs $idlab
     * @return Projet
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
     * Set idutilisateur
     *
     * @param \Ynov\LabsBundle\Entity\Utilisateur $idutilisateur
     * @return Projet
     */
    public function setIdutilisateur(\Ynov\LabsBundle\Entity\Utilisateur $idutilisateur = null)
    {
        $this->idutilisateur = $idutilisateur;

        return $this;
    }

    /**
     * Get idutilisateur
     *
     * @return \Ynov\LabsBundle\Entity\Utilisateur 
     */
    public function getIdutilisateur()
    {
        return $this->idutilisateur;
    }
    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }
    public function getAbsolutePath()
    {
        return null === $this->logo
            ? null
            : $this->getUploadRootDir().'/'.$this->logo;
    }

    public function getWebPath()
    {
        return null === $this->logo
            ? null
            : $this->getUploadDir().'/'.$this->logo;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory logo where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/documents';
    }
    public function upload()
    {
    // the file property can be empty if the field is not required
    if (null === $this->getFile()) {
        return;
    }

    // use the original file name here but you should
    // sanitize it at least to avoid any security issues

    // move takes the target directory and then the
    // target filename to move to
    $this->getFile()->move(
        $this->getUploadRootDir(),
        $this->getFile()->getClientOriginalName()
    );

    // set the logo property to the filename where you've saved the file
    $this->logo = $this->getFile()->getClientOriginalName();

    // clean up the file property as you won't need it anymore
    $this->file = null;
    }

}

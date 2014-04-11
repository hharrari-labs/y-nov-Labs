<?php

namespace Ynov\LabsBundle\Entity;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Photo
 *
 * @ORM\Table(name="photo")
 * @ORM\Entity
 * @UniqueEntity(fields="path", message="Cette photo est déjà ajoutée")
 */
class Photo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDPHOTO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="PATH", type="string", length=250, nullable=false)
     */
    private $path;

    /**
     * @Assert\File(maxSize="6000000")
     */
    public $file;

    /**
     * @var Site
     *
     * @ORM\ManyToOne(targetEntity="Projet", inversedBy="photos", cascade={"persist","merge"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDPROJET", referencedColumnName="IDPROJET")
     * })
     */
    private $idprojet;
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
     * Set chemin
     *
     * @param string $chemin
     * @return Photo
     */
    public function setPath($path)
    {
        $this->chemin = $path;

        return $this;
    }

    /**
     * Get chemin
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->getWebPath();
    }

   
    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path ? null : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // le chemin absolu du répertoire où les documents uploadés doivent être sauvegardés
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // on se débarrasse de « __DIR__ » afin de ne pas avoir de problème lorsqu'on affiche
        // le document/image dans la vue.
        return 'uploads/documents';
    }
    public function upload()
    {
    // la propriété « file » peut être vide si le champ n'est pas requis
    if (null === $this->file) {
        return;
    }

    // utilisez le nom de fichier original ici mais
    // vous devriez « l'assainir » pour au moins éviter
    // quelconques problèmes de sécurité

    // la méthode « move » prend comme arguments le répertoire cible et
    // le nom de fichier cible où le fichier doit être déplacé
    $this->file->move($this->getUploadRootDir(), $this->file->getClientOriginalName());

    // définit la propriété « path » comme étant le nom de fichier où vous
    // avez stocké le fichier
    $this->path = $this->file->getClientOriginalName();

    // « nettoie » la propriété « file » comme vous n'en aurez plus besoin
    $this->file = null;
    }

    /**
     * Set idsite
     *
     * @param \Ynov\LabsBundle\Entity\Projet $idprojet
     * @return Photo
     */
    public function setIdprojet(\Ynov\LabsBundle\Entity\Projet $idprojet = null)
    {
        $this->idprojet = $idprojet;

        return $this;
    }

    /**
     * Get idsite
     *
     * @return \Ynov\LabsBundle\Entity\Projet
     */
    public function getIdprojet()
    {
        return $this->idprojet;
    }
}

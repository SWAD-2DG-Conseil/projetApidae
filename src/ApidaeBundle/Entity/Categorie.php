<?php

namespace ApidaeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity(repositoryClass="ApidaeBundle\Repository\CategorieRepository")
 */
class Categorie
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
     * @var int
     *
     * @ORM\Column(name="catId", type="integer", length=255, unique=true)
     */
    private $catId;

    /**
     * @var string
     *
     * @ORM\Column(name="catLibelle", type="string", length=255)
     */
    private $catLibelle;

    /**
     * @ORM\ManyToMany(targetEntity="ApidaeBundle\Entity\ObjetApidae", mappedBy="categories", cascade={"persist"})
     */
    private $objets;


    public function __construct() {
        $this->objets = new ArrayCollection();
    }

    /**
     * Ajoute/lie un objetApidae à la categorie
     */
    public function addObjet(ObjetApidae $objet) {
        $this->objets[] = $objet;
    }

    /**
     * Supprime objetApidae de la categorie
     */
    public function removeObjet(ObjetApidae $objet) {
        $this->objets->removeElement($objet);
    }

    //---------------------- Getter & Setter ----------------------//

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
     * Set catLibelle
     *
     * @param string $catLibelle
     *
     * @return Categorie
     */
    public function setCatLibelle($catLibelle)
    {
        $this->catLibelle = $catLibelle;

        return $this;
    }

    /**
     * Get catLibelle
     *
     * @return string
     */
    public function getCatLibelle()
    {
        return $this->catLibelle;
    }

    /**
     *@return un tableau 
     */
    public function getObjets() {
        return $this->objets;
    }

    /**
     * @return int
     */
    public function getCatId()
    {
        return $this->catId;
    }

    /**
     * @param int $catId
     */
    public function setCatId($catId)
    {
        $this->catId = $catId;
    }



}

<?php

namespace ApidaeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TraductionObjetApidae
 *
 * @ORM\Table(name="traduction_objet_apidae")
 * @ORM\Entity(repositoryClass="ApidaeBundle\Repository\TraductionObjetApidaeRepository")
 */
class TraductionObjetApidae
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
     * @ORM\Column(name="tra_Nom", type="string", length=255)
     */
    private $traNom;

    /**
     * @var string
     *
     * @ORM\Column(name="tra_DescriptionCourte", type="string", length=255, nullable=true)
     */
    private $traDescriptionCourte;

    /**
     * @var string
     *
     * @ORM\Column(name="tra_DescriptionLongue", type="string", length=255, nullable=true)
     */
    private $traDescriptionLongue;

    /**
     * @var string
     *
     * @ORM\Column(name="tra_DescriptionPersonnalisee", type="string", length=255, nullable=true)
     */
    private $traDescriptionPersonnalisee;

    /**
     * @var string
     *
     * @ORM\Column(name="tra_BonsPlans", type="string", length=255, nullable=true)
     */
    private $traBonsPlans;

    /**
     * @var string
     *
     * @ORM\Column(name="tra_InfosSup", type="string", length=255, nullable=true)
     */
    private $traInfosSup;

    /**
     * @var string
     *
     * @ORM\Column(name="tra_DateEnClair", type="string", length=255, nullable=true)
     */
    private $traDateEnClair;

    /**
     * @var string
     *
     * @ORM\Column(name="tar_TarifEnClair", type="string", length=255, nullable=true)
     */
    private $tarTarifEnClair;

    /**
     * @ORM\ManyToOne(targetEntity="ApidaeBundle\Entity\ObjetApidae", inversedBy="traductions")
     * @ORM\JoinColumn(nullable = false)
     */
    private $objet;

    /**
     * @ORM\ManyToOne(targetEntity="ApidaeBundle\Entity\Langue", inversedBy="traductions")
     * @ORM\JoinColumn(nullable = false)
     */
    private $langue;

    /**
     * @ORM\OneToMany(targetEntity="ApidaeBundle\Entity\Equipement", mappedBy="traduction", cascade={"persist"})
     */
    private $equipements;

    /**
     * @ORM\OneToMany(targetEntity="ApidaeBundle\Entity\Service", mappedBy="traduction", cascade={"persist"})
     */
    private $services;

    /**
     * @ORM\OneToMany(targetEntity="ApidaeBundle\Entity\MoyenCommunication", mappedBy="traduction", cascade={"persist"})
     */
    private $moyensCommunications;

    /**
     * @ORM\OneToMany(targetEntity="ApidaeBundle\Entity\Multimedia", mappedBy="traduction", cascade={"persist"})
     */
    private $multimedias;

    /**
     * @ORM\OneToMany(targetEntity="ApidaeBundle\Entity\Tarif", mappedBy="traduction", cascade={"persist"})
     */
    private $tarifs;

    /**
     * @ORM\OneToMany(targetEntity="ApidaeBundle\Entity\Ouverture", mappedBy="traduction", cascade={"persist"})
     */
    private $ouvertures;

    /**
     * @ORM\OneToMany(targetEntity="ApidaeBundle\Entity\TypePublic", mappedBy="traduction", cascade={"persist"})
     */
    private $typesPublic;

    /**
     * @ORM\ManyToMany(targetEntity="ApidaeBundle\Entity\LabelQualite", inversedBy="traductions", cascade={"persist"})
     * @ORM\JoinTable(name="traductionHasLabelQualite")
     */
    private $labelsQualite;

    public function _construct() {
        //initialisation des collections
        $this->equipements = new ArrayCollection();
        $this->services = new ArrayCollection();
        $this->moyensCommunications = new ArrayCollection();
        $this->multimedias = new ArrayCollection();
        $this->tarifs = new ArrayCollection();
        $this->ouvertures = new ArrayCollection();
        $this->typesPublic = new ArrayCollection();
        $this->labelsQualite = new ArrayCollection();
    }

    /**
     * Ajoute/lie un label de qualite à l'objet
     */
    public function addLabelQualite(LabelQualite $labelQualite) {
        $this->labelsQualite[] = $labelQualite;
    }

    /**
     * Supprime un label de qualite à l'objet
     */
    public function removeLabelQualite(LabelQualite $labelQualite) {
        $this->labelsQualite->removeElement($labelQualite);
    }

    /**
     * Ajoute/lie un type de public à l'objet
     */
    public function addTypePublic(TypePublic $type) {
        $this->typesPublic[] = $type;

    }

    /**
     * Supprime un type de public lié à l'objet
     */
    public function removeTypePublic(TypePublic $type) {
        $this->typesPublic->removeElement($type);
    }

    /**
     * Ajoute/lie un equipement à l'objet
     */
    public function addEquipement(Equipement $equipement) {
        $this->equipements[] = $equipement;

    }

    /**
     * Supprime un equipement lié à l'objet
     */
    public function removeEquipement(Equipement $equipement) {
        $this->equipements->removeElement($equipement);
    }

    /**
     * Ajoute/lie un service à l'objet
     */
    public function addService(Service $service) {
        $this->services[] = $service;

    }

    /**
     * Supprime un service lié à l'objet
     */
    public function removeService(Service $service) {
        $this->services->removeElement($service);
    }

    /**
     * Ajoute/lie un  moyen de communication à l'objet
     */
    public function addMoyenCommunication(MoyenCommunication $moyenCommunication) {
        $this->moyensCommunications[] = $moyenCommunication;

    }

    /**
     * Supprime un moyen de communication lié à l'objet
     */
    public function removeMoyenCommunication(MoyenCommunication $moyenCommunication) {
        $this->moyensCommunications->removeElement($moyenCommunication);
    }

    /**
     * Ajoute/lie un media de communication à l'objet
     */
    public function addMultimedia(Multimedia $multimedia) {
        $this->multimedias[] = $multimedia;

    }

    /**
     * Supprime un media lié à l'objet
     */
    public function removeMultimedia(Multimedia $multimedia) {
        $this->multimedias->removeElement($multimedia);
    }

    /**
     * Ajoute/lie un tarif à l'objet
     */
    public function addTarif(Tarif $tarif) {
        $this->tarifs[] = $tarif;

    }

    /**
     * Supprime un tarif lié à l'objet
     */
    public function removeTarif(Tarif $tarif) {
        $this->tarifs->removeElement($tarif);
    }


    /**
     * Ajoute/lie une ouverture à l'objet
     */
    public function addOuverture(Ouverture $ouverture) {
        $this->ouvertures[] = $ouverture;

    }

    /**
     * Supprime une ouverture lié à l'objet
     */
    public function removeOuverture(Ouverture $ouverture) {
        $this->ouvertures->removeElement($ouverture);
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
     * Set traNom
     *
     * @param string $traNom
     *
     * @return TraductionObjetApidae
     */
    public function setTraNom($traNom)
    {
        $this->traNom = $traNom;

        return $this;
    }

    /**
     * Get traNom
     *
     * @return string
     */
    public function getTraNom()
    {
        return $this->traNom;
    }

    /**
     * Set tarEnClair
     *
     * @param string $tarEnClair
     *
     * @return Tarif
     */
    public function setTraTarifrEnClair($tarEnClair)
    {
        $this->tarTarifEnClair = $tarEnClair;

        return $this;
    }

    /**
     * Get tarEnClair
     *
     * @return string
     */
    public function getTraTarifrEnClair()
    {
        return $this->tarTarifEnClair;
    }

    /**
     * Set traDescriptionCourte
     *
     * @param string $traDescriptionCourte
     *
     * @return TraductionObjetApidae
     */
    public function setTraDescriptionCourte($traDescriptionCourte)
    {
        $this->traDescriptionCourte = $traDescriptionCourte;

        return $this;
    }

    /**
     * Get traDescriptionCourte
     *
     * @return string
     */
    public function getTraDescriptionCourte()
    {
        return $this->traDescriptionCourte;
    }

    /**
     * Set traDescriptionLongue
     *
     * @param string $traDescriptionLongue
     *
     * @return TraductionObjetApidae
     */
    public function setTraDescriptionLongue($traDescriptionLongue)
    {
        $this->traDescriptionLongue = $traDescriptionLongue;

        return $this;
    }

    /**
     * Get traDescriptionLongue
     *
     * @return string
     */
    public function getTraDescriptionLongue()
    {
        return $this->traDescriptionLongue;
    }

    /**
     * Set traDescriptionPersonnalisee
     *
     * @param string $traDescriptionPersonnalisee
     *
     * @return TraductionObjetApidae
     */
    public function setTraDescriptionPersonnalisee($traDescriptionPersonnalisee)
    {
        $this->traDescriptionPersonnalisee = $traDescriptionPersonnalisee;
        return $this;
    }

    /**
     * Get traDescriptionPersonnalisee
     *
     * @return string
     */
    public function getTraDescriptionPersonnalisee()
    {
        return $this->traDescriptionPersonnalisee;
    }

    /**
     * Set traBonsPlans
     *
     * @param string $traBonsPlans
     *
     * @return TraductionObjetApidae
     */
    public function setTraBonsPlans($traBonsPlans)
    {
        $this->traBonsPlans = $traBonsPlans;

        return $this;
    }

    /**
     * Get traBonsPlans
     *
     * @return string
     */
    public function getTraBonsPlans()
    {
        return $this->traBonsPlans;
    }

    /**
     * Set traInfosSup
     *
     * @param string $traInfosSup
     *
     * @return TraductionObjetApidae
     */
    public function setTraInfosSup($traInfosSup)
    {
        $this->traInfosSup = $traInfosSup;

        return $this;
    }

    /**
     * Get traInfosSup
     *
     * @return string
     */
    public function getTraInfosSup()
    {
        return $this->traInfosSup;
    }

    /**
     * Set traDateEnClair
     *
     * @param string $traDateEnClair
     *
     * @return TraductionObjetApidae
     */
    public function setTraDateEnClair($traDateEnClair)
    {
        $this->traDateEnClair = $traDateEnClair;

        return $this;
    }

    /**
     * Get traDateEnClair
     *
     * @return string
     */
    public function getTraDateEnClair()
    {
        return $this->traDateEnClair;
    }

    /**
     * Set objIdObjet
     *
     * @param ObjetApidae $obj
     *
     * @return TraductionObjetApidae
     */
    public function setObjet(ObjetApidae $obj)
    {
        $this->objet = $obj;

        return $this;
    }

    /**
     * Get o
     *
     * @return ObjetApidae
     */
    public function getObjet()
    {
        return $this->objet;
    }

    /**
     * Set lanIdLangue
     *
     * @param Langue $langue
     *
     * @return TraductionObjetApidae
     */
    public function setLangue(Langue $langue)
    {
        $this->langue = $langue;

        return $this;
    }

    /**
     * Get lanIdLangue
     *
     * @return int
     */
    public function getLangue()
    {
        return $this->langue;
    }

    /**
     *@return un tableau contenant les equipements liés à la traduction
     */
    public function getEquipements() {
        return $this->equipements;
    }

    /**
     *@return un tableau contenant les services liés à la traduction
     */
    public function getServices() {
        return $this->services;
    }

    /**
     *@return un tableau contenant les moyens de communications liés à la traduction
     */
    public function getMoyensCommunications() {
        return $this->moyensCommunications;
    }

    /**
     *@return un tableau contenant les multimédias liés à la traduction
     */
    public function getMultimedias() {
        return $this->multimedias;
    }

    /**
     *@return un tableau contenant les tarifs liés à la traduction
     */
    public function getTarifs() {
        return $this->tarifs;
    }

    /**
     *@return un tableau contenant les ouvertures liés à la traduction
     */
    public function getOuvertures() {
        return $this->ouvertures;
    }

    /**
     *@return un tableau contenant les labelsQualite liés à la traduction
     */
    public function getLabelsQualite() {
        return $this->labelsQualite;
    }
}


<?php

namespace MBLBundle\Entity;

/**
 * Projet
 */
class Projet
{

 

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $titre;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $siteInternet;

    /**
     * @var string
     */
    private $ebustaUrl;

    /**
     * @var string
     */
    private $localisation;

    /**
     * @var \DateTime
     */
    private $dateCreation;

    /**
     * @var \MBLBundle\Entity\Secteur
     */
    private $secteur;

    /**
     * @var \MBLBundle\Entity\TypeDeProjet
     */
    private $typeDeProjet;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $profilsrecherches;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $matchings;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->profilsrecherches = new \Doctrine\Common\Collections\ArrayCollection();
        $this->matchings = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set titre
     *
     * @param string $titre
     *
     * @return Projet
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     *
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
     * Set siteInternet
     *
     * @param string $siteInternet
     *
     * @return Projet
     */
    public function setSiteInternet($siteInternet)
    {
        $this->siteInternet = $siteInternet;

        return $this;
    }

    /**
     * Get siteInternet
     *
     * @return string
     */
    public function getSiteInternet()
    {
        return $this->siteInternet;
    }

    /**
     * Set ebustaUrl
     *
     * @param string $ebustaUrl
     *
     * @return Projet
     */
    public function setEbustaUrl($ebustaUrl)
    {
        $this->ebustaUrl = $ebustaUrl;

        return $this;
    }

    /**
     * Get ebustaUrl
     *
     * @return string
     */
    public function getEbustaUrl()
    {
        return $this->ebustaUrl;
    }

    /**
     * Set localisation
     *
     * @param string $localisation
     *
     * @return Projet
     */
    public function setLocalisation($localisation)
    {
        $this->localisation = $localisation;

        return $this;
    }

    /**
     * Get localisation
     *
     * @return string
     */
    public function getLocalisation()
    {
        return $this->localisation;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Projet
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set secteur
     *
     * @param \MBLBundle\Entity\Secteur $secteur
     *
     * @return Projet
     */
    public function setSecteur(\MBLBundle\Entity\Secteur $secteur = null)
    {
        $this->secteur = $secteur;

        return $this;
    }

    /**
     * Get secteur
     *
     * @return \MBLBundle\Entity\Secteur
     */
    public function getSecteur()
    {
        return $this->secteur;
    }

    /**
     * Set typeDeProjet
     *
     * @param \MBLBundle\Entity\TypeDeProjet $typeDeProjet
     *
     * @return Projet
     */
    public function setTypeDeProjet(\MBLBundle\Entity\TypeDeProjet $typeDeProjet = null)
    {
        $this->typeDeProjet = $typeDeProjet;

        return $this;
    }

    /**
     * Get typeDeProjet
     *
     * @return \MBLBundle\Entity\TypeDeProjet
     */
    public function getTypeDeProjet()
    {
        return $this->typeDeProjet;
    }

    /**
     * Add profilsrecherch
     *
     * @param \MBLBundle\Entity\ProfilRecherche $profilsrecherch
     *
     * @return Projet
     */
    public function addProfilsrecherch(\MBLBundle\Entity\ProfilRecherche $profilsrecherch)
    {
        $this->profilsrecherches[] = $profilsrecherch;

        return $this;
    }

    /**
     * Remove profilsrecherch
     *
     * @param \MBLBundle\Entity\ProfilRecherche $profilsrecherch
     */
    public function removeProfilsrecherch(\MBLBundle\Entity\ProfilRecherche $profilsrecherch)
    {
        $this->profilsrecherches->removeElement($profilsrecherch);
    }

    /**
     * Get profilsrecherches
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProfilsrecherches()
    {
        return $this->profilsrecherches;
    }

    /**
     * Add matching
     *
     * @param \MBLBundle\Entity\Matching $matching
     *
     * @return Projet
     */
    public function addMatching(\MBLBundle\Entity\Matching $matching)
    {
        $this->matchings[] = $matching;

        return $this;
    }

    /**
     * Remove matching
     *
     * @param \MBLBundle\Entity\Matching $matching
     */
    public function removeMatching(\MBLBundle\Entity\Matching $matching)
    {
        $this->matchings->removeElement($matching);
    }

    /**
     * Get matchings
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMatchings()
    {
        return $this->matchings;
    }
}
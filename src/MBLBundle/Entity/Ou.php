<?php

namespace MBLBundle\Entity;

/**
 * Ou
 */
class Ou
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $ou;


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
     * Set ou
     *
     * @param string $ou
     *
     * @return Ou
     */
    public function setOu($ou)
    {
        $this->ou = $ou;

        return $this;
    }

    /**
     * Get ou
     *
     * @return string
     */
    public function getOu()
    {
        return $this->ou;
    }
    /**
     * @var \MBLBundle\Entity\ProfilRecherche
     */
    private $profilrecherche;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $profils;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->profils = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set profilrecherche
     *
     * @param \MBLBundle\Entity\ProfilRecherche $profilrecherche
     *
     * @return Ou
     */
    public function setProfilrecherche(\MBLBundle\Entity\ProfilRecherche $profilrecherche = null)
    {
        $this->profilrecherche = $profilrecherche;

        return $this;
    }

    /**
     * Get profilrecherche
     *
     * @return \MBLBundle\Entity\ProfilRecherche
     */
    public function getProfilrecherche()
    {
        return $this->profilrecherche;
    }

    /**
     * Add profil
     *
     * @param \MBLBundle\Entity\Profil $profil
     *
     * @return Ou
     */
    public function addProfil(\MBLBundle\Entity\Profil $profil)
    {
        $this->profils[] = $profil;

        return $this;
    }

    /**
     * Remove profil
     *
     * @param \MBLBundle\Entity\Profil $profil
     */
    public function removeProfil(\MBLBundle\Entity\Profil $profil)
    {
        $this->profils->removeElement($profil);
    }

    /**
     * Get profils
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProfils()
    {
        return $this->profils;
    }
}
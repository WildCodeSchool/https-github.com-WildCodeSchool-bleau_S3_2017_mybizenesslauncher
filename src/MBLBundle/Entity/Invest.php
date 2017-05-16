<?php

namespace MBLBundle\Entity;

/**
 * Invest
 */
class Invest
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $invest;


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
     * Set invest
     *
     * @param string $invest
     *
     * @return Invest
     */
    public function setInvest($invest)
    {
        $this->invest = $invest;

        return $this;
    }

    /**
     * Get invest
     *
     * @return string
     */
    public function getInvest()
    {
        return $this->invest;
    }
    /**
     * @var \MBLBundle\Entity\ProfilRecherche
     */
    private $profilrecherche;

    /**
     * @var \MBLBundle\Entity\Profil
     */
    private $profil;


    /**
     * Set profilrecherche
     *
     * @param \MBLBundle\Entity\ProfilRecherche $profilrecherche
     *
     * @return Invest
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
     * Set profil
     *
     * @param \MBLBundle\Entity\Profil $profil
     *
     * @return Invest
     */
    public function setProfil(\MBLBundle\Entity\Profil $profil = null)
    {
        $this->profil = $profil;

        return $this;
    }

    /**
     * Get profil
     *
     * @return \MBLBundle\Entity\Profil
     */
    public function getProfil()
    {
        return $this->profil;
    }
}
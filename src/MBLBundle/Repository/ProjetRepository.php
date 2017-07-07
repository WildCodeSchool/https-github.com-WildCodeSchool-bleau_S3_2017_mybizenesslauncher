<?php

namespace MBLBundle\Repository;

/**
 * ProjetRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProjetRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @param $locale
     * @return array
     *
     *
     */
    public function myfindOneById($id, $locale)
    {
        $qb = $this->createQueryBuilder('p');
        $qb->select('p.description' . $locale . ' as description',
            'p.id as id','p.titre' .$locale. ' as titre',
            'p.localisation as localisation',
            'p.dateCreation as dateCreation',
            'p.siteInternet' . $locale . ' as siteInternet',
            'p.ebustaUrl' . $locale . ' as ebustaUrl')
            ->join('p.typeDeProjet', 'tp')
            ->addSelect('tp.typeDeProjet' . $locale . ' as typeDeProjet')
            ->join('p.secteur', 's')
            ->addSelect('s.secteurActivite' . $locale . ' as secteur')

            ->where('p.id = :pid')
            ->setParameter('pid', $id)
        ;

        $projets = $qb->getQuery()->getResult();


        foreach ($projets as $key => $projet)
        {
//            Get metier et création d'un sous tableau'
            $qb = $this->createQueryBuilder('p');
            $qb->where('p.id = :id')
                ->join('p.profilsrecherches', 'r')
                ->join('r.metier', 'm')
                ->select('m.metier' . $locale . ' as metier')
                ->setParameter('id', $projet['id'])
            ;
            $projets[$key]['metier'] = $qb->getQuery()->getResult();

//            Get fichier si défini et si null
            $qb = $this->createQueryBuilder('p');
            $qb->where('p.id = :id')
                ->join('p.fichier', 'f')
                ->select('f.photo')
                ->setParameter('id', $projet['id'])
            ;
            $projets[$key]['fichier'] = $qb->getQuery()->getResult();

//            Get vill si défini et si null
            $qb = $this->createQueryBuilder('p');
            $qb->where('p.id = :id')
                ->select('p.ville')
                ->setParameter('id', $projet['id'])
            ;
            $projets[$key]['ville'] = $qb->getQuery()->getOneOrNullResult();
        }

        /*dump($projets); die();*/

        return $projets;
    }

    public function findLastProjets4($locale)
    {
        $qb = $this->createQueryBuilder('p');
        $qb->select('p.description' . $locale . ' as description','p.id as id','p.titre' .$locale. ' as titre',
            'p.localisation as localisation')
            ->join('p.typeDeProjet', 'tp')
            ->addSelect('tp.typeDeProjet' . $locale . ' as typeDeProjet')
            ->join('p.secteur', 's')
            ->addSelect('s.secteurActivite' . $locale . ' as secteur')
            ->setMaxResults(4)
            ->orderBy('p.id', 'DESC')
        ;

        $projets = $qb->getQuery()->getResult();


        foreach ($projets as $key => $projet)
        {
//            Get metier et création d'un sous tableau'
            $qb = $this->createQueryBuilder('p');
            $qb->where('p.id = :id')
                ->join('p.profilsrecherches', 'r')
                ->join('r.metier', 'm')
                ->select('m.metier' . $locale . ' as metier')
                ->setParameter('id', $projet['id'])
            ;
            $projets[$key]['metier'] = $qb->getQuery()->getResult();

//            Get fichier si défini et si null
            $qb = $this->createQueryBuilder('p');
            $qb->where('p.id = :id')
                ->join('p.fichier', 'f')
                ->select('f.photo')
                ->setParameter('id', $projet['id'])
            ;
            $projets[$key]['fichier'] = $qb->getQuery()->getResult();

//            Get vill si défini et si null
            $qb = $this->createQueryBuilder('p');
            $qb->where('p.id = :id')
                ->select('p.ville')
                ->setParameter('id', $projet['id'])
            ;
            $projets[$key]['ville'] = $qb->getQuery()->getOneOrNullResult();
        }

        /*dump($projets); die();*/

        return $projets;
    }

    public function findAllDesc($locale)
    {
        $qb = $this->createQueryBuilder('p');
        $qb->select('p.description' . $locale . ' as description', 'p.id as id', 'p.titre' . $locale . ' as titre', 'p.localisation as localisation')
            ->join('p.typeDeProjet', 'tp')
            ->addSelect('tp.typeDeProjet' . $locale . ' as typeDeProjet')
            ->join('p.secteur', 's')
            ->addSelect('s.secteurActivite' . $locale . ' as secteur')
            ->orderBy('p.id', 'DESC');
        $projets = $qb->getQuery()->getResult();



        foreach ($projets as $key => $projet) {
          // Get metier et création d'un sous tableau'
            $qb = $this->createQueryBuilder('p');
            $qb->where('p.id = :id')
                ->join('p.profilsrecherches', 'r')
                ->join('r.metier', 'm')
                ->select('m.metier' . $locale . ' as metier')
                ->setParameter('id', $projet['id']);
            $projets[$key]['metier'] = $qb->getQuery()->getResult();

          // Get fichier si défini et si null
            $qb = $this->createQueryBuilder('p');
            $qb->where('p.id = :id')
                ->join('p.fichier', 'f')
                ->select('f.photo')
                ->setParameter('id', $projet['id']);
            $projets[$key]['fichier'] = $qb->getQuery()->getResult();
        }
        return $projets;
    }

    public function findAllMyProjects($profilId)
    {
        return $this ->createQueryBuilder('p')
            ->select('p')
            ->orderBy('p.dateCreation', 'DESC')
            ->join('p.profils', 'pp')
            ->where('pp.id = :profilId')
            ->setParameter('profilId', $profilId)
            ->getQuery()
            ->getResult();// TODO: Change the autogenerated stub
    }
    public function myfindallMyProjects($id, $locale)
    {
        $qb = $this->createQueryBuilder('p');
        $qb->select('p.description' . $locale . ' as description', 'p.id as id', 'p.titre' . $locale . ' as titre', 'p.localisation as localisation')
            ->join('p.typeDeProjet', 'tp')
            ->addSelect('tp.typeDeProjet' . $locale . ' as typeDeProjet')
            ->join('p.secteur', 's')
            ->addSelect('s.secteurActivite' . $locale . ' as secteur')
            ->join('p.profils', 'pro')
            ->where('pro = :pr')
            ->setParameter('pr', $id)
            ->orderBy('p.id', 'DESC');

        $projets = $qb->getQuery()->getResult();



        foreach ($projets as $key => $projet) {
            // Get metier et création d'un sous tableau'
            $qb = $this->createQueryBuilder('p');
            $qb->where('p.id = :id')
                ->join('p.profilsrecherches', 'r')
                ->join('r.metier', 'm')
                ->select('m.metier' . $locale . ' as metier')
                ->setParameter('id', $projet['id']);
            $projets[$key]['metier'] = $qb->getQuery()->getResult();

            // Get fichier si défini et si null
            $qb = $this->createQueryBuilder('p');
            $qb->where('p.id = :id')
                ->join('p.fichier', 'f')
                ->select('f.photo')
                ->setParameter('id', $projet['id']);
            $projets[$key]['fichier'] = $qb->getQuery()->getResult();
        }
        return $projets;
    }
    public function myfindBySecteur($secteur, $locale)
    {
        $qb = $this->createQueryBuilder('p');
        $qb->select('p.description' . $locale . ' as description', 'p.id as id', 'p.titre' . $locale . ' as titre', 'p.localisation as localisation')
            ->join('p.typeDeProjet', 'tp')
            ->addSelect('tp.typeDeProjet' . $locale . ' as typeDeProjet')
            ->join('p.secteur', 's')
            ->addSelect('s.secteurActivite' . $locale . ' as secteur')
            ->andWhere('s.id = :secId')
            ->setParameter('secId', $secteur)
            ->orderBy('p.id', 'DESC');
        $projets = $qb->getQuery()->getResult();



        foreach ($projets as $key => $projet) {
            // Get metier et création d'un sous tableau'
            $qb = $this->createQueryBuilder('p');
            $qb->where('p.id = :id')
                ->join('p.profilsrecherches', 'r')
                ->join('r.metier', 'm')
                ->select('m.metier' . $locale . ' as metier')
                ->setParameter('id', $projet['id']);
            $projets[$key]['metier'] = $qb->getQuery()->getResult();

            // Get fichier si défini et si null
            $qb = $this->createQueryBuilder('p');
            $qb->where('p.id = :id')
                ->join('p.fichier', 'f')
                ->select('f.photo')
                ->setParameter('id', $projet['id']);
            $projets[$key]['fichier'] = $qb->getQuery()->getResult();
        }
    }
    public function myfindBySecteurLoc($secteur, $Loc, $locale)
    {
        $qb = $this->createQueryBuilder('p');
        $qb->select('p.description' . $locale . ' as description', 'p.id as id', 'p.titre' . $locale . ' as titre', 'p.localisation as localisation')
            ->join('p.typeDeProjet', 'tp')
            ->addSelect('tp.typeDeProjet' . $locale . ' as typeDeProjet')
            ->join('p.secteur', 's')
            ->addSelect('s.secteurActivite' . $locale . ' as secteur')
            ->andWhere('p.localisation = :Loc')
            ->setParameter('Loc', $Loc)
            ->andWhere('s.id = :secId')
            ->setParameter('secId', $secteur)
            ->orderBy('p.id', 'DESC');
        $projets = $qb->getQuery()->getResult();



        foreach ($projets as $key => $projet) {
            // Get metier et création d'un sous tableau'
            $qb = $this->createQueryBuilder('p');
            $qb->where('p.id = :id')
                ->join('p.profilsrecherches', 'r')
                ->join('r.metier', 'm')
                ->select('m.metier' . $locale . ' as metier')
                ->setParameter('id', $projet['id']);
            $projets[$key]['metier'] = $qb->getQuery()->getResult();

            // Get fichier si défini et si null
            $qb = $this->createQueryBuilder('p');
            $qb->where('p.id = :id')
                ->join('p.fichier', 'f')
                ->select('f.photo')
                ->setParameter('id', $projet['id']);
            $projets[$key]['fichier'] = $qb->getQuery()->getResult();
        }
    }
    public function myfindByTypeDeProjet($typeDeProjet, $locale)
    {
        $qb = $this->createQueryBuilder('p');
        $qb->select('p.description' . $locale . ' as description', 'p.id as id', 'p.titre' . $locale . ' as titre', 'p.localisation as localisation')
            ->join('p.typeDeProjet', 'tp')
            ->addSelect('tp.typeDeProjet' . $locale . ' as typeDeProjet')
            ->join('p.secteur', 's')
            ->addSelect('s.secteurActivite' . $locale . ' as secteur')
            ->where('tp.id = :typId')
            ->setParameter('typId', $typeDeProjet)
            ->orderBy('p.id', 'DESC');
        $projets = $qb->getQuery()->getResult();



        foreach ($projets as $key => $projet) {
            // Get metier et création d'un sous tableau'
            $qb = $this->createQueryBuilder('p');
            $qb->where('p.id = :id')
                ->join('p.profilsrecherches', 'r')
                ->join('r.metier', 'm')
                ->select('m.metier' . $locale . ' as metier')
                ->setParameter('id', $projet['id']);
            $projets[$key]['metier'] = $qb->getQuery()->getResult();

            // Get fichier si défini et si null
            $qb = $this->createQueryBuilder('p');
            $qb->where('p.id = :id')
                ->join('p.fichier', 'f')
                ->select('f.photo')
                ->setParameter('id', $projet['id']);
            $projets[$key]['fichier'] = $qb->getQuery()->getResult();
        }
    }
    public function myfindByTypeDeProjetLoc($typeDeProjet, $Loc, $locale)
    {
        $qb = $this->createQueryBuilder('p');
        $qb->select('p.description' . $locale . ' as description', 'p.id as id', 'p.titre' . $locale . ' as titre', 'p.localisation as localisation')
            ->join('p.typeDeProjet', 'tp')
            ->addSelect('tp.typeDeProjet' . $locale . ' as typeDeProjet')
            ->join('p.secteur', 's')
            ->addSelect('s.secteurActivite' . $locale . ' as secteur')
            ->where('tp.id = :typId')
            ->setParameter('typId', $typeDeProjet)
            ->andWhere('p.localisation = :Loc')
            ->setParameter('Loc', $Loc)
            ->orderBy('p.id', 'DESC');
        $projets = $qb->getQuery()->getResult();



        foreach ($projets as $key => $projet) {
            // Get metier et création d'un sous tableau'
            $qb = $this->createQueryBuilder('p');
            $qb->where('p.id = :id')
                ->join('p.profilsrecherches', 'r')
                ->join('r.metier', 'm')
                ->select('m.metier' . $locale . ' as metier')
                ->setParameter('id', $projet['id']);
            $projets[$key]['metier'] = $qb->getQuery()->getResult();

            // Get fichier si défini et si null
            $qb = $this->createQueryBuilder('p');
            $qb->where('p.id = :id')
                ->join('p.fichier', 'f')
                ->select('f.photo')
                ->setParameter('id', $projet['id']);
            $projets[$key]['fichier'] = $qb->getQuery()->getResult();
        }
    }
    public function myfindByTypEtSec($idSec, $idTyp, $locale)
    {
        $qb = $this->createQueryBuilder('p');
        $qb->select('p.description' . $locale . ' as description', 'p.id as id', 'p.titre' . $locale . ' as titre', 'p.localisation as localisation')
            ->join('p.typeDeProjet', 'tp')
            ->addSelect('tp.typeDeProjet' . $locale . ' as typeDeProjet')
            ->join('p.secteur', 's')
            ->addSelect('s.secteurActivite' . $locale . ' as secteur')
            ->where('tp.id = :typId')
            ->setParameter('typId', $idTyp)
            ->andWhere('s.id = :secId')
            ->setParameter('secId', $idSec)
            ->orderBy('p.id', 'DESC');
        $projets = $qb->getQuery()->getResult();



        foreach ($projets as $key => $projet) {
            // Get metier et création d'un sous tableau'
            $qb = $this->createQueryBuilder('p');
            $qb->where('p.id = :id')
                ->join('p.profilsrecherches', 'r')
                ->join('r.metier', 'm')
                ->select('m.metier' . $locale . ' as metier')
                ->setParameter('id', $projet['id']);
            $projets[$key]['metier'] = $qb->getQuery()->getResult();

            // Get fichier si défini et si null
            $qb = $this->createQueryBuilder('p');
            $qb->where('p.id = :id')
                ->join('p.fichier', 'f')
                ->select('f.photo')
                ->setParameter('id', $projet['id']);
            $projets[$key]['fichier'] = $qb->getQuery()->getResult();
        }
        return $projets;
    }

    public function myfindByTypSecloc($idSec, $idTyp, $Loc, $locale)
    {
        $qb = $this->createQueryBuilder('p');
        $qb->select('p.description' . $locale . ' as description', 'p.id as id', 'p.titre' . $locale . ' as titre', 'p.localisation as localisation')
            ->join('p.typeDeProjet', 'tp')
            ->addSelect('tp.typeDeProjet' . $locale . ' as typeDeProjet')
            ->join('p.secteur', 's')
            ->addSelect('s.secteurActivite' . $locale . ' as secteur')
            ->where('tp.id = :typId')
            ->setParameter('typId', $idTyp)
            ->andWhere('s.id = :secId')
            ->setParameter('secId', $idSec)
            ->andWhere('p.localisation = :Loc')
            ->setParameter('Loc', $Loc)
            ->orderBy('p.id', 'DESC');
        $projets = $qb->getQuery()->getResult();



        foreach ($projets as $key => $projet) {
            // Get metier et création d'un sous tableau'
            $qb = $this->createQueryBuilder('p');
            $qb->where('p.id = :id')
                ->join('p.profilsrecherches', 'r')
                ->join('r.metier', 'm')
                ->select('m.metier' . $locale . ' as metier')
                ->setParameter('id', $projet['id']);
            $projets[$key]['metier'] = $qb->getQuery()->getResult();

            // Get fichier si défini et si null
            $qb = $this->createQueryBuilder('p');
            $qb->where('p.id = :id')
                ->join('p.fichier', 'f')
                ->select('f.photo')
                ->setParameter('id', $projet['id']);
            $projets[$key]['fichier'] = $qb->getQuery()->getResult();
        }
        return $projets;
    }
}

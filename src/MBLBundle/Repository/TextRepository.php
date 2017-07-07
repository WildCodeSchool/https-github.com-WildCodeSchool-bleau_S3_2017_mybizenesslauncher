<?php

namespace MBLBundle\Repository;
use MBLBundle\Entity\Profil;

/**
 * SecteurRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TextRepository extends \Doctrine\ORM\EntityRepository
{
    public function myFindOneByChatId($texts_chat)
    {

        return $this ->createQueryBuilder('t')
            ->select('t')
            ->orderBy('t.dateCreation', 'DESC')
            ->setMaxResults(10)
            ->join('t.chats', 'chat')
            ->where('chat.id = :chatId')
            ->setParameter('chatId', $texts_chat)
            ->getQuery()
            ->getResult()
            ;

    }
    public function myFindOneByChatIdViewer($texts_chat, $currentUser)
    {
        return $this ->createQueryBuilder('t')
            ->select('t')
            ->orderBy('t.dateCreation', 'DESC')
            ->setMaxResults(10)
            ->join('t.chats', 'chat')
            ->where('chat.id = :chatId')
            ->setParameter('chatId', $texts_chat)
            ->andWhere('t.profil != :user')
            ->setParameter('user', $currentUser)
            ->getQuery()
            ->getResult()
            ;
    }
    public function myFindCountViews(Profil $current)
    {
        $qb = $this->createQueryBuilder('t')
            ->select('count(t) as nbmsg', 't.profil as profil')
            ->where('t.profil != :current ')
            ->andWhere('t.seen is null')
            ->join('t.chats', 'chat')
            ->join('chat.profils', 'pro')
            ->andWhere('pro.id = :proId')
            ->setParameters(array(
                    'proId'=> $current->getId(),
                    'current' => $current->getPrenom()
                )
            )
            ->groupBy('t.profil')
        ;
        return $qb->getQuery()->getResult();
    }
    public function myFindViews(Profil $current)
    {
        $qb = $this->createQueryBuilder('t')
            ->select('count(t) as nbmsg')
            ->where('t.profil != :current ')
            ->andWhere('t.seen is null')
            ->join('t.chats', 'chat')
            ->join('chat.profils', 'pro')
            ->andWhere('pro.id = :proId')
            ->setParameters(array(
                    'proId'=> $current->getId(),
                    'current' => $current->getPrenom()
                )
            )
        ;
        return $qb->getQuery()->getOneOrNullResult();
    }
}
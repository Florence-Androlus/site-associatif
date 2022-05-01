<?php

namespace App\Repository;

use App\Entity\Emargements2021;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Emargements2021|null findOneBy(array $criteria, array $orderBy = null)
 * @method Emargements2021[]    findAll()
 * @method Emargements2021[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmargementsRepository extends ServiceEntityRepository
{
  
   public function __construct(ManagerRegistry $registry)
   {
        parent::__construct($registry, Emargements2021::class);
   }

}

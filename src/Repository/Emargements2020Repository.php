<?php

namespace App\Repository;

use App\Entity\Emargements2020;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Emargements2020|null findOneBy(array $criteria, array $orderBy = null)
 * @method Emargements2020[]    findAll()
 * @method Emargements2020[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Emargements2020Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Emargements2020::class);
    }

}

<?php

namespace App\Repository;

use PDO;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 *
 */
class TablesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        
    }

    public function findAll()
    {
        $dbname = 'plusbellelhaysymfo';
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=localhost;dbname=plusbellelhaysymfo', 'root', '', $pdo_options);
        $result = $bdd->query("show tables");
        while ($row = $result->fetch(PDO::FETCH_NUM)) {
        echo $row[0];
        }

    /*    return $this->createQueryBuilder('u')
            ->where('u.username = :username OR u.email = :email')
            ->setParameter('username', $username)
            ->setParameter('email', $username)
            ->getQuery()
            ->getOneOrNullResult();*/
    }

}
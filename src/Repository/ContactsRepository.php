<?php

namespace App\Repository;

use Doctrine\ORM\Query;
use App\Entity\Contacts;
use App\Entity\CS2020;
use App\Entity\Sensibilite;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Contacts|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contacts[]    findAll()
 * @method Contacts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Contacts::class);
    }

    
    private function findVisibleQuery(): QueryBuilder
    {
        return $this->createQueryBuilder('p');
    }

     /**
      * @return Query
     */

    public function findAllVisibleQuery($request): Query
    {
        $query = $this->findVisibleQuery();

        $bureau=$request->get('bureau');
        $rue=$request->get('rue');
        $quartier=$request->get('quartier');
        $ville=$request->get('ville');
        $bday=$request->get('bday');
        
        if ($bureau!= "" && $bureau!= "Tous les bureaux" ){
            var_dump("bureau");
            $bureauhold=$bureau;
            if ($bureauhold!=$bureau){
                $rue="";
                }
            $query = $query
                        ->andWhere('p.Bureau = :bureau')
                        ->setParameter('bureau', $bureau);
        }

        if ($rue!="" && $rue!= "Toutes les rues" ){
            var_dump("rue");
            $query = $query
                        ->andWhere('p.rue = :rue')
                        ->setParameter('rue', $rue);
        }

        if ($quartier!="" && $quartier!= "Tous les quartiers"){
            var_dump("quartier:" .$quartier);
            $query = $query
                        ->andWhere('p.quartier = :quartier')
                        ->setParameter('quartier', $quartier);
        }

        if ($ville!="" && $ville!= "Toutes les villes"){
            var_dump("ville:" .$ville);
            $query = $query
                        ->andWhere('p.VilleLocalite = :ville')
                        ->setParameter('ville', $ville);
        }

        if ($bday!=""){
            var_dump("bday");
            $bday = strftime("%d/%m/%Y", strtotime($bday)); //format la date 01/01/2021
            $query = $query
                        ->andWhere('p.DateDeNaissance = :bday')
                        ->setParameter('bday', $bday);
        }

        return $query->getQuery();
     
    }


    /**
    * @return Contacts[] Returns an array of listeelectorale objects
    */
    
    public function findByBureauField($bureau)
    {
        return $this->createQueryBuilder('p')
                    ->andWhere('p.Bureau = :bureau')
                    ->setParameter('bureau', $bureau)
                    ->getQuery()
                    ->getResult()
                    ;
    }
    
    /**
     * @return Contacts[] Returns an array of listeelectorale objects
     */
    
    public function findByRueField($bureau,$quartier,$ville)
    {
        $query = $this->findVisibleQuery();

        if ($bureau!= "" && $bureau!= "Tous les bureaux" ){
            var_dump("bureau");
            $rue="";
            $query = $query
                        ->andWhere('p.Bureau = :bureau')
                        ->setParameter('bureau', $bureau);
        }

        if ($ville!="" && $ville!= "Toutes les villes"){
            var_dump("ville:" .$ville);
            $query = $query
                        ->andWhere('p.VilleLocalite = :ville')
                        ->setParameter('ville', $ville);
        }

        if ($quartier!="" && $quartier!= "Tous les quartiers"){
            var_dump("quartier:" .$quartier);
            $query = $query
                        ->andWhere('p.quartier = :quartier')
                        ->setParameter('quartier', $quartier);
        }

       /* if ($bday!=""){
            var_dump("bday");
            $bday = strftime("%d/%m/%Y", strtotime($bday)); //format la date 01/01/2021
            $query = $query
                        ->andWhere('p.DateDeNaissance = :bday')
                        ->setParameter('bday', $bday);
        }*/

        $query = $query->getQuery();

            return $query->getResult();
    }

    /**
     * @return Contacts[] Returns an array of listeelectorale objects
     */
    
    public function findByQuartierField($bureau,$quartier)
    {
            return $this->createQueryBuilder('p')
            ->andWhere('p.Bureau = :bureau AND p.quartier = :quartier')
            ->setParameter('bureau', $bureau)
            ->setParameter('quartier', $quartier )
            ->getQuery()
            ->getResult()
            ;
    }  
    /**
     * @return Contacts[] Returns an array of listeelectorale objects
     */
    
    public function findByVilleField()
    {
            return $this->createQueryBuilder('p')
                        ->select('p.VilleLocalite')
                        ->groupBy('p.VilleLocalite')
                        ->getQuery()
                        ->getResult()
                        ;
    } 

    /**
     * @return Contacts[] Returns an array of listeelectorale objects
     */
    
    public function findByBdayField($bureau,$bday)
    {         
            return $this->createQueryBuilder('p')
            ->andWhere('p.Bureau = :bureau AND p.DateDeNaissance = :bday')
            ->setParameter('bureau', $bureau)
            ->setParameter('bday', $bday )
            ->getQuery()
            ->getResult()
            ;
    }

    public function findContacts_CS($request)
    {         
        $nom=$request->get('Nom');
        $mois=$request->get('Mois');
        $bday=$request->get('bday');

        $query = $this->createQueryBuilder('c');
        
        $query -> select('c.Civilite',
        'c.Nom',
        'c.NomDusage',
        'c.Prenoms',
        'c.DateDeNaissance',
        'c.tel',
        'c.mobile',
        'p._1erdons',
        'p.types1erdons',
        'p.Date1erdons',
        'p.Mois1erdons',
        'p._2edons',
        'p.types2edons',
        'p.Date2emedons',
        'p.Mois2emedons'
        ) 
            ->Join(
            CS2020::class,
            'p',
            Join::WITH,
            'c.Numcontact = p.Numcontact'
            )
        ->orderBy('p.Date1erdons', 'ASC');

        if ($nom!= ""){
            $query = $query
                        ->andWhere('c.Nom = :nom')
                        ->setParameter('nom', $nom);
        }

        if ($mois!= "" && $mois!= "Tous les mois"){
            $query = $query
                        ->andWhere('p.Mois1erdons = :mois')
                        ->setParameter('mois', $mois);
        }

        if ($bday!=""){
            $bday = strftime("%d/%m/%Y", strtotime($bday)); //format la date 01/01/2021
            $query = $query
                        ->andWhere('c.DateDeNaissance = :bday')
                        ->setParameter('bday', $bday);
        }

        return $query;
    }

    public function findContacts_Adhesion()
    {         
       $qb = $this->createQueryBuilder('c');
        
        $qb -> select('c.Civilite',
        'c.Nom',
        'c.NomDusage',
        'c.Prenoms',
        'c.DateDeNaissance',
        'c.tel',
        'c.mobile',
        'p.adhesionpbl2015',
        'p.adhesionpbl2016',
        'p.adhesionpbl2017',
        'p.adhesionpbl2018',
        'p.adhesionpbl2019',
        'p.adhesionpbl2020',
        'p.adhesionpbl2021'
        ) 
            ->Join(
            Sensibilite::class,
            'p',
            Join::WITH,
            'c.Numcontact = p.contact'
            );

        return $qb;
    }

    public function findContacts_Adhesion_show($adhesion)
    {         
        $qb = $this->createQueryBuilder('c');
        
        $qb -> select('c.Civilite',
        'c.Nom',
        'c.NomDusage',
        'c.Prenoms',
        'c.DateDeNaissance',
        'c.tel',
        'c.mobile',
        'p.'.$adhesion
        ) 
            ->Join(
            Sensibilite::class,
            'p',
            Join::WITH,
            'c.Numcontact = p.contact'
            );

        return $qb;
    }
}

<?php

namespace App\Repository;

use App\Entity\LE2021;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use App\Entity\Emargements2021;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method LE2021|null findOneBy(array $criteria, array $orderBy = null)
 * @method LE2021[]    findAll()
 * @method LE2021[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListeElectoraleRepository extends ServiceEntityRepository
{
  
   public function __construct(ManagerRegistry $registry)
   {
        parent::__construct($registry, LE2021::class);
   }

   private function findVisibleQuery(): QueryBuilder
   {
       $query = $this->createQueryBuilder('c');
       
       $query -> select('c.Bureau',
       'c.Numelect',
       'c.Civilite',
       'c.Nom',
       'c.NomDusage',
       'c.Prenoms',
       'c.DateDeNaissance',
       'c.NumRue',
       'c.BisTerQuater',
       'c.Rue',
       'c.CodePostal',
       'c.Commune',
       'p.id',
       'p.Avote',
       'p.mandant_bureau',
       'p.mandant_Numelect',
       'p.mandataire_bureau',
       'p.mandataire_Numelectr',
       ) 
           ->Join(
           Emargements2021::class,
           'p',
           Join::WITH,
           'c.Bureau = p.Bureau'
           )
       ->Where('c.Numelect = p.Numelect') 
           ;

       return $query;
   }

     /**
      * @return Query
     */

    public function findAllVisibleQuery($request,$rue): Query
    {
        
        $bureau=$request->get('Bureau');
        $nom=$request->get('Nom');
        $bday=$request->get('bday');

        $query = $this->findVisibleQuery();

        if ($bureau!= "" && $bureau!= "Tous les bureaux" ){
           //  var_dump($bureau);
             $query = $query
                         ->andWhere('c.Bureau = :bureau')
                         ->setParameter('bureau', $bureau);
         }
         
         if ($nom!="" && $nom!= "Toutes les Noms" ){
         //   var_dump($nom);
            $query = $query
                        ->andWhere('c.Nom = :nom')
                        ->setParameter('nom', $nom);
        }

        if ($rue!="" && $rue!= "Toutes les rues" ){
       //     var_dump($rue);
            $query = $query
                        ->andWhere('c.Rue = :rue')
                        ->setParameter('rue', $rue);
        }

        if ($bday!=""){
            var_dump("bday");
            $bday = strftime("%d/%m/%Y", strtotime($bday)); //format la date 01/01/2021
            $query = $query
                        ->andWhere('c.DateDeNaissance = :bday')
                        ->setParameter('bday', $bday);
        }

        return $query->getQuery();
     
    }
 
    // /**
    //  * @return Electeurs[] Returns an array of listeelectorale objects
    //  */
    
    public function findByBureauField($bureau)
    {
        return $this->createQueryBuilder('p')
                    ->andWhere('p.Bureau = :bureau')
                    ->setParameter('bureau', $bureau)
                    ->orderBy('p.Rue', 'ASC')
                    ->getQuery()
                    ->getResult()
                    ;
    }

    /**
     * @return Electeurs[] Returns an array of listeelectorale objects
     */
    
    public function findByRueField($bureau)
    {
        
        $query = $this->findVisibleQuery();
 
        if ($bureau!= "" && $bureau!= "Tous les bureaux" ){
         //   var_dump("bureau");
            $rue="Toutes les rues";
            $query = $query
                        ->andWhere('p.Bureau = :bureau')
                        ->setParameter('bureau', $bureau);
        }

        /*
        if ($bday!=""){
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
     * @return Electeurs[] Returns an array of listeelectorale objects
     */
    
    public function findByVilleField()
    {
            return $this->createQueryBuilder('p')
                        ->select('p.Commune')
                        ->groupBy('p.Commune')
                        ->getQuery()
                        ->getResult()
                        ;
    } 
    /**
     * @return Electeurs[] Returns an array of listeelectorale objects
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
 
}

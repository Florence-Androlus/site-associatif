<?php

namespace App\Controller\Backend;

use PDO;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route(" /admin")
 */
class AdminController extends AbstractController
{
    
    /**
     * @Route("/", name="tables")
     */
    public function index()
    {
        $dbname = 'plusbellelhaysymfo';
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=localhost;dbname=plusbellelhaysymfo', 'root', '', $pdo_options);
        $result = $bdd->query("show tables");
        while ($row = $result->fetch(PDO::FETCH_NUM)) {
            $tables[]= $row[0];
        }

        return $this->render('admin/tables.html.twig', [
            'tables' => $tables,
        ]);
    }

    /**
     * @Route("/new", name="admin.table.new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $dbname = 'plusbellelhaysymfo';
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=localhost;dbname=plusbellelhaysymfo', 'root', '', $pdo_options);
        $result = $bdd->query("show tables");
        while ($row = $result->fetch(PDO::FETCH_NUM)) {
            $tables[]= $row[0];
        }

        return $this->render('admin/colonnes.html.twig', [
            'tables' => $tables,
        ]);
    }

    /**
     * @Route("/{name}/edit", name="admin.table.edit", methods={"GET","POST"})
     */
    public function edit(Request $request): Response
    {
        $dbname = 'plusbellelhaysymfo';
        $tablename =$request->get('name');

        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=localhost;dbname=plusbellelhaysymfo', 'root', '', $pdo_options);
        $result = $bdd->query("SHOW COLUMNS FROM  $tablename");
        while ($row = $result->fetch(PDO::FETCH_NUM)) {
            $colonnes[]= $row[0];
        }

        return $this->render('admin/colonnes.html.twig', [
            'colonnes' => $colonnes,
            'tablename' => $tablename,
        ]);
    }

     /**
     * @Route("/{name}/copier", name="admin.table.copier", methods={"GET","POST"})
     */
    public function copier(Request $request): Response
    {
        $dbname = 'plusbellelhaysymfo';
        $tableName =$request->get('name');
        $newTable ='copie1';

        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=localhost;dbname=plusbellelhaysymfo', 'root', '', $pdo_options);
        $bdd->query("CREATE TABLE $newTable LIKE $tableName");
        $result = $bdd->query("show tables");
        while ($row = $result->fetch(PDO::FETCH_NUM)) {
            $tables[]= $row[0];
        }

        return $this->render('admin/tables.html.twig', [
            'tables' => $tables,
        ]);
    }

    /**
     * @Route("/{name}", name="admin.table.delete", methods={"DELETE"})
     */
    public function delete(Request $request): Response
    {
        $dbname = 'plusbellelhaysymfo';
        $tableName =$request->get('name');
        
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=localhost;dbname=plusbellelhaysymfo', 'root', '', $pdo_options);
        $bdd->query("DROP TABLE $tableName");
        $result = $bdd->query("show tables");
        while ($row = $result->fetch(PDO::FETCH_NUM)) {
            $tables[]= $row[0];
        }

        return $this->render('admin/tables.html.twig', [
            'tables' => $tables,
        ]);
    }

    
    /**
     * @Route("/Column", name="column.update", methods={"PUT","POST"})
     * 
     */
    public function update(Request $req,EntityManagerInterface $entityManager): Response
    {

        $jsoncontent=$req->getContent();
        $data = json_decode($jsoncontent);

        $titleValue=$data->title;
        $tablename =$data->tablename;
        $colonne = $data->colonne;

        $dbname = 'plusbellelhaysymfo';

        var_dump($titleValue, $tablename, $colonne);
        die;

    /*    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=localhost;dbname=plusbellelhaysymfo', 'root', '', $pdo_options);
        $bdd->query("ALTER TABLE $tablename CHANGE $colonne $titleValue");
        $result = $bdd->query("SHOW COLUMNS FROM  $tablename");
        while ($row = $result->fetch(PDO::FETCH_NUM)) {
            $colonnes[]= $row[0];
        }

        $response = JsonResponse::fromJsonString(Response::HTTP_OK);
        return $response ;*/

    }

}

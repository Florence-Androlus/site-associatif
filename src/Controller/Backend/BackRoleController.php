<?php

namespace App\Controller\Backend;

use App\Entity\Role;
use App\Form\RoleType;
use App\Repository\RoleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(" /admin/role")
 */
class BackRoleController extends AbstractController
{
    
    /**
     * @Route("/", name="admin.role.index", methods={"GET"})
     */
    public function index(RoleRepository $roleRepository): Response
    {
        return $this->render('admin/role/index.html.twig', [
            'roles' => $roleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin.role.new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $role = new Role();
        $form = $this->createForm(RoleType::class, $role);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($role);
            $entityManager->flush();

            return $this->redirectToRoute('admin.role.index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/role/new.html.twig', [
            'role' => $role,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin.role.edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Role $role): Response
    {
        $form = $this->createForm(RoleType::class, $role);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin.role.index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/role/edit.html.twig', [
            'role' => $role,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin.role.delete", methods={"DELETE"})
     */
    public function delete(Request $request, Role $role): Response
    {
        if ($this->isCsrfTokenValid('delete'.$role->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($role);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin.role.index', [], Response::HTTP_SEE_OTHER);
    }
}

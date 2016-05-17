<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AdminBundle\Entity\FoodSupplier;
use AdminBundle\Form\FoodSupplierType;

/**
 * FoodSupplier controller.
 *
 */
class FoodSupplierController extends Controller
{
    /**
     * Lists all FoodSupplier entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $foodSuppliers = $em->getRepository('AdminBundle:FoodSupplier')->findAll();

        return $this->render('foodsupplier/index.html.twig', array(
            'foodSuppliers' => $foodSuppliers,
        ));
    }

    /**
     * Creates a new FoodSupplier entity.
     *
     */
    public function newAction(Request $request)
    {
        $foodSupplier = new FoodSupplier();
        $form = $this->createForm('AdminBundle\Form\FoodSupplierType', $foodSupplier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($foodSupplier);
            $em->flush();

            return $this->redirectToRoute('foodsupplier_show', array('id' => $foodSupplier->getId()));
        }

        return $this->render('foodsupplier/new.html.twig', array(
            'foodSupplier' => $foodSupplier,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a FoodSupplier entity.
     *
     */
    public function showAction(FoodSupplier $foodSupplier)
    {
        $deleteForm = $this->createDeleteForm($foodSupplier);

        return $this->render('foodsupplier/show.html.twig', array(
            'foodSupplier' => $foodSupplier,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing FoodSupplier entity.
     *
     */
    public function editAction(Request $request, FoodSupplier $foodSupplier)
    {
        $deleteForm = $this->createDeleteForm($foodSupplier);
        $editForm = $this->createForm('AdminBundle\Form\FoodSupplierType', $foodSupplier);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($foodSupplier);
            $em->flush();

            return $this->redirectToRoute('foodsupplier_edit', array('id' => $foodSupplier->getId()));
        }

        return $this->render('foodsupplier/edit.html.twig', array(
            'foodSupplier' => $foodSupplier,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a FoodSupplier entity.
     *
     */
    public function deleteAction(Request $request, FoodSupplier $foodSupplier)
    {
        $form = $this->createDeleteForm($foodSupplier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($foodSupplier);
            $em->flush();
        }

        return $this->redirectToRoute('foodsupplier_index');
    }

    /**
     * Creates a form to delete a FoodSupplier entity.
     *
     * @param FoodSupplier $foodSupplier The FoodSupplier entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FoodSupplier $foodSupplier)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('foodsupplier_delete', array('id' => $foodSupplier->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

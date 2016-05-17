<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AdminBundle\Entity\MenuItem;
use AdminBundle\Form\MenuItemType;

/**
 * MenuItem controller.
 *
 */
class MenuItemController extends Controller
{
    /**
     * Lists all MenuItem entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $menuItems = $em->getRepository('AdminBundle:MenuItem')->findAll();

        return $this->render('menuitem/index.html.twig', array(
            'menuItems' => $menuItems,
        ));
    }

    /**
     * Creates a new MenuItem entity.
     *
     */
    public function newAction(Request $request)
    {
        $menuItem = new MenuItem();
        $form = $this->createForm('AdminBundle\Form\MenuItemType', $menuItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($menuItem);
            $em->flush();

            return $this->redirectToRoute('menuitem_show', array('id' => $menuItem->getId()));
        }

        return $this->render('menuitem/new.html.twig', array(
            'menuItem' => $menuItem,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MenuItem entity.
     *
     */
    public function showAction(MenuItem $menuItem)
    {
        $deleteForm = $this->createDeleteForm($menuItem);

        return $this->render('menuitem/show.html.twig', array(
            'menuItem' => $menuItem,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MenuItem entity.
     *
     */
    public function editAction(Request $request, MenuItem $menuItem)
    {
        $deleteForm = $this->createDeleteForm($menuItem);
        $editForm = $this->createForm('AdminBundle\Form\MenuItemType', $menuItem);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($menuItem);
            $em->flush();

            return $this->redirectToRoute('menuitem_edit', array('id' => $menuItem->getId()));
        }

        return $this->render('menuitem/edit.html.twig', array(
            'menuItem' => $menuItem,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MenuItem entity.
     *
     */
    public function deleteAction(Request $request, MenuItem $menuItem)
    {
        $form = $this->createDeleteForm($menuItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($menuItem);
            $em->flush();
        }

        return $this->redirectToRoute('menuitem_index');
    }

    /**
     * Creates a form to delete a MenuItem entity.
     *
     * @param MenuItem $menuItem The MenuItem entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MenuItem $menuItem)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('menuitem_delete', array('id' => $menuItem->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

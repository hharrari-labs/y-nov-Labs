<?php

namespace Ynov\LabsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ynov\LabsBundle\Entity\Statut;
use Ynov\LabsBundle\Form\StatutType;

/**
 * Statut controller.
 *
 */
class StatutController extends Controller
{

    /**
     * Lists all Statut entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('YnovLabsBundle:Statut')->findAll();

        return $this->render('YnovLabsBundle:Statut:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Statut entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Statut();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('statut_show', array('id' => $entity->getId())));
        }

        return $this->render('YnovLabsBundle:Statut:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Statut entity.
    *
    * @param Statut $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Statut $entity)
    {
        $form = $this->createForm(new StatutType(), $entity, array(
            'action' => $this->generateUrl('statut_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Statut entity.
     *
     */
    public function newAction()
    {
        $entity = new Statut();
        $form   = $this->createCreateForm($entity);

        return $this->render('YnovLabsBundle:Statut:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Statut entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('YnovLabsBundle:Statut')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Statut entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('YnovLabsBundle:Statut:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Statut entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('YnovLabsBundle:Statut')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Statut entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('YnovLabsBundle:Statut:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Statut entity.
    *
    * @param Statut $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Statut $entity)
    {
        $form = $this->createForm(new StatutType(), $entity, array(
            'action' => $this->generateUrl('statut_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Statut entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('YnovLabsBundle:Statut')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Statut entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('statut_edit', array('id' => $id)));
        }

        return $this->render('YnovLabsBundle:Statut:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Statut entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('YnovLabsBundle:Statut')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Statut entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('statut'));
    }

    /**
     * Creates a form to delete a Statut entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('statut_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

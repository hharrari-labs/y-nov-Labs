<?php

namespace Ynov\LabsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ynov\LabsBundle\Entity\Labs;
use Ynov\LabsBundle\Entity\Site;
use Ynov\LabsBundle\Entity\Statut;
use Ynov\LabsBundle\Form\LabsType;

/**
 * Labs controller.
 *
 */
class LabsController extends Controller
{

    /**
     * Lists all Labs entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('YnovLabsBundle:Labs')->findAll();
         
        return $this->render('YnovLabsBundle:Labs:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Labs entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Labs();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('labs_show', array('id' => $entity->getId())));
        }

        return $this->render('YnovLabsBundle:Labs:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Labs entity.
    *
    * @param Labs $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Labs $entity)
    {
        $form = $this->createForm(new LabsType(), $entity, array(
            'action' => $this->generateUrl('labs_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Labs entity.
     *
     */
    public function newAction()
    {
        $entity = new Labs();
        $form   = $this->createCreateForm($entity);

        return $this->render('YnovLabsBundle:Labs:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Labs entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('YnovLabsBundle:Labs')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Labs entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('YnovLabsBundle:Labs:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Labs entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('YnovLabsBundle:Labs')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Labs entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('YnovLabsBundle:Labs:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Labs entity.
    *
    * @param Labs $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Labs $entity)
    {
        $form = $this->createForm(new LabsType(), $entity, array(
            'action' => $this->generateUrl('labs_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Labs entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('YnovLabsBundle:Labs')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Labs entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('labs_edit', array('id' => $id)));
        }

        return $this->render('YnovLabsBundle:Labs:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Labs entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('YnovLabsBundle:Labs')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Labs entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('labs'));
    }

    /**
     * Creates a form to delete a Labs entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('labs_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

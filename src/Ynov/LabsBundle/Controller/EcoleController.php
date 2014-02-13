<?php

namespace Ynov\LabsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ynov\LabsBundle\Entity\Ecole;
use Ynov\LabsBundle\Form\EcoleType;

/**
 * Ecole controller.
 *
 */
class EcoleController extends Controller
{

    /**
     * Lists all Ecole entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('YnovLabsBundle:Ecole')->findAll();

        return $this->render('YnovLabsBundle:Ecole:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Ecole entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Ecole();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ecole_show', array('id' => $entity->getId())));
        }

        return $this->render('YnovLabsBundle:Ecole:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Ecole entity.
    *
    * @param Ecole $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Ecole $entity)
    {
        $form = $this->createForm(new EcoleType(), $entity, array(
            'action' => $this->generateUrl('ecole_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Ecole entity.
     *
     */
    public function newAction()
    {
        $entity = new Ecole();
        $form   = $this->createCreateForm($entity);

        return $this->render('YnovLabsBundle:Ecole:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Ecole entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('YnovLabsBundle:Ecole')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ecole entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('YnovLabsBundle:Ecole:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Ecole entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('YnovLabsBundle:Ecole')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ecole entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('YnovLabsBundle:Ecole:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Ecole entity.
    *
    * @param Ecole $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Ecole $entity)
    {
        $form = $this->createForm(new EcoleType(), $entity, array(
            'action' => $this->generateUrl('ecole_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Ecole entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('YnovLabsBundle:Ecole')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ecole entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('ecole_edit', array('id' => $id)));
        }

        return $this->render('YnovLabsBundle:Ecole:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Ecole entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('YnovLabsBundle:Ecole')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Ecole entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ecole'));
    }

    /**
     * Creates a form to delete a Ecole entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ecole_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

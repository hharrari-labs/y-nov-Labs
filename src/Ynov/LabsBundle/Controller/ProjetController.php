<?php

namespace Ynov\LabsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ynov\LabsBundle\Entity\Projet;
use Ynov\LabsBundle\Form\ProjetType;

/**
 * Projet controller.
 *
 */
class ProjetController extends Controller
{

    /**
     * Lists all Projet entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('YnovLabsBundle:Projet')->findAll();

        return $this->render('YnovLabsBundle:Projet:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Projet entity.
     *
     */
    public function createAction(Request $request)
    {
        if(!$this->isAdmin() && !$this->isDirlab() && !$this->isChefprojet()){
             return $this->redirect($this->generateUrl('accueil'));
        }
        $entity = new Projet();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if($entity->getFile()!=null){
                $entity->upload();
            }
            if($entity->getPhotos()->count()>0){
                foreach ($entity->getPhotos() as $photo){
                   $photo->upload();
                   $photo->setIdprojet($entity);
                }
            }
            $date = new \DateTime("now", new \DateTimeZone('Europe/Paris'));
            $entity->setDatecreation($date);
            $entity->setDatemajprojet($date);
            $entity->setIdutilisateur($this->getUser());
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('projet'));
        }

        return $this->render('YnovLabsBundle:Projet:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Projet entity.
    *
    * @param Projet $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Projet $entity)
    {
        $form = $this->createForm(new ProjetType(), $entity, array(
            'action' => $this->generateUrl('projet_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Projet entity.
     *
     */
    public function newAction()
    {
        if(!$this->isAdmin() && !$this->isDirlab() && !$this->isChefprojet()){
             return $this->redirect($this->generateUrl('accueil'));
        }
        $entity = new Projet();
        $form   = $this->createCreateForm($entity);

        return $this->render('YnovLabsBundle:Projet:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Projet entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('YnovLabsBundle:Projet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Projet entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('YnovLabsBundle:Projet:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Projet entity.
     *
     */
    public function editAction($id)
    {
        if(!$this->isAdmin() && !$this->isDirlab() && !$this->isChefprojet()){
             return $this->redirect($this->generateUrl('accueil'));
        }

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('YnovLabsBundle:Projet')->find($id);
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Projet entity.');
        }
        if($this->isChefprojet() && $entity->getIdutilisateur()->getId()!=$this->getUser()->getId()){
             return $this->redirect($this->generateUrl('projet'));
        }
        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('YnovLabsBundle:Projet:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Projet entity.
    *
    * @param Projet $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Projet $entity)
    {
        $form = $this->createForm(new ProjetType(), $entity, array(
            'action' => $this->generateUrl('projet_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Projet entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('YnovLabsBundle:Projet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Projet entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {

            if($entity->getPhotos()->count()>1){
                foreach ($entity->getPhotos() as $photo){
                   $photo->upload();
                   $photo->setIdprojet($entity);
                }
            }
            $date = new \DateTime("now", new \DateTimeZone('Europe/Paris'));
            $entity->setDatemajprojet($date);
            $em->flush();

            return $this->redirect($this->generateUrl('projet'));
        }

        return $this->render('YnovLabsBundle:Projet:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Projet entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('YnovLabsBundle:Projet')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Projet entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('projet'));
    }

    /**
     * Creates a form to delete a Projet entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('projet_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

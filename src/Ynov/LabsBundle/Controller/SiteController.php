<?php

namespace Ynov\LabsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ynov\LabsBundle\Entity\Labs;
use Ynov\LabsBundle\Entity\Site;
use Ynov\LabsBundle\Form\SiteType;

/**
 * Site controller.
 *
 */
class SiteController extends Controller
{

    /**
     * Lists all Site entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('YnovLabsBundle:Site')->findAll();

        return $this->render('YnovLabsBundle:Site:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Site entity.
     *
     */
    public function createAction(Request $request)
    {
        if(!$this->isAdmin()){
             return $this->redirect($this->generateUrl('accueil'));
        }
        $entity = new Site();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $date = new \DateTime("now", new \DateTimeZone('Europe/Paris'));
            $entity->setDatecreation($date);
            $labs= $entity->getLabs();
            $em->persist($entity);
            $em->flush();
            foreach($labs as $lab){
                $labsite= new \Ynov\LabsBundle\Entity\Labsites();
                $labsite->setIdlab($lab);
                $labsite->setIdsite($entity);
                $em->persist($labsite);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('site'));
        }

        return $this->render('YnovLabsBundle:Site:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Site entity.
    *
    * @param Site $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Site $entity)
    {
        $form = $this->createForm(new SiteType(), $entity, array(
            'action' => $this->generateUrl('site_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Site entity.
     *
     */
    public function newAction()
    {
        if(!$this->isAdmin()){
             return $this->redirect($this->generateUrl('accueil'));
        }
        $entity = new Site();
        $form   = $this->createCreateForm($entity);

        return $this->render('YnovLabsBundle:Site:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Site entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('YnovLabsBundle:Site')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Site entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('YnovLabsBundle:Site:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Site entity.
     *
     */
    public function editAction($id)
    {
        //Un utilisateur non administrateur ne peut pas créer une école
        if(!$this->isAdmin()){
             return $this->redirect($this->generateUrl('accueil'));
        }
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('YnovLabsBundle:Site')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Site entity.');
        }
        $labSitesEntities=$em->getRepository('YnovLabsBundle:Labsites')->findByidsite($id);
        foreach($labSitesEntities as $labSitesEntity){
            $entity->addLab($labSitesEntity->getIdlab());
        }
        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);
  
        return $this->render('YnovLabsBundle:Site:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Site entity.
    *
    * @param Site $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Site $entity)
    {
        $form = $this->createForm(new SiteType(), $entity, array(
            'action' => $this->generateUrl('site_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Site entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        if(!$this->isAdmin()){
             return $this->redirect($this->generateUrl('accueil'));
        }
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('YnovLabsBundle:Site')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Site entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $labs=$entity->getLabs();
            $labSitesEntities=$em->getRepository('YnovLabsBundle:Labsites')->findByidsite($id);
            foreach($labSitesEntities as $labSitesEntity){
             $i=0;
             foreach($labs as $lab){
                if($lab->getId()==$labSitesEntity->getIdlab()->getId()){
                    $labs->removeElement($lab);
                 $i+=1;
                }
             }
             if($i==0){
                 $em->remove($labSitesEntity);
             }
            }
            foreach($labs as $lab){
                $labSite= new \Ynov\LabsBundle\Entity\Labsites();
                $labSite->setIdlab($lab);
                $labSite->setIdsite($entity);
                $em->persist($labSite);
                $em->flush();
             }
            $em->flush();

            return $this->redirect($this->generateUrl('site'));
        }

        return $this->render('YnovLabsBundle:Site:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Site entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        if(!$this->isAdmin()){
             return $this->redirect($this->generateUrl('accueil'));
        }
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('YnovLabsBundle:Site')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Site entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('site'));
    }

    /**
     * Creates a form to delete a Site entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('site_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

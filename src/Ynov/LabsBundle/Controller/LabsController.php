<?php

namespace Ynov\LabsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ynov\LabsBundle\Entity\Labs;
use Ynov\LabsBundle\Entity\Site;
use Ynov\LabsBundle\Entity\Labsites;
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
        $labsites = $em->getRepository('YnovLabsBundle:Labsites')->findAll();
        $url_lab = array(   1 => "http://www.ingesup.com/formation-informatique/laboratoire/laboratoire-games.html",
                                    2 => "http://www.ingesup.com/formation-informatique/laboratoire/laboratoire-microsoft.html  ",
                                    3=> "http://www.ingesup.com/formation-informatique/laboratoire/laboratoire-microsoft.html  ",
                                    4 => "http://www.ingesup.com/formation-informatique/laboratoire/laboratoire-reseau-securite.html" ,
                                    5 => "http://www.ingesup.com/formation-informatique/laboratoire/laboratoire-reseau-securite.html" ,
                                    6 => "http://www.ingesup.com/formation-informatique/laboratoire/laboratoire-developpement.html" ,
                                    7 => "http://www.ingesup.com/formation-informatique/laboratoire/laboratoire-apple.html" ,
                                    8 => "http://www.ingesup.com/formation-informatique/laboratoire/laboratoire-apple.html", 
                                    9 => "http://www.ingesup.com/formation-informatique/laboratoire/laboratoire-apple.html" ,
                                    10 => "http://www.ingesup.com/formation-informatique/laboratoire/laboratoire-apple.html", 
                    );
        return $this->render('YnovLabsBundle:Labs:index.html.twig', array(
            'entities' => $entities,
            'labsites' => $labsites,
            'url_lab' => $url_lab,
        ));
    }
    /**
     * Creates a new Labs entity.
     *
     */
    public function createAction(Request $request)
    {
//        if(!$this->isAdmin()){
//             return $this->redirect($this->generateUrl('accueil'));
//        }
        $entity = new Labs();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $date = new \DateTime("now", new \DateTimeZone('Europe/Paris'));
            $entity->setDatecreation($date);
            $entity->setDatemajlab($date);
            //$entity->setIdutilisateur($utilisateur);
            $sites=$entity->getSites();
            $em->persist($entity);
            $em->flush();
            foreach($sites as $site){
                $labsite= new \Ynov\LabsBundle\Entity\Labsites();
                $labsite->setIdlab($entity);
                $labsite->setIdsite($site);
                $entity->setIdutilisateur($this->getUser());
                $em->persist($labsite);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('labs'));
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
//        if(!$this->isAdmin()){
//             return $this->redirect($this->generateUrl('accueil'));
//        }
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
        if(!$this->isAdmin()){
             return $this->redirect($this->generateUrl('accueil'));
        }
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
        if(!$this->isAdmin()){
             return $this->redirect($this->generateUrl('accueil'));
        }
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('YnovLabsBundle:Labs')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Labs entity.');
        }
        if($this->isDirlab() && $entity->getIdutilisateur()->getId()!=$this->getUser()->getId()){
             return $this->redirect($this->generateUrl('labs'));
        }
        $labSitesEntities=$em->getRepository('YnovLabsBundle:Labsites')->findByidlab($id);
        foreach($labSitesEntities as $labSitesEntity){
            $entity->addSite($labSitesEntity->getIdsite());
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
            
            $sites=$entity->getSites();
            $labSitesEntities=$em->getRepository('YnovLabsBundle:Labsites')->findByidlab($id);
            foreach($labSitesEntities as $labSitesEntity){
             $i=0;
             foreach($sites as $site){
                if($site->getId()==$labSitesEntity->getIdsite()->getId()){
                    $sites->removeElement($site);
                 $i+=1;
                }
             }
             if($i==0){
                 $em->remove($labSitesEntity);
             }
            }
            foreach($sites as $site){
                $labSite= new \Ynov\LabsBundle\Entity\Labsites();
                $labSite->setIdlab($entity);
                $labSite->setIdsite($site);
                $em->persist($labSite);
                $em->flush();
             }
            $date = new \DateTime("now", new \DateTimeZone('Europe/Paris'));
            $entity->setDatemajlab($date);
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
        if(!$this->isAdmin()){
             return $this->redirect($this->generateUrl('accueil'));
        }
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

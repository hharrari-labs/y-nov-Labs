<?php

namespace Ynov\LabsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ynov\LabsBundle\Entity\Site;

class DefaultController extends Controller
{
    public function indexAction()
    {
         $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('YnovLabsBundle:Site')->findAll();
//        foreach ($entities as $entity) {
//            $entityId[] = $entity->getId();
//        }
        
        $array_color = array( 1 => "well-primary",
                              2 => "well-warning",
                              3 => "well-info" ,
                              4 => "well-success" ,
                              7 => "well-danger",
                              8 => "well-success",
                              9 => "well-info",
                              10 => "well-warning",
                            );
        $array_url_ecole = array(   1 => "http://www.ingesup.com/",
                                    2 => "http://www.ingesup.com/ecole-informatique/toulouse.html",
                                    3 => "http://www.ingesup.com/ecole-informatique/lyon.html" ,
                                    4 => "http://www.ingesup.com/ecole-informatique/aix-en-provence.html" ,
                                    7 => "http://www.ingesup.com/ecole-informatique/bordeaux.html", 
                                    8 => "http://www.ingesup.com/ecole-informatique/bordeaux.html", 
                                    9 => "http://www.ingesup.com/ecole-informatique/bordeaux.html", 
                                    10 => "http://www.ingesup.com/ecole-informatique/bordeaux.html", 
                            );
        
        $array_href_ecole = array(  1 => "https://www.google.fr/maps/preview/uv?hl=fr&pb=!1s0x47e66d87cd17cecb:0x24395f816fe5623!2m5!2m2!1i80!2i80!3m1!2i100!3m1!7e1!4shttps://plus.google.com/113841909326749329385/photos?hl%3Dfr%26socfid%3Dweb:lu:kp:placepageimage%26socpid%3D1!5singesup+-+Recherche+Google&sa=X&ei=tVlMU9bbBcTZOoPmgagN&ved=0CKIBEKIqMAs",
                                    2 => "http://www.ingesup.com/ecole-informatique/toulouse.html",
                                    3 => "http://www.ingesup.com/ecole-informatique/lyon.html" ,
                                    4 => "/maps/preview/uv?hl=fr&amp;pb=!1s0x12c98d0cabd78355:0x708c9118b235878b!2m5!2m2!1i80!2i80!3m1!2i100!3m1!7e1!4shttps://plus.google.com/110879477323800476719/photos?hl%3Dfr%26socfid%3Dweb:lu:kp:placepageimage%26socpid%3D1!5singesup+aix+-+Recherche+Google&amp;sa=X&amp;ei=0lVMU_bKL4aW0QWeiIHwDA&amp;ved=0CLcBEKIqMAo" ,
                                    7 => "/maps/preview/uv?hl=fr&amp;pb=!1s0xd55287c2c0f1d0d:0x39d74ef785e4ccb7!2m5!2m2!1i80!2i80!3m1!2i100!3m1!7e1!4shttps://plus.google.com/111617093082269088663/photos?hl%3Dfr%26socfid%3Dweb:lu:kp:placepageimage%26socpid%3D1!5singesup+bordeaux+-+Recherche+Google&amp;sa=X&amp;ei=FVdMU7bSJ4TZ0QWf_YHQBA&amp;sqi=2&amp;ved=0CL0BEKIqMAo" 
                            );
        $array_img_ecole = array(   1 => "https://cbks0.google.com/cbk?output=tile&cb_client=maps_sv&panoid=gatsV0eOpKMAAAQDMaL2Yw&x=0&y=0&zoom=5",
                                    2 => "http://www.forma-search.com/uploads/gallerie/Ecole/20501/presentation.jpg",
                                    3 => "http://sdz-upload.s3.amazonaws.com/prod/schools/medias/Aix2.jpg" ,
                                    4 => "https://lh5.googleusercontent.com/-uiMeFKIbmoE/Ue0VlvylbxI/AAAAAACTpfg/SPFTGnYtJtU/s213-k-no/Ing%25C3%25A9sup" ,
                                    7 => "https://lh3.googleusercontent.com/-omtAt2aUmqM/UbxKIrbg9nI/AAAAAACIsLA/RhbMa-jwfAI/s160-k-no/Ing%25C3%25A9sup", 
                                    8 => "http://www.forma-search.com/uploads/gallerie/Ecole/20501/presentation.jpg", 
                                    9 => "https://lh3.googleusercontent.com/-omtAt2aUmqM/UbxKIrbg9nI/AAAAAACIsLA/RhbMa-jwfAI/s160-k-no/Ing%25C3%25A9sup", 
                                    10 => "http://sdz-upload.s3.amazonaws.com/prod/schools/medias/Aix2.jpg", 
                            );
        
           
        return $this->render('YnovLabsBundle:Default:index.html.twig', array(
            'entities' => $entities,
            'array_color'=>$array_color,
            'array_url_ecole'=>$array_url_ecole,
            'array_href_ecole'=>$array_href_ecole,
            'array_img_ecole'=>$array_img_ecole,
        ));
        
                
        
    }
    
    
}

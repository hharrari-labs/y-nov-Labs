<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php

namespace Ynov\LabsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class ProjSearchType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('projet','entity', array(
                  'class' => 'YnovLabsBundle:Projet',
                  'query_builder' => function(EntityRepository $er) {
                  return $er->createQueryBuilder('p')
                  ->orderBy('p.nomprojet', 'ASC');
                  },
                  'empty_value' => 'Nom',
                  'required' => false)
                  )
            ->add('annee','date',array(
                  'label'=>'Année',
                  'empty_value' => 'Année',
                  'required' => false)
                 )
            ->add('ecole','entity', array(
                  'class' => 'YnovLabsBundle:Site',
                  'query_builder' => function(EntityRepository $er) {
                  return $er->createQueryBuilder('s')
                  ->orderBy('s.nomsite', 'ASC');
                  },
                  'empty_value' => 'Ecole',
                  'required' => false)
                 )
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            //'data_class' => 'Ynov\LabsBundle\Entity\Projet'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'proj_search';
    }
}

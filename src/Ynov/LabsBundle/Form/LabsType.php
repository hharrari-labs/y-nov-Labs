<?php

namespace Ynov\LabsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
class LabsType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomlab')
            ->add('datecreation')
//            ->add('codecouleur')
            ->add('datemajlab')
            ->add('descriptionlab')
            ->add('idutilisateur')
            ->add('sites','entity', array(
                  'class' => 'YnovLabsBundle:Site',
                  'query_builder' => function(EntityRepository $er) {
                  return $er->createQueryBuilder('s')
                  ->orderBy('s.nomsite', 'ASC');
                  },
                  'expanded' => true,
                  'multiple' =>true,
                  'required'    => true,
                   ));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ynov\LabsBundle\Entity\Labs'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ynov_labsbundle_labs';
    }
}

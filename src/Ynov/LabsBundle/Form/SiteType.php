<?php

namespace Ynov\LabsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
class SiteType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomsite')
            ->add('adressesite')
            ->add('telephone')
            ->add('fax')
            ->add('datecreation')
            ->add('idecole','entity', array(
                  'class' => 'YnovLabsBundle:Ecole',
                  'query_builder' => function(EntityRepository $er) {
                  return $er->createQueryBuilder('e')
                  ->orderBy('e.nomecole', 'ASC');
                  },))
            ->add('idlab','entity', array(
                  'class' => 'YnovLabsBundle:Labs',
                  'property' => 'nomlab',
                  'expanded' => true,
                  'multiple' =>true,
                  'required'    => true,
                   ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ynov\LabsBundle\Entity\Site'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ynov_labsbundle_site';
    }
}

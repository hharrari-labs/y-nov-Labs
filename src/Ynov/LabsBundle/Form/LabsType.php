<?php

namespace Ynov\LabsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

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
            ->add('codecouleur')
            ->add('datemajlab')
            ->add('descriptionlab')
            ->add('idutilisateur')
        ;
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

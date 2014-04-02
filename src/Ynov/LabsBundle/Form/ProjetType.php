<?php

namespace Ynov\LabsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class ProjetType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomprojet')
            ->add('statutprojet')
            ->add('videoprojet')
            ->add('description')
            ->add('datecreation')
            ->add('datemajprojet')
            ->add('technologie')
            ->add('equipe')
            ->add('lienprojet')
            ->add('logo')
            ->add('file')
            ->add('idphoto')
            ->add('idlab','entity', array(
                  'class' => 'YnovLabsBundle:Labs',
                  'query_builder' => function(EntityRepository $er) {
                  return $er->createQueryBuilder('l')
                  ->orderBy('l.nomlab', 'ASC');
                  },))
            ->add('idutilisateur')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ynov\LabsBundle\Entity\Projet'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ynov_labsbundle_projet';
    }
}

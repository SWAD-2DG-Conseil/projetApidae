<?php

namespace ApidaeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TraductionObjetApidaeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('traDescriptionCourte')
            ->add('traDescriptionLongue')
            ->add('traDescriptionPersonnalisee')
            ->add('traBonsPlans')
            ->add('traInfosSup')
            ->add('modifier', SubmitType::class, array('label' => 'Modifier'))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ApidaeBundle\Entity\TraductionObjetApidae'
        ));
    }
}
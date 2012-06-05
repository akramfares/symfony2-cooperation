<?php

namespace msql\facoopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CooperationsType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('objectifs')
            ->add('contacts')
        ;
    }

    public function getName()
    {
        return 'msql_facoopbundle_cooperationstype';
    }
}

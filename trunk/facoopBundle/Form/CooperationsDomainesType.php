<?php

namespace msql\facoopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CooperationsDomainesType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('domaines')
        ;
    }

    public function getName()
    {
        return 'msql_facoopbundle_cooperationsdomainestype';
    }
    
    
}

<?php

namespace msql\facoopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CooperationsEmbeddedType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
        	->add('objectifs')
            ->add('contacts', new ContactsEmbeddedType())
        ;
    }

    public function getName()
    {
        return 'msql_facoopbundle_cooperationsembeddedtype';
    }
}

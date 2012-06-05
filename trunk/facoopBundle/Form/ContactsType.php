<?php

namespace msql\facoopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ContactsType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('fonction')
            ->add('tel')
            ->add('fax')
            ->add('mail')
            ->add('institution')
        ;
    }

    public function getName()
    {
        return 'msql_facoopbundle_contactstype';
    }
}

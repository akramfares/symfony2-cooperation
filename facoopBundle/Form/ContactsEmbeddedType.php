<?php

namespace msql\facoopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ContactsEmbeddedType extends AbstractType
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
            ->add('institution', new InstitutionType())
        ;
    }

    public function getName()
    {
        return 'msql_facoopbundle_contactsembeddedtype';
    }
    
    public function getDefaultOptions(array $options)
    {
    	return array(
    			'data_class' => 'msql\facoopBundle\Entity\Contacts',
    	);
    }
}

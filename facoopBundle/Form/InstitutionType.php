<?php

namespace msql\facoopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class InstitutionType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('institution')
            ->add('nature')
            ->add('adresse')
            ->add('pays')
        ;
    }

    public function getName()
    {
        return 'msql_facoopbundle_institutiontype';
    }
    
    public function getDefaultOptions(array $options)
    {
    	return array(
    			'data_class' => 'msql\facoopBundle\Entity\Institution',
    	);
    }
}

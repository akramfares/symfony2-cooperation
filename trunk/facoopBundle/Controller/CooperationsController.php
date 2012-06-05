<?php

namespace msql\facoopBundle\Controller;

use msql\facoopBundle\Entity\CooperationsHasDomaines;

use msql\facoopBundle\Form\CooperationsDomainesType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use msql\facoopBundle\Entity\Cooperations;
use msql\facoopBundle\Form\CooperationsType;
use msql\facoopBundle\Form\CooperationsEmbeddedType;

/**
 * Cooperations controller.
 *
 * @Route("/cooperations")
 */
class CooperationsController extends Controller
{
    /**
     * Lists all Cooperations entities.
     *
     * @Route("/", name="cooperations")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('msqlfacoopBundle:Cooperations')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Cooperations entity.
     *
     * @Route("/{id}/show", name="cooperations_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('msqlfacoopBundle:Cooperations')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cooperations entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Cooperations entity.
     *
     * @Route("/new", name="cooperations_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Cooperations();
        $form   = $this->createForm(new CooperationsType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }
    
    /**
     * Displays a form to create a new Cooperations entity.
     *
     * @Route("/embedded", name="cooperations_embedded")
     * @Template()
     */
    public function embeddedAction()
    {
    	$entity = new Cooperations();
    	$form   = $this->createForm(new CooperationsEmbeddedType(), $entity);
    
    	return array(
    			'entity' => $entity,
    			'form'   => $form->createView()
    	);
    }

    /**
     * Creates a new Cooperations entity.
     *
     * @Route("/create", name="cooperations_create")
     * @Method("post")
     * @Template("msqlfacoopBundle:Cooperations:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Cooperations();
        $request = $this->getRequest();
        $form    = $this->createForm(new CooperationsType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cooperations_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }
    
    /**
     * Creates a new Cooperations entity.
     *
     * @Route("/embeddedcreate", name="cooperations_embeddedcreate")
     * @Method("post")
     * @Template("msqlfacoopBundle:Cooperations:embedded.html.twig")
     */
    public function embeddedcreateAction()
    {
    	$entity  = new Cooperations();
    	$request = $this->getRequest();
    	$form    = $this->createForm(new CooperationsEmbeddedType(), $entity);
    	$form->bindRequest($request);
    
    	if ($form->isValid()) {
    		$em = $this->getDoctrine()->getEntityManager();
    		$em->persist($entity->getContacts()->getInstitution());
    		$em->persist($entity->getContacts());
    		$em->persist($entity);
    		$em->flush();
    
    		return $this->redirect($this->generateUrl('cooperations_show', array('id' => $entity->getId())));
    
    	}
    
    	return array(
    			'entity' => $entity,
    			'form'   => $form->createView()
    	);
    }

    /**
     * Displays a form to edit an existing Cooperations entity.
     *
     * @Route("/{id}/edit", name="cooperations_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('msqlfacoopBundle:Cooperations')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cooperations entity.');
        }

        $editForm = $this->createForm(new CooperationsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Cooperations entity.
     *
     * @Route("/{id}/update", name="cooperations_update")
     * @Method("post")
     * @Template("msqlfacoopBundle:Cooperations:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('msqlfacoopBundle:Cooperations')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cooperations entity.');
        }

        $editForm   = $this->createForm(new CooperationsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cooperations_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Cooperations entity.
     *
     * @Route("/{id}/delete", name="cooperations_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('msqlfacoopBundle:Cooperations')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Cooperations entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cooperations'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
    
    /**
     * Displays a form to edit an existing Cooperations entity.
     *
     * @Route("/{id}/adddomaine", name="cooperations_adddomaine")
     * @Template()
     */
    public function addDomaineAction($id)
    {
    	$message='';
    	$em = $this->container->get('doctrine')->getEntityManager();
    	$coop = $em->find('msqlfacoopBundle:Cooperations', $id);
    
    	if (!$coop)
    	{
    		throw new NotFoundHttpException("Coopération non trouvée");
    	}
    	 
    	$form = $this->container->get('form.factory')->create(new CooperationsDomainesType(), $coop);
    
    	$request = $this->container->get('request');
    
    	if ($request->getMethod() == 'POST')
    	{
    		$form->bindRequest($request);
    
    		if ($form->isValid())
    		{
    			$em = $this->container->get('doctrine')->getEntityManager();
    			
    			foreach($coop->getDomaines() as $domaines)
    			{
    				$coopdom = new CooperationsHasDomaines();
    				$coopdom->setCooperationsId($coop->getId());
    				$coopdom->setDomainesId($domaines->getId());
    				$em->persist($coopdom);
    			}
    			$em->flush();
    			$message='Domaine ajouté avec succès !';
    		}
    	}
    
    	return $this->container->get('templating')->renderResponse(
    			'msqlfacoopBundle:Cooperations:addDomaine.html.twig',
    			array(
    					'form' => $form->createView(),
    					'message' => $message,
    			));
    }
}

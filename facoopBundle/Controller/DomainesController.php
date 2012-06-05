<?php

namespace msql\facoopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use msql\facoopBundle\Entity\Domaines;
use msql\facoopBundle\Form\DomainesType;

/**
 * Domaines controller.
 *
 * @Route("/domaines")
 */
class DomainesController extends Controller
{
    /**
     * Lists all Domaines entities.
     *
     * @Route("/", name="domaines")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('msqlfacoopBundle:Domaines')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Domaines entity.
     *
     * @Route("/{id}/show", name="domaines_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('msqlfacoopBundle:Domaines')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Domaines entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Domaines entity.
     *
     * @Route("/new", name="domaines_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Domaines();
        $form   = $this->createForm(new DomainesType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Domaines entity.
     *
     * @Route("/create", name="domaines_create")
     * @Method("post")
     * @Template("msqlfacoopBundle:Domaines:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Domaines();
        $request = $this->getRequest();
        $form    = $this->createForm(new DomainesType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('domaines_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Domaines entity.
     *
     * @Route("/{id}/edit", name="domaines_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('msqlfacoopBundle:Domaines')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Domaines entity.');
        }

        $editForm = $this->createForm(new DomainesType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Domaines entity.
     *
     * @Route("/{id}/update", name="domaines_update")
     * @Method("post")
     * @Template("msqlfacoopBundle:Domaines:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('msqlfacoopBundle:Domaines')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Domaines entity.');
        }

        $editForm   = $this->createForm(new DomainesType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('domaines_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Domaines entity.
     *
     * @Route("/{id}/delete", name="domaines_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('msqlfacoopBundle:Domaines')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Domaines entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('domaines'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}

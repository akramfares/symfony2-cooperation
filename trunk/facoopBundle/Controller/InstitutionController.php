<?php

namespace msql\facoopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use msql\facoopBundle\Entity\Institution;
use msql\facoopBundle\Form\InstitutionType;

/**
 * Institution controller.
 *
 * @Route("/institution")
 */
class InstitutionController extends Controller
{
    /**
     * Lists all Institution entities.
     *
     * @Route("/", name="institution")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('msqlfacoopBundle:Institution')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Institution entity.
     *
     * @Route("/{id}/show", name="institution_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('msqlfacoopBundle:Institution')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Institution entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Institution entity.
     *
     * @Route("/new", name="institution_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Institution();
        $form   = $this->createForm(new InstitutionType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Institution entity.
     *
     * @Route("/create", name="institution_create")
     * @Method("post")
     * @Template("msqlfacoopBundle:Institution:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Institution();
        $request = $this->getRequest();
        $form    = $this->createForm(new InstitutionType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('institution_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Institution entity.
     *
     * @Route("/{id}/edit", name="institution_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('msqlfacoopBundle:Institution')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Institution entity.');
        }

        $editForm = $this->createForm(new InstitutionType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Institution entity.
     *
     * @Route("/{id}/update", name="institution_update")
     * @Method("post")
     * @Template("msqlfacoopBundle:Institution:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('msqlfacoopBundle:Institution')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Institution entity.');
        }

        $editForm   = $this->createForm(new InstitutionType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('institution_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Institution entity.
     *
     * @Route("/{id}/delete", name="institution_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('msqlfacoopBundle:Institution')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Institution entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('institution'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}

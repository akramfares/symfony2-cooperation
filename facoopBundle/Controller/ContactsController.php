<?php

namespace msql\facoopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use msql\facoopBundle\Entity\Contacts;
use msql\facoopBundle\Form\ContactsType;

/**
 * Contacts controller.
 *
 * @Route("/contacts")
 */
class ContactsController extends Controller
{
    /**
     * Lists all Contacts entities.
     *
     * @Route("/", name="contacts")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('msqlfacoopBundle:Contacts')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Contacts entity.
     *
     * @Route("/{id}/show", name="contacts_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('msqlfacoopBundle:Contacts')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contacts entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Contacts entity.
     *
     * @Route("/new", name="contacts_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Contacts();
        $form   = $this->createForm(new ContactsType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Contacts entity.
     *
     * @Route("/create", name="contacts_create")
     * @Method("post")
     * @Template("msqlfacoopBundle:Contacts:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Contacts();
        $request = $this->getRequest();
        $form    = $this->createForm(new ContactsType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('contacts_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Contacts entity.
     *
     * @Route("/{id}/edit", name="contacts_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('msqlfacoopBundle:Contacts')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contacts entity.');
        }

        $editForm = $this->createForm(new ContactsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Contacts entity.
     *
     * @Route("/{id}/update", name="contacts_update")
     * @Method("post")
     * @Template("msqlfacoopBundle:Contacts:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('msqlfacoopBundle:Contacts')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contacts entity.');
        }

        $editForm   = $this->createForm(new ContactsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('contacts_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Contacts entity.
     *
     * @Route("/{id}/delete", name="contacts_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('msqlfacoopBundle:Contacts')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Contacts entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('contacts'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}

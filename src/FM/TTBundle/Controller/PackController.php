<?php

namespace FM\TTBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FM\TTBundle\Entity\Pack;
use FM\TTBundle\Form\PackType;

/**
 * Pack controller.
 *
 * @Route("/packs")
 */
class PackController extends Controller
{

    /**
     * Lists all Pack entities.
     *
     * @Route("/", name="packs")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FMTTBundle:Pack')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Pack entity.
     *
     * @Route("/", name="packs_create")
     * @Method("POST")
     * @Template("FMTTBundle:Pack:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Pack();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('packs_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Pack entity.
    *
    * @param Pack $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Pack $entity)
    {
        $form = $this->createForm(new PackType(), $entity, array(
            'action' => $this->generateUrl('packs_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Finds and displays a Pack entity.
     *
     * @Route("/{id}", name="packs_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FMTTBundle:Pack')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pack entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Pack entity.
     *
     * @Route("/{id}/edit", name="packs_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FMTTBundle:Pack')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pack entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Pack entity.
    *
    * @param Pack $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Pack $entity)
    {
        $form = $this->createForm(new PackType(), $entity, array(
            'action' => $this->generateUrl('packs_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Pack entity.
     *
     * @Route("/{id}", name="packs_update")
     * @Method("PUT")
     * @Template("FMTTBundle:Pack:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FMTTBundle:Pack')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pack entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('packs_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Pack entity.
     *
     * @Route("/{id}", name="packs_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FMTTBundle:Pack')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Pack entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('packs'));
    }

    /**
     * Creates a form to delete a Pack entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('packs_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    /**
     * @Route("/{id}/import", name="packs_import")
     * @Method("POST")
     * @Template()
     */
    public function importAction($id, Request $request)
    {
        $user = $this->get('security.context')->getToken()->getUser();

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('FMTTBundle:Pack')->find($id);

        $converter = $this->get('source_file_converter');
        $localizer = $this->get('locale_normalizer');

        $errors = array();

        $sourceLocale = $localizer->normalize($request->request->get('source_locale'));
        $targetLocale = $localizer->normalize($request->request->get('target_locale'));

        if(false === $sourceLocale)
        {
            $errors['source_locale'] = 'Invalid locale!';
        }

        if(false === $targetLocale)
        {
            $errors['target_locale'] = 'Invalid locale!';
        }

        $domain = $request->request->get('domain', '');
        if('' === $domain)
        {
            $errors['domain'] = 'Invalid domain!';
        }

        $useMessages = $request->request->get('use_messages');

        if(count($errors) === 0)
        {
            $path = $request->files->get('source')->getPathName();
            $data = $converter->convert($path, $sourceLocale, $targetLocale);

            if(false === $data)
            {
                $errors['source'] = 'Could not parse input file.';
            }
            else
            {
                $importer = $this->get('mt_importer');
                $status = $importer->import($user, $entity, $domain, $data, $useMessages);
            }
        }
    
        return array('entity' => $entity, 'errors' => $errors, 'values' => $request->request->all());
    }
}

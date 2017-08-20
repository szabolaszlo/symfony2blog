<?php

namespace Blog\AdminBundle\Controller;

use Blog\ModelBundle\Entity\Tag;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Tag controller.
 *
 * @Route("tag")
 */
class TagController extends Controller
{
    /**
     * Lists all tag entities.
     *
     * @Route("/")
     * @Method("GET")
     *
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tags = $em->getRepository('ModelBundle:Tag')->findAll();

        return array(
            'tags' => $tags,
        );
    }

    /**
     * Creates a new tag entity.
     *
     * @Route("/new")
     * @Method({"GET", "POST"})
     *
     * @Template()
     */
    public function newAction(Request $request)
    {
        $tag = new Tag();
        $form = $this->createForm('Blog\ModelBundle\Form\TagType', $tag);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tag);
            $em->flush();

            return $this->redirectToRoute('blog_admin_tag_show', array('id' => $tag->getId()));
        }

        return array(
            'tag' => $tag,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a tag entity.
     *
     * @Route("/{id}")
     * @Method("GET")
     *
     * @Template()
     */
    public function showAction(Tag $tag)
    {
        $deleteForm = $this->createDeleteForm($tag);

        return array(
            'tag' => $tag,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing tag entity.
     *
     * @Route("/{id}/edit")
     * @Method({"GET", "POST"})
     *
     * @Template()
     */
    public function editAction(Request $request, Tag $tag)
    {
        $deleteForm = $this->createDeleteForm($tag);
        $editForm = $this->createForm('Blog\ModelBundle\Form\TagType', $tag);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('blog_admin_tag_edit', array('id' => $tag->getId()));
        }

        return array(
            'tag' => $tag,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a tag entity.
     *
     * @Route("/{id}")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Tag $tag)
    {
        $form = $this->createDeleteForm($tag);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tag);
            $em->flush();
        }

        return $this->redirectToRoute('blog_admin_tag_index');
    }

    /**
     * Creates a form to delete a tag entity.
     *
     * @param Tag $tag The tag entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Tag $tag)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blog_admin_tag_delete', array('id' => $tag->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}

<?php

namespace Blog\CoreBundle\Controller;

use Blog\ModelBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Registration controller.
 *
 * @Route("/{_locale}/registration", requirements={"_locale"="en|es"}, defaults={"_locale"="en"})
 */
class RegistrationController extends Controller
{
    /**
     * @Route("/index")
     * @Method({"GET", "POST"})
     * @Template("CoreBundle:User:new.html.twig")
     */
    public function indexAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm('Blog\ModelBundle\Form\UserType', $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('blog_core_registration_success', array('id' => $user->getId()));
        }

        return array(
            'user' => $user,
            'form' => $form->createView(),
        );
    }

    /**
     * @Route("/{id}")
     * @Method({"GET", "POST"})
     * @Template("CoreBundle:User:success.html.twig")
     */
    public function successAction(User $user)
    {
        return array(
            'user' => $user
        );
    }
}

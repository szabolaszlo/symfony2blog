<?php
/**
 * Created by PhpStorm.
 * User: szabolaszlo
 * Date: 2017.08.27.
 * Time: 20:39
 */

namespace Blog\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Security controller.
 *
 * @Route("/{_locale}/login", requirements={"_locale"="en|es"}, defaults={"_locale"="en"})
 */
class SecurityController extends Controller
{
    /**
     * @Route("/login")
     * @Method({"GET", "POST"})
     */
    public function loginAction()
    {
        $helper = $this->get('security.authentication_utils');
        return $this->render(
            'CoreBundle:Security:login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $helper->getLastUsername(),
                'error' => $helper->getLastAuthenticationError(),
            )
        );
    }

    /**
     * Login check
     *
     * @Route("/login_check")
     */
    public function loginCheckAction()
    {
    }

    /**
     * Logout
     *
     * @Route("/logout")
     */
    public function logoutAction()
    {
    }
}
<?php

namespace Blog\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class TagController
 * @package Blog\CoreBundle\Controller
 * @Route("/{_locale}/tag", requirements={"_locale"="en|es"}, defaults={"_locale"="en"})
 */
class TagController extends Controller
{
    /**
     * Show posts by tag
     *
     * @param string $slug
     *
     * @throws NotFoundHttpException
     *
     * @Route("/{slug}")
     *
     * @Template()
     */
    public function showAction($slug)
    {
        $tag = $this->getDoctrine()->getRepository('ModelBundle:Tag')->findOneBy(
            array(
                'slug' => $slug,
            )
        );
        if (null === $tag) {
            throw $this->createNotFoundException('Tag was not found');
        }

        $posts = $this->getDoctrine()->getRepository('ModelBundle:Post')->findByTag($tag);

        return
            array(
                'tag' => $tag,
                'posts' => $posts,
            );
    }
}

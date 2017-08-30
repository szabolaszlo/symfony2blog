<?php

namespace Blog\AdminBundle\Controller;

use Blog\ModelBundle\Entity\Setting;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Setting controller.
 *
 * @Route("setting")
 */
class SettingController extends Controller
{
    /**
     * Lists all setting entities.
     *
     * @Route("/")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $settings = $this->getDoctrine()->getRepository('ModelBundle:Setting')->findAll();

        return array('settings' => $settings);
    }

    /**
     * Displays a form to edit an existing setting entity.
     *
     * @Route("/edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $settings = $request->get('settings', array());

        foreach ($settings as $key => $value) {
            $setting = $em->getRepository('ModelBundle:Setting')->findOneBy(
                array('settingKey' => $key)
            );

            if ($setting) {
                $setting->setSettingSwitch($value);
                $em->persist($setting);
            }
        }
        $em->flush();

        return $this->redirectToRoute('blog_admin_setting_index');
    }
}

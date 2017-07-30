<?php
/**
 * Created by PhpStorm.
 * User: szabolaszlo
 * Date: 2017.07.30.
 * Time: 11:29
 */

namespace Blog\ModelBundle\DataFixtures\ORM;

use Blog\ModelBundle\Entity\Tag;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class Posts
 * @package Blog\ModelBundle\DataFixtures\ORM
 */
class Tags extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $t1 = new Tag();
        $t1->setName('news');
        $t1->addPost($this->getFirstPost($manager));

        $manager->persist($t1);
        $manager->flush();
    }

    /**
     * @param ObjectManager $manager
     * @return mixed
     */
    private function getFirstPost(ObjectManager $manager)
    {
        $posts = $manager->getRepository('ModelBundle:Post')->findAll();
        return $posts[0];
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 20;
    }
}

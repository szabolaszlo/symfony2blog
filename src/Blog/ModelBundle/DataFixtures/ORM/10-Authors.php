<?php
/**
 * Created by PhpStorm.
 * User: szabolaszlo
 * Date: 2017.07.30.
 * Time: 11:29
 */

namespace Blog\ModelBundle\DataFixtures\ORM;

use Blog\ModelBundle\Entity\Author;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class Authors
 * @package Blog\ModelBundle\DataFixtures\ORM
 */
class Authors extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $a1 = new Author();
        $a1->setName('David');

        $a2 = new Author();
        $a2->setName('Eddie');

        $a3 = new Author();
        $a3->setName('Elsa');

        $manager->persist($a1);
        $manager->persist($a2);
        $manager->persist($a3);

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 10;
    }
}
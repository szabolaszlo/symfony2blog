<?php
/**
 * Created by PhpStorm.
 * User: szabolaszlo
 * Date: 2017.07.30.
 * Time: 11:29
 */

namespace Blog\ModelBundle\DataFixtures\ORM;

use Blog\ModelBundle\Entity\Author;
use Blog\ModelBundle\Entity\Post;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class Posts
 * @package Blog\ModelBundle\DataFixtures\ORM
 */
class Posts extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $p1 = new Post();
        $p1->setTitle('Donec mollis turpis orci');
        $p1->setBody('Ut molestie lectus porttitor vel. Aenean sagittis sed mi vitae suscipit. Maecenas eu odio risus. Cras ut libero in diam faucibus condimentum in sit amet sem. Nullam ac varius libero, ac suscipit nisl. Vivamus ullamcorper tortor in lacus lacinia, a porttitor quam iaculis. Vestibulum nec tincidunt sapien, nec maximus diam. Aliquam lobortis sit amet lacus sed maximus. Fusce posuere eget enim nec mollis. Nam vel leo posuere, consectetur sapien sit amet, pulvinar justo.');
        $p1->setAuthor($this->getAuthor($manager, 'David'));

        $p2 = new Post();
        $p2->setTitle('Sed pharetra blandit velit id laoreet');
        $p2->setBody('Nulla sodales justo eleifend ipsum efficitur vehicula. In vel pretium libero. Vestibulum dignissim tortor eu efficitur faucibus. Nullam dictum dictum orci, ut consequat mauris volutpat quis. Nam blandit porta orci, aliquet mollis elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean maximus nibh vel purus mollis, eget egestas ipsum viverra. Ut eu maximus enim, vitae luctus magna. In vitae facilisis magna. Nulla ut condimentum metus, ut condimentum odio. Etiam euismod massa id nibh scelerisque, sit amet condimentum enim malesuada.');
        $p2->setAuthor($this->getAuthor($manager, 'Eddie'));

        $p3 = new Post();
        $p3->setTitle('Nullam dignissim ipsum sed faucibus finibus');
        $p3->setBody('Maecenas in dui ex. Integer luctus dui metus, eu elementum elit aliquet non. Vestibulum mollis ullamcorper risus. Donec pharetra, mauris at malesuada faucibus, orci odio vehicula risus, id euismod tortor mauris sed libero. Nam libero risus, pharetra quis tortor ut, dapibus luctus dolor. Etiam consequat fermentum lectus. Phasellus id tempus purus, sed ullamcorper dolor. In id justo nibh.');
        $p3->setAuthor($this->getAuthor($manager, 'Eddie'));

        $manager->persist($p1);
        $manager->persist($p2);
        $manager->persist($p3);

        $manager->flush();
    }

    /**
     * @param ObjectManager $manager
     * @param $authorName
     *
     * @return Author
     */
    private function getAuthor(ObjectManager $manager, $authorName)
    {
        return $manager->getRepository('ModelBundle:Author')->findOneBy(
            array('name' => $authorName)
        );
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 15;
    }
}
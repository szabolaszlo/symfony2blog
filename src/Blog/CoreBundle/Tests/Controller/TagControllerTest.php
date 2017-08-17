<?php

namespace Blog\CoreBundle\Tests\Controller;

use Blog\ModelBundle\Entity\Tag;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TagControllerTest extends WebTestCase
{
    public function testShow()
    {
        $client = static::createClient();
        /** @var Tag $tag */
        $tags = $client->getContainer()->get('doctrine')->getManager()->getRepository('ModelBundle:Tag')->findUsedTags();
        $tag = $tags[0];
        $tagPostsCount = $tag->getPosts()->count();
        $crawler = $client->request('GET', '/tag/'.$tag->getSlug());
        $this->assertTrue($client->getResponse()->isSuccessful(), 'The response was not successful');
        $this->assertCount($tagPostsCount, $crawler->filter('h2'), 'There should be '.$tagPostsCount.' posts');
    }

}

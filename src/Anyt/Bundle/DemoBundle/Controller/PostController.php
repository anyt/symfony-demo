<?php

namespace Anyt\Bundle\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Apoutchika\LoremIpsumBundle\Services\LoremIpsum;
use Anyt\Bundle\DemoBundle\Model\Post;

class PostController extends Controller
{
    public function generatedPostsAction($count)
    {
        /** @var LoremIpsum $loremIpsum */
        $loremIpsum = $this->get('apoutchika.lorem_ipsum');


        $posts = array();

        for ($i = 1; $i <= $count; $i++) {
            $title = $loremIpsum->getWords(2, 10);
            $body = $loremIpsum->getParagraphs(1, 3);

            $posts[] = new Post($title, $body);
        }

        return $this->render('AnytDemoBundle:Post:index.html.twig', ['posts' => $posts]);
    }


}

<?php

namespace Anyt\Bundle\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function simpleResponseAction()
    {
        return new Response('Lorem ipsum dolor sit amet, consectetuer adipiscing elit');
    }

    public function simpleTemplateAction()
    {
        return $this->render('AnytDemoBundle:Default:simpleTemplate.html.twig', ['title' => 'Hello World!']);
    }

    public function extendedTemplateAction(Request $request)
    {
        $response = new Response();
        $response->setPublic();

        return $this->render(
            'AnytDemoBundle:Default:extendedTemplate.html.twig',
            [
                'upper_case' => 'Typi non habent claritatem insitam',
                'timestamp' => new \DateTime(),
                'html' => '<em>Eodem modo typi, qui nunc nobis videntur parum clari</em>',
                'bool' => true,
                'array' => ['test1', 'test2', 'test3', 'test4'],
                'object' => $request,
            ],
            $response
        );
    }

    /*
     * Action arguments mapped with url parameters using reflection,
     * we can add extra $_GET parameters here (page)
     */
    public function advancedRoutingAction(Request $request, $id, $slug, $_format)
    {
        $page = $request->query->get('page', 1);
        switch ($_format) {
            case 'json':
                return new JsonResponse(['id' => $id, 'slug' => $slug, 'page' => $page]);
                break;
            case 'text':
                return new Response("id = $id\nslug = $slug\npage = $page", 200, array('Content-Type' => 'text/plain'));
                break;
            default:
                return $this->render(
                    'AnytDemoBundle:Default:advancedRouting.html.twig',
                    ['id' => $id, 'slug' => $slug, 'page' => $page]
                );
        }

    }
}

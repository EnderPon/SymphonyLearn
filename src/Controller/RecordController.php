<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class RecordController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
//        return $this->render('record/index.html.twig', [
//            'controller_name' => 'RecordController',
//        ]);
        return new Response(<<<EOF
<html>
    <body>
        <img src="/images/under-construction.gif" />
    </body>
</html>
EOF
        );
    }
}

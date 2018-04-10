<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminPostController extends Controller
{
    /**
     * @Route("/admin/post", name="admin_post")
     */
    public function index()
    {
        return $this->render('admin_post/index.html.twig', [
            'controller_name' => 'AdminPostController',
        ]);
    }
}

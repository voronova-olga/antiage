<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminCommentController extends Controller
{
    /**
     * @Route("/admin/comment", name="admin_comment")
     */
    public function index()
    {
        return $this->render('admin_comment/index.html.twig', [
            'controller_name' => 'AdminCommentController',
        ]);
    }
}

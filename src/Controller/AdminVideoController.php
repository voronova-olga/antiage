<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminVideoController extends Controller
{
    /**
     * @Route("/admin/video", name="admin_video")
     */
    public function index()
    {
        return $this->render('admin_video/index.html.twig', [
            'controller_name' => 'AdminVideoController',
        ]);
    }
}

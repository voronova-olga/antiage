<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminPagesController extends Controller
{
    /**
     * @Route("/admin/pages", name="admin_pages")
     */
    public function index()
    {
        return $this->render('admin_pages/index.html.twig', [
            'controller_name' => 'AdminPagesController',
        ]);
    }
}

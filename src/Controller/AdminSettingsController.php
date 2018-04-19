<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminSettingsController extends Controller
{
    /**
     * @Route("/admin/settings", name="admin_settings")
     */
    public function index()
    {
        return $this->render('admin_settings/index.html.twig', [
            'controller_name' => 'AdminSettingsController',
        ]);
    }
}

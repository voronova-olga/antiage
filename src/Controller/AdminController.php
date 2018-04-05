<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    /**
     * @Route("/admin/", name="admin")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $countAllUser = $repository->getCountAllUser();
        $countNewUser = $repository->getCountNewUser();
        return $this->render('admin/index.html.twig', [
            'countAllUser' => $countAllUser,
            'countNewUser' => $countNewUser,
        ]);
    }
}

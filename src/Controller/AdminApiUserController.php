<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminApiUserController extends Controller
{
    /**
     * @Route("/admin/api/user", name="admin_api_user")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $repository = $this->getDoctrine()->getRepository(User::class);
        $repository = $this->getDoctrine()->getRepository(User::class);
        $users = $repository->findAll();
        $aaData=array();
        foreach($users as $value){
            $arr=array();
            $arr['email']=$value->getEmail();
            $aaData[]=$arr;
        }
        // {{ path('admin_api_user') }}
        $rest = array (
            'iTotalRecords' => 50,
            'iTotalDisplayRecords' => 10,
            'sEcho' => 10,
            'aaData' =>
                $aaData,
        );
        return $this->json($rest);
    }
}

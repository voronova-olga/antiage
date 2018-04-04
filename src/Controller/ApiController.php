<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ApiController extends Controller
{
    /**
     * @Route("/api", name="api")
     */
    public function index()
    {
        $rest=array('error_message'=>'','error_code'=>0,'version'=>'1.0','data'=>array());
        $rest['data']=array('username' => 'jane.doe');
        return $this->json($rest);
    }
}

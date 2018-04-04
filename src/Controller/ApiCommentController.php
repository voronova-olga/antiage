<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ApiCommentController extends Controller
{
    /**
     * @Route("/api/comment", name="api_comment")
     */
    public function index()
    {
        $rest=array('error_message'=>'','error_code'=>0,'version'=>'1.0','data'=>array());
        $rest['data']=array('username' => 'jane.doe');
        return $this->json($rest);
    }
}

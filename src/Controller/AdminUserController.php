<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminUserController extends Controller
{
    /**
     * @Route("/admin/user", name="admin_user")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $users = $repository->findAll();
        return $this->render('admin_user/index.html.twig', [
            'users' => $users,
        ]);
    }

    /**
     * @Route("/admin/user/add", name="admin_user_add")
     */
    public function add(EntityManagerInterface $em)
    {
        return $this->render('admin_user/add.html.twig', [
            'controller_name' => 'AdminUserController',
        ]);
    }

    /**
     * @Route("/admin/user/edit/{id}", name="admin_user_edit")
     */
    public function edit($id, EntityManagerInterface $em)
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $user = $repository->find($id);
        if(!$user){
            return $this->redirectToRoute('admin_user');
        }
        return $this->render('admin_user/edit.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/admin/user/info/{id}", name="admin_user_info")
     */
    public function info($id)
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $user = $repository->find($id);
        if(!$user){
            return $this->redirectToRoute('admin_user');
        }
        return $this->render('admin_user/info.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/admin/user/active/{id}", name="admin_user_active")
     */
    public function active($id, EntityManagerInterface $em)
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $user = $repository->find($id);
        if(!$user){
            return $this->redirectToRoute('admin_user');
        }
        if($user->getIsActive()){
            $user->setIsActive(FALSE);
        }else{
            $user->setIsActive(TRUE);
        }
        $em->persist($user);
        $em->flush();
        return $this->redirectToRoute('admin_user');
    }

    /**
     * @Route("/admin/user/delete/{id}", name="admin_user_delete")
     */
    public function delete($id, EntityManagerInterface $em)
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $user = $repository->find($id);
        if(!$user){
            return $this->redirectToRoute('admin_user');
        }
        $user->setIsDelete(TRUE);
        $em->persist($user);
        $em->flush();
        return $this->redirectToRoute('admin_user');
    }
}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsersLastCommentViewRepository")
 */
class UsersLastCommentView
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="id")
     * @ORM\JoinColumn(name="user_id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Comment", inversedBy="id")
     * @ORM\JoinColumn(name="coment_id")
     */
    private $coment;

    /**
     * @ORM\Column(type="bigint", nullable=false)
     */
    private $time;

    public function __construct()
    {
        $this->time=time();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     * @return UsersLastCommentView
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getComent()
    {
        return $this->coment;
    }

    /**
     * @param mixed $coment
     * @return UsersLastCommentView
     */
    public function setComent($coment)
    {
        $this->coment = $coment;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     * @return UsersLastCommentView
     */
    public function setTime($time)
    {
        $this->time = $time;
        return $this;
    }


}

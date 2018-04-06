<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRaitingDetalsRepository")
 */
class UserRaitingDetals
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
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="id")
     * @ORM\JoinColumn(name="user_golos_id")
     */
    private $user_golos;

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
     * @return UserRaitingDetals
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserGolos()
    {
        return $this->user_golos;
    }

    /**
     * @param mixed $user_golos
     * @return UserRaitingDetals
     */
    public function setUserGolos($user_golos)
    {
        $this->user_golos = $user_golos;
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
     * @return UserRaitingDetals
     */
    public function setTime($time)
    {
        $this->time = $time;
        return $this;
    }


}

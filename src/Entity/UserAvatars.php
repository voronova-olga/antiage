<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserAvatarsRepository")
 */
class UserAvatars
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
     * @ORM\Column(type="string", length=36, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $upload_date;

    /**
     * @ORM\Column(type="boolean", nullable=false, options={"default" : 1})
     */
    private $active;

    /**
     * @ORM\Column(type="boolean", nullable=false, options={"default" : 0})
     */
    private $delete;

    /**
     * @ORM\Column(type="boolean", nullable=false, options={"default" : 0})
     */
    private $index;

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
     * @return UsersAvatars
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     * @return UsersAvatars
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUploadDate()
    {
        return $this->upload_date;
    }

    /**
     * @param mixed $upload_date
     * @return UsersAvatars
     */
    public function setUploadDate($upload_date)
    {
        $this->upload_date = $upload_date;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     * @return UsersAvatars
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDelete()
    {
        return $this->delete;
    }

    /**
     * @param mixed $delete
     * @return UsersAvatars
     */
    public function setDelete($delete)
    {
        $this->delete = $delete;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * @param mixed $index
     * @return UsersAvatars
     */
    public function setIndex($index)
    {
        $this->index = $index;
        return $this;
    }


}

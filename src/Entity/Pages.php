<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PagesRepository")
 */
class Pages
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $slug;

    /**
     * @ORM\Column(type="bigint", nullable=false)
     */
    private $activate_date;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @ORM\Column(name="is_delete", type="boolean")
     */
    private $isDelete;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $anons;

    /**
     * @ORM\Column(type="string", length=36, nullable=true)
     */
    private $image_menu;

    /**
     * @ORM\Column(type="string", length=36, nullable=true)
     */
    private $image_anons;

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
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     * @return Pages
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getActivateDate()
    {
        return $this->activate_date;
    }

    /**
     * @param mixed $activate_date
     * @return Pages
     */
    public function setActivateDate($activate_date)
    {
        $this->activate_date = $activate_date;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getisActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $isActive
     * @return Pages
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getisDelete()
    {
        return $this->isDelete;
    }

    /**
     * @param mixed $isDelete
     * @return Pages
     */
    public function setIsDelete($isDelete)
    {
        $this->isDelete = $isDelete;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Pages
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAnons()
    {
        return $this->anons;
    }

    /**
     * @param mixed $anons
     * @return Pages
     */
    public function setAnons($anons)
    {
        $this->anons = $anons;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImageMenu()
    {
        return $this->image_menu;
    }

    /**
     * @param mixed $image_menu
     * @return Pages
     */
    public function setImageMenu($image_menu)
    {
        $this->image_menu = $image_menu;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImageAnons()
    {
        return $this->image_anons;
    }

    /**
     * @param mixed $image_anons
     * @return Pages
     */
    public function setImageAnons($image_anons)
    {
        $this->image_anons = $image_anons;
        return $this;
    }


}

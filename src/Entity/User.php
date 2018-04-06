<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements  AdvancedUserInterface, \Serializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=60, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $role;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(max=4096)
     */
    private $plainPassword;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $surname;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $patronymic;

    /**
     * @ORM\Column(type="bigint", nullable=false)
     */
    private $reg_date;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(name="is_delete", type="boolean")
     */
    private $isDelete;

    /**
     * @ORM\Column(type="bigint", nullable=false)
     */
    private $date_of_payment;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $user_raiting;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $user_comment_raiting;

    public function __construct()
    {
        $this->reg_date = time();
        $this->role = json_encode(array('ROLE_USER'));
        $this->isActive = true;
        $this->isDelete = false;
        $this->user_raiting = 200;
        $this->user_comment_raiting = 100;
    }

    /**
     * проверяет, истек ли срок действия учетной записи пользователя
     * @return bool
     */
    public function isAccountNonExpired()
    {
        return true;
    }

    /**
     * проверяет, заблокирован ли пользователь
     * @return bool
     */
    public function isAccountNonLocked()
    {
        return true;
    }

    /**
     * проверяет, истек ли учетные данные пользователя (пароль);
     * @return bool
     */
    public function isCredentialsNonExpired()
    {
        return true;
    }

    /**
     * проверяет, включен ли пользователь.
     * @return bool
     */
    public function isEnabled()
    {
        if($this->isDelete){
            return FALSE;
        }
        return $this->isActive;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        return $this->username=$username;
    }

    public function getSalt()
    {
        return null;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param array $roles
     */
    public function setRoles($roles = array('ROLE_USER')){
        $this->role = json_encode($roles);
    }


    /**
     * @return array
     */
    public function getRoles()
    {
        $role = json_decode($this->role, TRUE);
        return $role;
    }

    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            $this->isActive,
            $this->email,
            // смотрите раздел о соли ниже
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            $this->isActive,
            $this->email,
            // смотрите раздел о соли ниже
            // $this->salt
            ) = unserialize($serialized);
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $isActive
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param mixed $plainPassword
     * @return User
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPatronymic()
    {
        return $this->patronymic;
    }

    /**
     * @param mixed $patronymic
     * @return User
     */
    public function setPatronymic($patronymic)
    {
        $this->patronymic = $patronymic;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRegDate()
    {
        return $this->reg_date;
    }

    /**
     * @param mixed $reg_date
     * @return User
     */
    public function setRegDate($reg_date)
    {
        $this->reg_date = $reg_date;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsDelete()
    {
        return $this->isDelete;
    }

    /**
     * @param mixed $isDelete
     * @return User
     */
    public function setIsDelete($isDelete)
    {
        $this->isDelete = $isDelete;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateOfPayment()
    {
        return $this->date_of_payment;
    }

    /**
     * @param mixed $date_of_payment
     * @return User
     */
    public function setDateOfPayment($date_of_payment)
    {
        $this->date_of_payment = $date_of_payment;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserRaiting()
    {
        return $this->user_raiting-100;
    }

    /**
     * @param mixed $user_raiting
     * @return User
     */
    public function setUserRaiting($user_raiting)
    {
        $this->user_raiting = $user_raiting+100;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserCommentRaiting()
    {
        return $this->user_comment_raiting-200;
    }

    /**
     * @param mixed $user_comment_raiting
     * @return User
     */
    public function setUserCommentRaiting($user_comment_raiting)
    {
        $this->user_comment_raiting = $user_comment_raiting+200;
        return $this;
    }


}

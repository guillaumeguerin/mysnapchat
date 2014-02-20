<?php
use Doctrine\Common\Collections\ArrayCollection;
require_once "Message.php";
/**
 * @Entity @Table(name="users")
 **/
class User
{
   
     /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;
    /** @Column(type="string") **/
    protected $name;
    /** @Column(type="string") **/
    protected $email;
    /** @Column(type="string") **/
    protected $password;
    /** @Column(type="string") **/
    protected $description;
    /** @Column(type="string") **/
    protected $profile_piture;
    /** @Column(type="string") **/
    protected $directory;
    /**
     * @OneToMany(targetEntity="Message", mappedBy="sender")
     * @var Message[]
     **/
    protected $sent_messages = null;
    /**
     * @OneToMany(targetEntity="Message", mappedBy="receiver")
     * @var Message[]
     **/
    protected $received_messages = null;

    public function __construct()
    {
        $this->sent_messages = new ArrayCollection();
        $this->received_messages = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getProfile_picture()
    {
        return $this->profile_picture;
    }

    public function setProfile_picture($profile_picture)
    {
        $this->profile_picture = $profile_picture;
    }

    public function getDirectory()
    {
        return $this->directory;
    }

    public function setDirectory($directory)
    {
        $this->directory = $directory;
    }

    public function addSentMessage($msg)
    {
        $this->sent_messages[] = $msg;
    }

    public function addReceivedMessage($msg)
    {
        $this->received_messages[] = $msg;
    }
}

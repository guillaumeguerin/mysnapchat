<?php
use Doctrine\Common\Collections\ArrayCollection;
require_once "Message.php";
require_once "userRepository.php";
/**
 * @Entity(repositoryClass="userRepository") 
 * @Table(name="users")
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
    protected $profile_picture;
    /** @Column(type="string") **/
    protected $directory;
    /**
     * @OneToMany(targetEntity="Message", mappedBy="sender")
     * @var Message[]
     **/
    protected $sent_messages = null;
    /**
     * @OneToMany(targetEntity="Message", mappedBy="receiver", cascade={"remove"})
     * @var Message[]
     **/
    protected $received_messages = null;

    /**
     * @ManyToMany(targetEntity="User")
     **/
    protected $friends = null;

    /**
     * @ManyToMany(targetEntity="User")
     * @JoinTable(name = "user_user_request")
     **/
    protected $friend_requests = null;

    public function __construct()
    {
        $this->sent_messages = new ArrayCollection();
        $this->received_messages = new ArrayCollection();
        $this->friends = new ArrayCollection();
        $this->friends_requests = new ArrayCollection();
        $this->email = "undefined";
        $this->description = "undefined";
        $this->profile_picture = "undefined";
        $this->directory = "undefined";
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

    public function addFriend($friend)
    {
        $this->friends[] = $friend;
        $friend->friends[] = $this;
    }

    public function getFriends()
    {
        return $this->friends->toArray();
    }

    public function removeFriend($friend)
    {
        $res1 = $this->friends->removeElement($friend);
        $res2 = $friend->friends->removeElement($this);
        return $res1 && $res2;
    }

    public function sendFriendRequest($friend)
    {
        $friend->friend_requests[] = $this;
    }

    public function getFriendRequests()
    {
        return $this->friend_requests->toArray();
    }

    public function removeFriendRequest($friend) 
    {
        $res1 = $this->friend_requests->removeElement($friend);
        return $res1;
    }
}

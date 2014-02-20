<?php
/**
 * @Entity @Table(name="messages")
 **/
class Message
{
	 /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;
    /** @Column(type="string") **/
    protected $type;
    /** @Column(type="string") **/
    protected $content;
    /**@Column(type="datetime")**/
    protected $date;
    /**
     * @ManyToOne(targetEntity="User", inversedBy="sent_messages")
     **/
    protected $sender;
    /**
     * @ManyToOne(targetEntity="User", inversedBy="received_messages")
     **/
    protected $receiver;

	public function __construct()
    {
        $this->type = "undefined";
        $this->date = null;
        $this->content = "undefined";
	}

    public function getId()
    {
        return $this->id;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setSender($sender)
    {
        $sender->addSentMessage($this);
        $this->sender = $sender;
    }

    public function setReceiver($receiver)
    {
        $receiver->addReceivedMessage($this);
        $this->receiver = $receiver;
    }

    public function getSender()
    {
        return $this->sender;
    }

    public function getReceiver()
    {
        return $this->receiver;
    }
}
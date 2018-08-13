<?php

namespace BWBSalesContact;


class Email
{
    protected $emailType; //agent or admin
    protected $subject;
    protected $body;
    protected $headers;
    protected $sendTo;
    protected $from;
    protected $replyTo = 'admin@brentwoodbank.com';

    public function __construct($emailType,$subject,$body,$sendTo,$from)
    {
        $this->body = [];

        $this->emailType = $emailType;
        $this->subject = $subject;
        $this->body = $body;
        $this->sendTo = $sendTo;
        $this->from = $from;
        $this->headers = "From: $this->replyTo\r\nReply-to: $this->replyTo";
    }

    public function sendMail()
    {
        return wp_mail($this->sendTo, $this->subject, $this->body, $this->headers);
    }
}
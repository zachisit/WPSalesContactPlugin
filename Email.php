<?php

namespace BWBSalesContact;


class Email
{
    protected $subject;
    protected $pageName;
    protected $emailData;
    protected $headers = [];
    //protected $replyTo = 'admin@brentwoodbank.com';
    protected $replyTo = 'no-reply@brentwoodbank.com';
    protected $sendTo = 'zach@zachis.it';
    protected $ccTo = 'matt@matthewjamescreative.com';
    protected $template = 'Email/formSubmissionEmail';

    public function __construct($pageName,$data)
    {
        $this->headers = array('Content-Type: text/html; charset=UTF-8','From: Brentwood Bank <'.$this->replyTo.'>');
        $this->headers[] = 'Cc: Person Name <'.$this->ccTo.'>';
        $this->body = [];

        $this->pageName = $pageName;
        $this->emailData = $data;

    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function sendMail()
    {
        $body = Utility::populateTemplateFile( $this->template, [
            'emailData' => $this->emailData
        ]);

        return wp_mail($this->sendTo, 'New Contact from '.$this->pageName, $body, $this->headers);
    }
}
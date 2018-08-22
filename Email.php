<?php

namespace BWBSalesContact;


class Email
{
    protected $subject;
    protected $pageName;
    protected $emailData;
    protected $headers = [];
    protected $replyTo = 'no-reply@brentwoodbank.com';
    protected $sendTo = 'zach@zachis.it';
    protected $ccTo = 'matt@matthewjamescreative.com';
    protected $template = 'Email/formSubmissionEmail';

    public function __construct($pageName,$data)
    {
        $this->headers = array('Content-Type: text/html; charset=UTF-8','From: Brentwood Bank <'.$this->replyTo.'>');

        /**
         * @comment this is the type of thing that is better done with a public method.  E.g. if you want sales copied, then
         * have the code that is triggering the email decide who to send to by calling a method like `addRecipient`
         * This solution won't scale well b/c you would have to add a new if statement for every formType moving forward
         */
        if ($data['formType'] === 'sales') {
            $this->headers[] = 'Cc: Person Name <'.$this->ccTo.'>';
        }

        /**
         * @comment $this->body is not defined above?
         * Also, you should initialize variables to the type that they will be, e.g. body is a string so should be initialized to ''
         * Alternatively, it is also good practice to initialize a variable to null
         */
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

    /**
     * @comment Consider adding setters and getters for things like sendTo and headers.
     */
}
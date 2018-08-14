<?php

namespace BWBSalesContact\Shortcodes;


use BWBSalesContact\ContactForm;
use BWBSalesContact\Email;
use BWBSalesContact\Utility;

class SalesContactForm extends Shortcode
{
    protected static $shortcodeTag = 'bwbMarketingContactForm';
    protected $hasAjax = true;
    protected $hasAdditionalScripts = true;
    protected $additionalScripts = [
        'js/contactFormSubmit',
        'js/mobileCheck'
    ];

    /**
     * @return string
     */
    protected function getTemplateName()
    {
        return 'Form/contactForm';
    }

    /**
     * @param $atts
     * @return string
     * @throws \Exception
     */
    protected function doShortcode($atts)
    {
        return $this->createView([
            //
        ]);
    }

    public function bwbMarketingContactForm()
    {
        $contactFormData = [
            'pageID' => $_POST['pageID'],
            'formType' => $_POST['formType'],
            'name' => $_POST['newContactName'],
            'businessName' => $_POST['newContactBusinessName'],
            'email' => $_POST['newContactEmail'],
            'phone' => $_POST['newContactPhone'],
            'learnAboutOptions' => implode("|", $_POST['learnMoreAbout']),
            'ip' => Utility::getUserInternetProtocol(),
            'timeStamp' => Utility::getCurrentTime()
        ];

        $formData = new ContactForm($contactFormData);
        $formData->insertIntoDB();

        $contactFormData['learnAboutOptions'] = explode('|', $contactFormData['learnAboutOptions']);
        //@TODO:implode with commaspace in template

        $email = new Email(
            'admin',
            'New Contact from: PageID',
            $contactFormData,
            'zach@zachis.it',
            $contactFormData['email']
            );
        $email->sendMail();
    }
}
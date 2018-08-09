<?php

namespace BWBSalesContact\Shortcodes;


use BWBSalesContact\ContactForm;
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
            'pageID' => get_the_ID(),
            'formType' => $_POST['formType'],
            'name' => $_POST['newContactName'],
            'businessName' => $_POST['newContactBusinessName'],
            'email' => $_POST['newContactEmail'],
            'phone' => $_POST['newContactPhone'],
            'learnAboutOptions' => 'test',
            'ip' => Utility::getUserInternetProtocol()
        ];

        $formData = new ContactForm($contactFormData);
        $formData->insertIntoDB();
    }
}
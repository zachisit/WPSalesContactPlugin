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
    protected $hasAdditionalCSS = true;
    protected $additionalCSS = [
        'css/marketingSalesContact'
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
        $atts = shortcode_atts(
            [
                'type' => null
            ], $atts
        );

        return $this->createView([
            'type' => $atts['type']
        ]);
    }

    /**
     * @throws \Exception
     */
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
        $contactFormData['pageName'] = get_the_title($contactFormData['pageID']);

        $email = new Email(
            $contactFormData['pageName'],
            $contactFormData
            );
        $email->sendMail();
    }
}
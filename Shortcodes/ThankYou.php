<?php

namespace BWBSalesContact\Shortcodes;


class ThankYou extends Shortcode
{
    protected static $shortcodeTag = 'marketingThankYou';
//    protected $hasAdditionalCSS = true;
//    protected $additionalCSS = [
//        'css/thankYou'
//    ];

    /**
     * @return string
     */
    protected function getTemplateName()
    {
        return 'thankYou';
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

}
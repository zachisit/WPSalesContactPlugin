<?php

namespace BWBSalesContact\Shortcodes;


class ThankYou extends Shortcode
{
    protected static $shortcodeTag = 'marketingThankYou';

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
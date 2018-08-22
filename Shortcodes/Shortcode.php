<?php

namespace BWBSalesContact\Shortcodes;


use BWBSalesContact\BWBSalesContact;
use BWBSalesContact\Utility;

/**
 * @comment This is nice!
 */
abstract class Shortcode
{
    protected static $shortcodeTag = false;
    protected $hasAjax = false;
    protected $hasAdditionalScripts = false;
    protected $hasAdditionalCSS = false;
    protected $additionalScripts = [];
    protected $additionalCSS = [];

    private static $definedShortCodes = [
        'SalesContactForm',
        'ThankYou'
    ];
    private static $initializedShortCodes = [];

    abstract protected function doShortcode($atts);

    abstract protected function getTemplateName();

    public function __construct()
    {
        if (static::$shortcodeTag) {
            add_shortcode(static::$shortcodeTag, [$this, 'setUpShortcode']);
        }
        if (Utility::getClass($this)) {
            $this->addAjaxAction();
            $this->registerFrontendScripts();
        }
        if ($this->hasAdditionalScripts) {
            $this->addAdditionScriptAction();
            $this->registerAdditionalFrontendScripts();
        }
        if ($this->hasAdditionalCSS) {
            $this->registerAdditionalFrontendCSS();
        }
    }

    public function setUpShortcode($atts)
    {
        if ($this->hasAjax) {
            $scriptName = Utility::getClass($this);
            wp_enqueue_script($scriptName);
            BWBSalesContact::localizedAjaxURL($scriptName);
        }
        if ($this->hasAdditionalScripts) {
            foreach ($this->additionalScripts as $scriptName) {
                wp_enqueue_script($scriptName);
            }
        }

        return $this->doShortcode($atts);
    }

    public static function addShortcodes()
    {
        foreach (self::$definedShortCodes as $shortCode) {
            if (!isset(self::$initializedShortCodes[$shortCode])) {
                $shortCodeObject = "\\BWBSalesContact\Shortcodes\\" . $shortCode;
                self::$initializedShortCodes[$shortCode] = new $shortCodeObject;
            }
        }
    }

    public function addAjaxAction()
    {
        $scriptName = Utility::getClass($this);
        //error_log(static::$shortcodeTag);

        add_action('wp_ajax_'.$scriptName, [$this, static::$shortcodeTag]);
        add_action('wp_ajax_nopriv_'.$scriptName, [$this, static::$shortcodeTag]);

        add_action('wp_enqueue_scripts', [$this, 'registerFrontendScripts']);
    }

    public function addAdditionScriptAction()
    {
        add_action('wp_enqueue_scripts',[$this, 'registerAdditionalFrontendScripts']);
    }

    public function registerAdditionalFrontendScripts()
    {
        foreach ($this->additionalScripts as $script) {
            wp_register_script($script, plugins_url($script.'.js',BWB_SALES_CONTACT),null, rand(), true);
        }
    }

    public function registerAdditionalFrontendCSS()
    {
        foreach ($this->additionalCSS as $style) {
            wp_enqueue_style($style, plugins_url($style.'.css',BWB_SALES_CONTACT));
        }
    }

    public function registerFrontendScripts()
    {
        $scriptName = Utility::getClass($this);
        $url = plugins_url('js/'.$scriptName.'.js',BWB_SALES_CONTACT);
        $path = PM_ABSPATH.'/js/'.$scriptName.'.js';

        if (file_exists($path)) {
            wp_register_script($scriptName, $url,['jquery'],null,true);
        } else {
            $this->hasAjax = false;
        }
    }

    /**
     * @param array $args
     * @return string
     * @throws \Exception
     */
    public function createView($args = [])
    {
        return Utility::populateTemplateFile('Shortcode/' . $this->getTemplateName(), $args);
    }
}
<?php

namespace BWBSalesContact;


use BWBSalesContact\Shortcodes\Shortcode;

class BWBSalesContact
{
    private static $bwbSalesContact = null;

    public function __construct()
    {
        register_activation_hook(BWB_SALES_CONTACT, [__CLASS__, 'install']);
        //register_deactivation_hook(BWB_SALES_CONTACT, [__CLASS__, 'uninstall']);

        //$this->addActions();
        //$this->registerFilters();

        Shortcode::addShortcodes();
    }

    /**
     * @return self
     */
    public static function getInstance()
    {
        if (!(self::$bwbSalesContact instanceof self)) {
            self::$bwbSalesContact = new self();
        }
        return self::$bwbSalesContact;
    }

    /**
     * Currently an alias of getInstance, eventually this will contain the functions to initialize the plugin
     * @return bwbSalesContact
     */
    public static function init()
    {
        return self::getInstance();
    }

    public function addActions()
    {
        //
    }

    public function registerFilters()
    {
        //
    }

    /**
     * Called on install
     */
    public static function install()
    {
        global $wpdb;

        $contactSubmissionTableName = $wpdb->prefix . 'bwb_contact_submissions';
        $charset_collate = $wpdb->get_charset_collate();

        $sqlContactSubmissions = "CREATE TABLE $contactSubmissionTableName (
              pageID int(255) NOT NULL,
              formType int(255) NOT NULL,
              name VARCHAR(255) NOT NULL,
              businessName VARCHAR(255) NOT NULL,
              email VARCHAR(999),
              phone VARCHAR(255),
              learnAboutOptions VARCHAR(255),
              ip VARCHAR(255),
              timeStamp timestamp
        ) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sqlContactSubmissions );
    }

    public static function uninstall()
    {
        //
    }

    public static function localizedAjaxURL($handle)
    {
        error_log('here');
        wp_localize_script( $handle, 'ajax', ['url' => admin_url('admin-ajax.php')] );
    }
}
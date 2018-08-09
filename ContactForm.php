<?php

namespace BWBSalesContact;


class ContactForm
{
    protected static $formData;
    protected static $name;
    protected static $businessName;
    protected static $email;
    protected static $phone;
    protected static $learnAboutOptions;
    protected static $ip;
    protected static $pageID;
    protected static $formType;

    public function __construct($data)
    {
        self::$formData = [];
        self::$formData = $data;

        foreach (self::$formData as $k=>$v) {
            foreach ($v as $t=>$z) {
                $this->{$t} = $z;
            }
        }

    }

    public static function insertIntoDB()
    {
        global $wpdb;
        $table = $wpdb->prefix . 'bwb_contact_submissions';
        $success = $wpdb->insert($table, self::$formData);

        return $success;
    }

    public static function emailSubmissionData()
    {

    }
}
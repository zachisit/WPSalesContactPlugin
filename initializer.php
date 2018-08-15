<?php
/*
Plugin Name: Brentwood Bank Sales Contact Form Submission 2018
Plugin URI: https://zachis.it
Description: Custom contact form used for sales marketing pages
Version: 1.0.05
Author: Zach Smith
Author URI: https://twitter.com/zachisit
License: A "Slug" license name e.g. GPL2
*/

namespace BWBSalesContact;

require_once 'vendor/autoload.php';
define('PM_ABSPATH',dirname(__FILE__));
define('BWB_SALES_CONTACT',__FILE__);

BWBSalesContact::init();
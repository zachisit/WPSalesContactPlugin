<?php
/**
 * Thank You - Contact Form Success Template
 *
 * @package bwb-contact
 */
?>
<style>
    #internal_specialmenu {
        display:none !important;
    }
    #content_internal {
        width:94% !important;
    }
    .marketingLandingThankYou {
        text-align:center;
        margin:4em 0 2em 0;
    }
    .marketingLandingThankYou p {
        display:block;
        margin:1em 0;
    }
    .marketingLandingThankYou .thankYou {
        font-size:3em !important;
        margin:0 0 0.5em 0 !important;
    }
    .marketingLandingThankYou .checkImage {
        margin:0 0 1em 0;
    }
    .marketingLandingThankYou .greenColor {
        color:#00a0b0;
    }
    .marketingLandingThankYou .lOne {
        font-size:1.3em;
        color:#00a0b0;
    }
    .marketingLandingThankYou .lTwo {
        font-size:1.8em;
        font-weight:900;
        color:#00a0b0;
        margin:1em 0 2em 0;
    }
    .marketingLandingThankYou .lThree {
        color:black;
        font-size:1em;
        line-height:1;
        width:560px;
        margin:auto;
    }
    .marketingLandingThankYou .learnMore {
        background:#00a0b0;
        border:none;
        outline:none;
        padding:0.5em 0.6em;
        color:white !important;
        font-size:1.12em;
        font-weight:300;
        width:180px;
        text-align:left;
        position:relative;
        text-transform:uppercase;
    }
    .marketingLandingThankYou .learnMore:after {
        content:url('/wp-content/themes/BrentwoodBank/images/emailMarketing/arrowButton.jpg');
        right:7px;
        top:7px;
        position:absolute;
    }
    .marketingLandingThankYou .learnMore a {
        color: white !important;
        text-decoration:none !important;
    }
    #termsAndConditions p {
        display:block;
        margin:0 0 1em 0;
    }
</style>
<div class="marketingLandingThankYou">
    <h2 class="thankYou">Thank You</h2>
    <img class="checkImage" src="/wp-content/themes/BrentwoodBank/images/emailMarketing/checkImage.png" alt="check image">
    <p class="lOne">Your submission has been received.</p>
    <p class="lTwo">We can't wait to talk to you.<br/>We'll reach out soon to being the discussion.</p>
    <p class="lThree">In the meantime, find out more about how our local bank attention and big bank benefits can help your business.</p>
    <p><button class="learnMore" title="learn More"><a href="<?=home_url('/business-banking')?>">Learn More</a></button></p>
</div>

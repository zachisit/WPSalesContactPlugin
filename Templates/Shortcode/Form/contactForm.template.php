<?php
/**
 * Contact Form Template
 *
 * @package bwb-contact
 */
?>
<style>
    .displayNone {
        display:none;
    }
    .inputError {
        border:1px solid red;
        padding:1em;
    }
    .marketing_landing_eighteen .titleOne {
        color:#00a0b0;
        font-size:1.2em;
        margin:0 0 0.5em 0;
    }
    .marketing_landing_eighteen .subHeadline {
        margin:0 0 0.3em 0 !important;
    }
    .marketing_landing_eighteen #SalesContactForm {
        display:block;
        margin:1em 0 1.4em 0;
    }
    .marketing_landing_eighteen .feedbackMessage {
        display:block;
        margin: 0 0 1em 0;
        color:white;
        padding:0.4em;
    }
    .marketing_landing_eighteen .feedbackMessage.fail {
        background:red;
    }
    .marketing_landing_eighteen .feedbackMessage.success {
        background:green;
    }
    .marketing_landing_eighteen #SalesContactForm .b_input {
        border:1px solid black;
        width:400px;
        padding:0.5em;
        margin:0 0 0.5em 0;
        font-size:1em;
        color:black;
    }
    .marketing_landing_eighteen #SalesContactForm .b_inputSmall {
        border:1px solid black;
        width:377px;
        padding:0.5em;
        margin:0 0 0.5em 0;
        font-size:1em;
        color:black;
    }
    .marketing_landing_eighteen #SalesContactForm .methodOfContact {
        margin:0 0 1.2em 0;
        display:block;
    }
    .marketing_landing_eighteen #SalesContactForm .methodOfContact p {
        display:block;
        margin:0.5em 0;
    }
    .marketing_landing_eighteen #SalesContactForm .cbox_input {
        background:white;
        border:1px solid black;
        padding:0.2em;
    }
    .marketing_landing_eighteen #SalesContactForm .methodOfContact .mOCSelector {
        float:left;
        margin:0.7em 0.6em 3em 0
    }
    .marketing_landing_eighteen #SalesContactForm .learnMoreAboutRow {
        display:block;
        height:90px;
        width:428px;
    }
    .marketing_landing_eighteen #SalesContactForm .learnMoreAboutRow .left {
        width:200px;
        float:left;
    }
    .marketing_landing_eighteen #SalesContactForm .learnMoreAboutRow .right {
        width:225px;
        float:right;
    }
    .marketing_landing_eighteen #SalesContactForm .getStarted {
        background:#00a0b0;
        border:none;
        outline:none;
        padding:0.5em 0.6em;
        color:white;
        font-size:1.12em;
        font-weight:300;
        width:177px;
        text-align:left;
        position:relative;
        text-transform:uppercase;
        cursor:pointer;
    }
    .marketing_landing_eighteen #SalesContactForm .getStarted:after {
        content:url('/wp-content/themes/BrentwoodBank/images/emailMarketing/arrowButton.jpg');
        right:7px;
        top:7px;
        position:absolute;
    }
    #termsAndConditions p {
        display:block;
        margin:0 0 1em 0;
    }
</style>
<form action="" id="SalesContactForm">
    <div class="row required">
        <label for="newContactName" class="displayNone">Name</label>
        <input type="text"
               id="newContactName"
               name="newContactName"
               placeholder="Name *"
               class="b_input"
        />
    </div>
    <div class="row required">
        <label for="newContactBusinessName" class="displayNone">Business Name</label>
        <input type="text"
               id="newContactBusinessName"
               name="newContactBusinessName"
               placeholder="Business Name *"
               class="b_input"
        />
    </div>
    <div class="row methodOfContact">
        <p>Preferred method of follow up (must select one):</p>
        <label for="emailSelected" class="displayNone">Email</label>
        <input type="radio"
               value="emailSelected"
               id="emailSelected"
               name="contactTypeSelected"
               class="mOCSelector"
        >
        <div class="row emailContactRow">
            <label for="newContactEmail" class="displayNone">Email</label>
            <input type="text"
                   id="newContactEmail"
                   name="newContactEmail"
                   placeholder="Email *"
                   class="b_inputSmall"
                   disabled
            />
        </div>
        <div class="row emailContactRow">
            <label for="newContactConfirmEmail" class="displayNone">Confirm Email</label>
            <input type="text"
                   id="newContactConfirmEmail"
                   name="newContactConfirmEmail"
                   placeholder="Confirm Email *"
                   class="b_inputSmall"
                   disabled
            />
        </div>
        <label for="phoneSelected" class="displayNone mOCSelector">Phone</label>
        <input type="radio"
               value="phoneSelected"
               id="phoneSelected"
               name="contactTypeSelected"
               class="mOCSelector"
        >
        <div class="row phoneContactRow">
            <label for="newContactPhone" class="displayNone">Phone</label>
            <input type="text"
                   id="newContactPhone"
                   name="newContactPhone"
                   placeholder="Phone *"
                   class="b_inputSmall"
                   disabled
            />
        </div>
    </div>

    <p>I'd also like to learn more about (Select all that apply):</p>
    <div class="row required learnMoreAboutRow">
        <label for="learnMoreAbout[]" class="displayNone">Learn About More:</label><br/>
        <div class="left">
            <input type="checkbox"
                   id="newContactLearn_IntChecking"
                   name="learnMoreAbout[]"
                   value="newContactLearn_IntChecking"
                   class="cbox_input"
            /><label for="newContactLearn_IntChecking">Interest Checking</label><br/><br/>
            <input type="checkbox"
                   id="newContactLearn_FreeChecking"
                   name="learnMoreAbout[]"
                   value="newContactLearn_FreeChecking"
                   class="cbox_input"
            /><label for="newContactLearn_FreeChecking">Free Checking</label>
        </div>
        <div class="right">
            <input type="checkbox"
                   id="newContactLearn_OnlineBanking"
                   name="learnMoreAbout[]"
                   value="newContactLearn_OnlineBanking"
                   class="cbox_input"
            /><label for="newContactLearn_OnlineBanking">Secure Online Banking</label><br/><br/>
            <input type="checkbox"
                   id="newContactLearn_RemoteDeposit"
                   name="learnMoreAbout[]"
                   value="newContactLearn_RemoteDeposit"
                   class="cbox_input"
            /><label for="newContactLearn_RemoteDeposit">Remote Deposit</label>
        </div>
    </div>
    <?php //@TODO;pass in type via shortcode atts?>
    <input type="hidden" name="formType" value="test" />
    <input type="hidden" name="pageID" value="<?=get_the_ID()?>" />
    <input type="hidden" name="action" value="SalesContactForm" />

    <button class="submit getStarted">Get Started</button>
</form>
<div class="row formDialogBlock">
    <div class="spinningDialog" style="display:none"><i>Please hold</i></div>
    <div class="feedbackMessage"><!-- --></div>
</div>
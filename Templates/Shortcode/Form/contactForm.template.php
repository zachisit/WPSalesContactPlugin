<?php
/**
 * Contact Form Template
 *
 * @var $type
 * @package bwb-contact
 */
?>
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
                   id="Interest-Checking"
                   name="learnMoreAbout[]"
                   value="Interest-Checking"
                   class="cbox_input"
            /><label for="Interest-Checking">Interest Checking</label><br/><br/>
            <input type="checkbox"
                   id="Free-Checking"
                   name="learnMoreAbout[]"
                   value="Free-Checking"
                   class="cbox_input"
            /><label for="Free-Checking">Free Checking</label>
        </div>
        <div class="right">
            <input type="checkbox"
                   id="Secure-Online-Banking"
                   name="learnMoreAbout[]"
                   value="Secure-Online-Banking"
                   class="cbox_input"
            /><label for="Secure-Online-Banking">Secure Online Banking</label><br/><br/>
            <input type="checkbox"
                   id="Remote-Deposit"
                   name="learnMoreAbout[]"
                   value="Remote-Deposit"
                   class="cbox_input"
            /><label for="Remote-Deposit">Remote Deposit</label>
        </div>
    </div>
    <input type="hidden" name="formType" value="<?=$type?>" />
    <input type="hidden" name="pageID" value="<?=get_the_ID()?>" />
    <input type="hidden" name="action" value="SalesContactForm" />

    <button class="submit getStarted">Get Started</button>
</form>
<div class="row formDialogBlock">
    <div class="spinningDialog" style="display:none"><i>Please hold</i></div>
    <div class="feedbackMessage"><!-- --></div>
</div>
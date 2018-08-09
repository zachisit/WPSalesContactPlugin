<?php
/**
 * Contact Form Template
 *
 * @package bwb-contact
 */
?>

<form action="" id="SalesContactForm">
    <div class="row required">
        <label for="newContactName">Name</label>
        <input type="text" id="newContactName" name="newContactName" placeholder="Name *"/>
    </div>
    <div class="row required">
        <label for="newContactBusinessName">Business Name</label>
        <input type="text" id="newContactBusinessName" name="newContactBusinessName" placeholder="Business Name *"/>
    </div>
    <p>Preferred method of follow up (must select one):</p>
    <div class="row required">
        <label for="newContactEmail">Email</label>
        <input type="text" id="newContactEmail" name="newContactEmail" placeholder="Email *"/>
    </div>
    <div class="row required">
        <label for="newContactConfirmEmail">Confirm Email</label>
        <input type="text" id="newContactConfirmEmail" name="newContactConfirmEmail" placeholder="Confirm Email *"/>
    </div>
    <div class="row required">
        <label for="newContactPhone">Phone</label>
        <input type="text" id="newContactPhone" name="newContactPhone" placeholder="Phone *"/>
    </div>
    <p>I'd also like to learn more about (Select all that apply):</p>
    <div class="row required">
        <label for="newContactLearn">Learn About More:</label>
        <input type="checkbox" id="newContactLearn" name="newContactLearn_IntChecking" /><label for="newContactLearn_IntChecking">Interest Checking</label>
        <input type="checkbox" id="newContactLearn" name="newContactLearn_FreeChecking" /><label for="newContactLearn_FreeChecking">Free Checking</label>
        <input type="checkbox" id="newContactLearn" name="newContactLearn_OnlineBanking" /><label for="newContactLearn_OnlineBanking">Secure Online Banking</label>
        <input type="checkbox" id="newContactLearn" name="newContactLearn_RemoteDeposit" /><label for="newContactLearn_RemoteDeposit">Remote Deposit</label>
    </div>
    <input type="hidden" name="formType" value="test" />
    <input type="hidden" name="action" value="SalesContactForm" />

    <button class="submit">Get Started</button>
</form>
<div class="row formDialogBlock">
    <div class="spinningDialog" style="display:none"><i class="fa fa-spinner fa-spin fa-1x fa-fw" aria-hidden="true"></i> <i>Please hold</i></div>
    <div class="feedbackMessage"><!-- --></div>
</div>
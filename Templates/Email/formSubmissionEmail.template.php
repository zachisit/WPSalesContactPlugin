<?php
/**
 * Form Submission Email Template
 *
 * @var $emailData
 * @package bwb-contact
 */
?>
New Email Submission from <?=$emailData['pageName']?><br/><br/>

<b>Name:</b><br/>
<?=$emailData['name']?><br/>

<b>Business Name:</b><br/>
<?=$emailData['businessName']?><br/>

<b>Contact:</b><br/>
<?=($emailData['email']) ? $emailData['email'] : $emailData['phone']?><br/>

<b>Interested In:</b><br/>
<?php foreach ($emailData['learnAboutOptions'] as $k=>$v){
    echo $v.' <br/>';
}?>

<br/><br/>
<hr>

Sent on <?=$emailData['timeStamp']?> via IP <?=$emailData['ip']?>
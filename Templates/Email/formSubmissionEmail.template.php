<?php
/**
 * Form Submission Email Template
 *
 * @var $emailData
 * @package bwb-contact
 */
//var_dump($emailData);
?>
New Email Submission from <?=$emailData['pageName']?><br/><br/>

Name: <?=$emailData['name']?><br/>
Business Name: <?=$emailData['businessName']?><br/>
Contact: <?=($emailData['email']) ? $emailData['email'] : $emailData['phone']?><br/>
Interested In:<br/>
<?php foreach ($emailData['learnAboutOptions'] as $k=>$v){
    echo $v.' <br/>';
}?>

<br/><br/>
<hr>

Sent on <?=$emailData['timeStamp']?> via IP <?=$emailData['ip']?>
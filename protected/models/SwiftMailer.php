<?
class SwiftMailer
{
	public function sendHtmlMail($from, $to, $subject, $body, $attachments = array()) {
    spl_autoload_unregister(array('YiiBase','autoload'));
	Yii::import('application.extensions.swift.swift_required', true);
	spl_autoload_register(array('YiiBase','autoload'));
	
	Swift_Preferences::getInstance()->setCharset('utf-8');
    
	$message = Swift_Message::newInstance()
      ->setSubject($subject)
      ->setFrom($from)
      ->setTo($to)
      ->setBody($body, 'text/html');
	
	$transport = Swift_MailTransport::newInstance();
    $mailer = Swift_Mailer::newInstance($transport);
    return $mailer->batchSend($message);
	
	}
	
}
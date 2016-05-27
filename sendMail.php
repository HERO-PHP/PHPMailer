<?php
    
    require_once './Mailer/class.phpmailer.php';
    require_once './Mailer/smtp.php';
    
    function sendMail($mailLists)
    {
        foreach($mailLists as $mailInfo)
        {
            $mail = new PHPMailer();
            $mail->Host         = '';//host
			$mail->isSMTP();
            $mail->Port         = 587;//port
            $mail->SMTPAuth     = true;
            $mail->Username     = '';//username
            $mail->Password     = '';//pwd
            $mail->From         = '';//sender
            $mail->FromName     = '';//sender remark
			$mail->SMTPSecure   = 'tls';
            $mail->CharSet      = 'UTF-8';

            $mail->isHTML(TRUE);
            
            $mail->Subject      = $mailInfo['subject'];
            
            $mail->addAddress($mailInfo['addressee']);
            $mail->addCC($mailInfo['cc']);
            
            $mail->SMTPDebug    = 1;
            $mail->Body         = $mailInfo['content'];
            
            if($mail->send()) {
                
                echo "success <br/>";
            } else {
                
                echo "fail <br/>";
            }
            
            $mail->__destruct();
            unset($mail);
            sleep(5);
        }
    }
    
    $mailLists      = array(
        array(
            'subject'       => 'test111',
            'addressee'     => '11@qq.com',
            'cc'            => '22@163.com',
            'content'       => 'send mail 1111',
        ),
        array(
            'subject'       => 'test222',
            'addressee'     => '33@163.com',
            'cc'            => '44@163.com',
            'content'       => 'send mail 2222',
        )
    );
    
    
    sendMail($mailLists);
    exit; 
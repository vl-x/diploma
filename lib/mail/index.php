<?php

require_once "lib/class.phpmailer.php";

$mail = new PHPMailer;

            $mail->setFrom('coolalexnov@gmail.com', 'От кого');
            $mail->addAddress('alex_webl@rambler.ru','Кому');

            $mail->isHTML(true);                                  // Set email format to HTML

            $mail->Subject = 'Тема';
            $mail->Body = "<h1>Заголовок сообщения</h1><div>Текст кого-то сообщения</div";


            if($mail->send()) {
              echo "Отправлено успешно";
            } else {
              $error[] = $mail->ErrorInfo;
            }


?>
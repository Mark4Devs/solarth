<?php
    $email = ""; 
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        $email = htmlspecialchars(stripslashes(trim($_POST['email'])));
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "Check fail 1 ";
        }else if (!ctype_print($email)) {
            echo "Check fail 2 ";
            echo $email;
        }else if(preg_match( "/[\r\n]/", $email )){
            echo "Check fail 3 ";
            echo $email;
        }else if (preg_match("/(bcc:|cc:|content\-type:)/i", $email)) {
            echo "Check fail 3 ";
            echo $email;
        }else if(preg_match("/(%0A|%0D|\\n+|\\r+)/i", $email)){
            echo "Check fail 4 ";
            echo $email;
        }else{
            $to = 'markdevs55555@gmail.com';
            $subject = 'Test Mailing Vulnerable';
            $from = 'Subject-Title <name@example.com>'; 

            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: '.$from."\r\n".
                'Reply-To: '.$email."\r\n" .
                'X-Mailer: PHP/' . phpversion();
            
            $message = '<html><body>';
            $message .= '<h1 style="font-weight:normal;">Feedback Form</h1>';
            $message .= '<h2 style="font-weight:normal;font-size:16px;">Email:'.$email.'</h2>';
            $message .= '</body></html>';
            
            mail($to, $subject, $message, $headers);
        }

    }  
?> 
<?php 
    $name = $email = $phone = $personCheck = $industCheck = $mssg = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['person-check'])){
            $personCheck = htmlspecialchars(stripslashes(trim($_POST['person-check'])));   
            $personCheck = "not defined";
        }
        if(isset($_POST['indust-check'])){
            $industCheck = htmlspecialchars(stripslashes(trim($_POST['indust-check'])));
        }else{
            $industCheck = "not defined";
        }
        if(isset($_POST['tel'])){
            $phone = htmlspecialchars(stripslashes(trim($_POST['tel'])));
        }else {
            $phone = "not defined";
        }
        if(isset($_POST['message'])){
            $mssg = htmlspecialchars(stripslashes(trim($_POST['message'])));
        }else{
            $mssg = "empty";
        }  
        $name = htmlspecialchars(stripslashes(trim($_POST['fname'])));
        $email = htmlspecialchars(stripslashes(trim($_POST['email']))); 
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "Check fail 1 ";
        }else if (!ctype_print($email)) {
            echo "Check fail 2 ";
            echo $email;
        }else if(preg_match( "/[\r\n]/", $email ) || preg_match( "/[\r\n]/", $name ) || preg_match( "/[\r\n]/", $phone ) 
        || preg_match("/[\r\n]/", $personCheck) || preg_match( "/[\r\n]/", $industCheck ) || preg_match( "/[\r\n]/", $mssg)){
            echo "Check fail 3 ";
            echo $email, $name, $phone, $industCheck, $personCheck , $mssg;
        }else if (preg_match( "/(bcc:|cc:|content\-type:)/i", $email ) || preg_match( "/(bcc:|cc:|content\-type:)/i", $name ) || preg_match( "/(bcc:|cc:|content\-type:)/i", $phone ) 
        || preg_match("/(bcc:|cc:|content\-type:)/i", $personCheck) || preg_match( "/(bcc:|cc:|content\-type:)/i", $industCheck ) || preg_match( "/(bcc:|cc:|content\-type:)/i", $mssg)) {
            echo "Check fail 4 ";
            echo $email, $name, $phone, $industCheck, $personCheck , $mssg;
        }else if(preg_match( "/(%0A|%0D|\\n+|\\r+)/i", $email ) || preg_match( "/(%0A|%0D|\\n+|\\r+)/i", $name ) || preg_match( "/(%0A|%0D|\\n+|\\r+)/i", $phone ) 
        || preg_match("/(%0A|%0D|\\n+|\\r+)/i", $personCheck) || preg_match( "/(%0A|%0D|\\n+|\\r+)/i", $industCheck ) || preg_match( "/(%0A|%0D|\\n+|\\r+)/i", $mssg)){
            echo "Check fail 5 ";
            echo $email, $name, $phone, $industCheck, $personCheck , $mssg;
        }else{
            $to = 'markdevs55555@gmail.com';
            $subject = 'Solarth Feedback Form';
            $from = 'Feedback <yourdomain@gmail.com>';
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: '.$from."\r\n".
                'Reply-To: '.$email."\r\n" . 
                'X-Mailer: PHP/' . phpversion();
            
            $message = '<html><body>';
            $message .= '<h1 style="font-weight:normal;">Feedback Form</h1>';
            $message .= '<h2 style="font-weight:normal;font-size:16px;">Name:'.$name.'</h2>';
            $message .= '<h3 style="font-weight:normal;font-size:16px;">Email:'.$email.'</h3>';
            $message .= '<h4 style="font-weight:normal;font-size:16px;">Phone:'.$phone.'</h4>';
            $message .= '<h5 style="font-weight:normal;font-size:16px;">Usage personal:'.$personCheck.'</h5>';
            $message .= '<h6 style="font-weight:normal;font-size:16px;">Usage industrial:'.$industCheck.'</h6>';
            $message .= '<p style="color:#000;font-size:14px;font-weight:normal;">'.$mssg.'</p>'; 
            $message .= '</body></html>';
             
            mail($to, $subject, $message, $headers);
        } 

    }  
?> 
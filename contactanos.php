<?php



    if(isset($_POST['email']) && $_POST['email'] !=''){

        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $asunto = $_POST['asunto'];
        $mensaje = $_POST['mensaje'];

        $to = "santiquu@gmail.com";
        $body = ""; 

        $body .= "From: ".$nombre. "/r/n";
        $body .= "Email: ".$email. "/r/n";
        $body .= "Message: ".$message. "/r/n"; 

        function IsInjected($str)
{
    $injections = array('(\n+)',
           '(\r+)',
           '(\t+)',
           '(%0A+)',
           '(%0D+)',
           '(%08+)',
           '(%09+)'
           );
               
    $inject = join('|', $injections);
    $inject = "/$inject/i";
    
    if(preg_match($inject,$str))
    {
      return true;
    }
    else
    {
      return false;
    }
}

if(IsInjected($email))
{
    echo "Bad email value!";
    exit;
}

        mail($to, $asunto, $body);
        
        }
    }

?>
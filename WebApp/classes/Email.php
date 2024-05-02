<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {

    public $email;
    public $name;
    public $token;
    public $password;
    
    public function __construct($email, $name, $token, $password = null)
    {
        $this->email = $email;
        $this->name = $name;
        $this->token = $token;
        $this->password = $password ?? '';
    }

    public function sendConfirmation() {
        // create a new object
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];
        $mail->SMTPSecure = 'ssl';
        
        $mail->setFrom($_ENV['EMAIL_USER'], 'accounts@iniciatec.com');
        $mail->addAddress($this->email, $this->name);
        $mail->Subject = 'Confirm your account';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $content = '<html>';
        $content .= "<p><strong>Hello " . $this->name .  "</strong> Thanks for creating your account, please confirm your account by clicking the following link.</p>";
        $content .= "<p>Click here: <a href='" . $_ENV['HOST'] . "/confirm?token=" . $this->token . "'>Confirm Your Account</a>";       
        $content .= "<p>If you did not request this change, you can ignore the message</p>";
        $content .= '</html>';
        $mail->Body = $content;
        $mail->send();
    }

    public function sendInstructions() {
        // create a new object
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];
        $mail->SMTPSecure = 'ssl';
    
        $mail->setFrom($_ENV['EMAIL_USER'], 'cuentas@iniciatec.com');
        $mail->addAddress($this->email, $this->name);
        $mail->Subject = 'Recupera tu Contraseña';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $content = '<html>';
        $content .= "<p><strong>Hola " . $this->name .  "</strong> Si has solicitado realizar un cambio de contraseña, haz click en el siguiente link.</p>";
        $content .= "<p>Haz click aquí: <a href='" . $_ENV['HOST'] . "/reset?token=" . $this->token . "'>Recuperar Contraseña</a>";        
        $content .= "<p>Si no has solicitado este cambio, puedes ignorar este correo.</p>";
        $content .= '</html>';
        $mail->Body = $content;

        $mail->send();
    }

    public function sendPassword(){
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];
        $mail->SMTPSecure = 'ssl';
    
        $mail->setFrom($_ENV['EMAIL_USER'], 'cuentas@iniciatec.com');
        $mail->addAddress($this->email, $this->name);
        $mail->Subject = 'Contraseña de tu cuenta';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $content = '<html>';
        $content .= "<p><strong>Hola " . $this->name .  "</strong> Se ha creado una cuenta con tu correo en IniciaTEC. A continuación se anexa la contraseña: " . $this->password . "</p>";
        $content .= "<p>Haz click aquí para iniciar sesión: <a href='" . $_ENV['HOST'] . "/login'> Iniciar Sesión</a>";        
        $content .= "<p>Si no has creado la cuenta, puedes ignorar este correo.</p>";
        $content .= '</html>';
        $mail->Body = $content;

        $mail->send();
    }
}
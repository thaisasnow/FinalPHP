<?php 

    require_once('vendor/autoload.php');
    use PHPMailer\PHPMailer\PHPMailer;

   date_default_timezone_set('America/Sao_Paulo');
   
    define('GUSER' ,  'thiaguinho.ts617@gmail.com');
    define('GPWD' , 'uchihaobito');

    function send($usuario){
        $mail = new PHPMailer;
        
        $mail->isSMTP();
        $mail->SMTPDebug = 2;
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPSecure ='tls';
        $mail->Port = 587;
        $mail->SMTPauth = true;
        $mail->Username = GUSER;
        $mail->Password = GPWD;

        $mail->setFrom('recupera-senha@pedacinhos.com.br', 'Pedacinhos de amor|SGV');
        $mail->addAddress($usuario->email);
        $mail->Subject = 'Recuperação de Senha';

        $mail->msgHTML(constroiMensagem($usuario->senha));
        $mail->AltBody = "Sua nova Senha é: {$usuario->senha}";

       $response = $mail->send();
        if($response){

            $log_file = fopen('log_email.log' , 'a');
            $date = date('Y-m-d H:i');
            fwrite($log_file, "$mail->ErrorInfo}\r\n{$usuario->email}\r\n{$date}\r\n\r\n");
            fclose($log_file);
            redirect('Sucesso', 'Foi gerado uma nova senha e enviada para seu email');

       }

       if(!$response){
        $log_file = fopen('log_email.log' , 'a');
        $date = date('Y-m-d H:i');
        fwrite($log_file, "Email enviado:  {$usuario->email} - {$date}\r\n\r\n");
        fclose($log_file);
        redirect('Falha', 'Ocorreu uma falha ao recuperar  a senha');
    }

    }
    function constroiMensagem($senha){

       return "<!DOCTYPE html>"
               . "<html lang='pt-br'>"
                ."<head>"
                    ."<meta charset='UTF-8'>"
                    ."<meta http-equiv='X-UA-Compatible' content='IE=edge'>"
                    ."<meta name='viewport' content='width=device-width, initial-scale=1.0'>"
                    ."<title>Document</title>"
                ."</head>"
                ."<body>"
                    ."<h1>Recuperação de senha <strong>SGV|Pedacinhos de Amor</strong></h1>"
                    ."<div align='center'>"
                        ."<h3>Sua nova é:$senha<h3>"
                    ."</div>"

                ."</body>"
                ."</html>";
    }
    function redirect($status, $msg){
        setcookie('notify', $msg, time() + 10, "sgv/index.php", 'localhost');
        setcookie('notify', $status, time() + 10, "sgv/index.php", 'localhost');
        header("location: index.php");
        exit;
    }

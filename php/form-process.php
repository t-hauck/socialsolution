<?php
require_once('recaptchalib.php');
//Defino a Chave do meu site
$secret_key = '6Le5CQwaAAAAAAvxKIlPM5PjqAiV6HJFbHuvH8-Y';
//Pego a validação do Captcha feita pelo usuário
//$recaptcha_response = $_POST['g-recaptcha-response'];



// Verifico se foi feita a postagem do Captcha 
if(isset($_POST['g-recaptcha-response'])){
		
	// Valido se a ação do usuário foi correta junto ao google
	$answer = 
		json_decode(
			file_get_contents(
				'https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.
				'&response='.$_POST['g-recaptcha-response']
			)
		);

	// Se a ação do usuário foi correta executo o restante do meu formulário
	if($answer->success) {
		
		require 'PHPMailerAutoload.php';

		$mail = new PHPMailer;

		//$mail->SMTPDebug = 3;                               // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'mail7.******.com.br';				  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = '******@******.com.br';             // SMTP username
		$mail->Password = '#SOC@PIT&2k20';                    // SMTP password
		$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 465;                                    // TCP port to connect to

		$mail->setFrom('******@******.com.br', 'SITE');
		$mail->addAddress('******@******.com.br', '******');// Add a recipient


		$mail->isHTML(false);                                 // Set email format to HTML

		$mail->Subject = 'Formulario de Atendimento';
		$mail->Body    = "Nome: ({$_POST['name']}) \r\n";
		$mail->Body   .= "Contato: ({$_POST['email']}) \r\n";
		$mail->Body   .= " Texto: ({$_POST['message']} \r\n)";  
		$mail->Body   .= " Plano: ({$_POST['plano']} \r\n)";
		$mail->AltBody = 'socialsolution.com.br';

		if(!$mail->send()) {
			echo 'Mensagem não pode ser enviada';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			echo 'Sua mensagem foi entregue, entraremos em contato.';
		}
	}
	// Caso o Captcha não tenha sido validado 
	//retorno uma mensagem de erro. 
	else {
		echo 'Por favor, faça a verificação do captcha.';
	}
}
?>

<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'smaneventos@gmail.com';
  
  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  date_default_timezone_set("America/Sao_Paulo");
  $data_envio = date('d/m/Y');
  $hora_envio = date('H:i:s');
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'smtp.gmail.com',
    'username' => 'willartes@gmail.com',
    'password' => 'tsxjlgcjivyffzzp',//esta é a senha willartes
    //'password' => 'fqnmxgbnynxhlmno',//esta é a senha william.rodrigues
    'port' => '587'
  );*/
  
  $contact->smtp = array(
    'host' => 'smtp.gmail.com',
    'username' => 'smaneventos@gmail.com',
    'password' => 'xelwjlrcqzoaahxh',//esta é a senha smaeventos
    
    'port' => '587'
  );
  
  /*Para liberar a senha de app é necessário ativar a verificação em 2 etapas no gerenciador de contas da google e gerar a senha*/ 

  $contact->add_message( $_POST['name'], 'De');
  $contact->add_message( $_POST['email'], 'E-mail');
  $contact->add_message( $_POST['subject'], 'Assunto', 5);
  $contact->add_message( $_POST['message'], 'Mensagem', 20);
  $contact->add_message( $data_envio, 'Data de envio');
  $contact->add_message( $hora_envio, 'Hora do envio');
  
  
  echo $contact->send();


  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */
/*
  //Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'william.rodrigues.wgh@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }
  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];
  
  $data_envio = date('d/m/Y');
  $hora_envio = date('H:i:s');
  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials

  $contact->smtp = array(
    'host' => 'smtp.gmail.com',
    'username' => 'willartes@gmail.com',
    'password' => 'pkzexcaqkivhbmwa',
    'port' => '587'
  );
    

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);
    try {
      echo $contact->send();
      echo 'Mensagem enviada com sucesso!';
    } catch (Exception $e) {
      echo "Ocorreu um erro ao enviar a mensagem. Detalhes do erro: {$contact->ErrorInfo}";
    }
*/
?>
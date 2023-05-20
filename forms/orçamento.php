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

  $book_a_table = new PHP_Email_Form;
  $book_a_table->ajax = true;

  date_default_timezone_set("America/Sao_Paulo");
  $data_envio = date('d/m/Y');
  $hora_envio = date('H:i:s');
  $book_a_table->to = $receiving_email_address;
  $book_a_table->from_name = $_POST['name'];
  $book_a_table->from_email = $_POST['email'];
  $book_a_table->subject = $_POST['subject'];
  

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  
  $book_a_table->smtp = array(
    'host' => 'smtp.gmail.com',
    'username' => 'smaneventos@gmail.com',
    'password' => 'xelwjlrcqzoaahxh',
    'port' => '587'
  );
  

  $book_a_table->add_message( $_POST['name'], 'Nome');
  $book_a_table->add_message( $_POST['email'], 'E-mail');
  $book_a_table->add_message( $_POST['phone'], 'Telefone', 4);
  $book_a_table->add_message( $_POST['date'], 'Data', 4);
  $book_a_table->add_message( $_POST['time'], 'Duração', 2);
  $book_a_table->add_message( $_POST['people'], '# de pessoas', 1);
  $book_a_table->add_message( $_POST['message'], 'Mensagem', 20);
  $book_a_table->add_message( $data_envio, 'Data de envio');
  $book_a_table->add_message( $hora_envio, 'Hora do envio');

  echo $book_a_table->send();
?>

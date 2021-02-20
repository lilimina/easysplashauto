<?php

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'contact@eazyautosplash.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['firstname'];
  $contact->from_email = $_POST['email'];
  $contact->subject = 'New Booking Request';

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $contact->add_message( $_POST['firstname'], 'First name');
  $contact->add_message( $_POST['lastname'], 'Last name');
  $contact->add_message( $_POST['telephone'], 'Tel');
  $contact->add_message( $_POST['email'], 'Email');  
  $contact->add_message( $_POST['address'], 'Address');
  $contact->add_message( $selectOption = $_POST['type'], 'Type of vehicle');
  $contact->add_message( $selectOption = $_POST['time'], 'Requested time');
  $contact->add_message( $selectOption = $_POST['servicetype'], 'Service package');
  $contact->add_message( $selectOption = $_POST['addon'], 'Add on');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>

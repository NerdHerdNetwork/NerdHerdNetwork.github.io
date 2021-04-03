<?php

if(isset($_POST['submit'])) {
  $name = $_POST['name'];
  $mailfrom = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  $mailto = "frankpodraza@icloud.com";
  $headers = "From: ".$mailfrom;
  $txt = "This is an email from ".$name." on www.nerdherd.network.\n\n".$message;

  mail($mailto, $subject, $txt, $headers);

  header("Location: index.html?mailsend");

}

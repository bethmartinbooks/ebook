<?php
session_start();
$passing = hash('sha256',$_SESSION['getfile']);

$book = $_SESSION['book'];
$file = $book.".zip";
$downloadname = "TheEndofRefuge.zip";

if ($passing == "7fc8ebf3145aab4772bed341fd8781ecaefc6867f1f1e350253969ac7d3f12b1"){
  if ($book == teor){
      header('Content-Description: File Transfer');
      header('Content-Type: application/octet-stream');
      header('Content-Disposition: attachment; filename = "TheEndofRefuge.zip"');
      header('Expires: 0');
      header('Cache-Control: must-revalidate');
      header('Pragma: public');
      header('Content-Length: ' . filesize($file));
      readfile($file);
      exit; }
 }
exit;
?>
<?php session_start();
$_SESSION["getfile"] = "fail"; ?>
<!DOCTYPE html>
<html>
<head><title>Redeem now</title>
<style>
p {
  font-family: Verdana;
  color: #1c1e20;
}
</style>
</head>
<?php
$d = "0";
if ($_POST['ebook'] == "teor") {
  $file = "/codes.txt";
  $_SESSION['book'] = "teor"; }
if ($_POST['ebook'] == "dna") {
  $file = "/codes2.txt";
  $_SESSION['book'] = "dna"; }
$ebook = "download.php";
$t = strlen($_POST['code']);
$text = hash('sha256',strtoupper($_POST['code']));
if(strpos(file_get_contents($file),$text) !== false) {
         $d = "1";
         file_put_contents($file, str_replace($text, $text."x", file_get_contents($file))); } 
    else { ?>
<p>Sorry, but the code you entered was not valid. <a href="/test.html">Please try again.</a> <br /><br /></p>
   <?php }
if(strpos(file_get_contents($file),$text."xxxx") !== false) {
         $d = "0"; ?>
<p>Sorry, but the maximum number of downloads has been met. <br /><br /></p>
         <?php }
if ( $d == "1" ) {
         $passing = "one2three4five"; 
         $_SESSION['getfile'] = $passing; ?>
<p>Thank you. You may begin downloading your ebook by clicking the button below.<br /><br /></p>
<p style="text-align: center;"><div style="width:50%; margin:auto;"><form action="/<?php echo "$ebook"; ?>" method="post"><button type="submit" value="download" style="background-color: #9fff63; padding: 14px 40px; font-size: 16px; border-radius: 8px; boarder: 0px; width:100%;">Start download</button></form></p></div><div style="clear: both;"></div>
<?php }
else { ?>
<p>If you continue having trouble redeeming your code, shoot me an email at <a href="mailto:BethMartinBooks.com">BethMartinBooks@gmail.com</a></p>
<?php } ?>
<br /><br />
</div>
</body>
</html>
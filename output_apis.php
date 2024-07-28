<?php

function new_log() {
        session_start();
        echo "will verify these other var";
        echo $_SESSION['mail'];
        echo $_SESSION['token'];

  //for further use , as a boolean wheter something similar to "If [ $count === "1" ];" could be use. 
  $count = 0;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

  ///these two variables are from other parts of the session, most likely to be. 
$mail_text = $_SESSION['mail'];
$token_text = $_SESSION['token'];
error_reporting(E_ALL);

  //try and catch so it doesnt breaks, 
try {
        //the dir getting the file needs to have 777, could do a chmod 777 so it works. No any other use for this dir, also blockin  webbrowsing . 
        $myfile = fopen('../tokens/inbound_logs/' . $token_text , "w");
        $count ++;
        echo "$count";
        $txt = $mail_text . "\n";
        fwrite($myfile, $txt);
        $txt = $token_text . "\n";
        fwrite($myfile, $txt);
        fclose($myfile);

} catch (Exception $e) {

    $total_message = "Error#". mysqli_connect_errno(). " ". $e->getMessage();
    mysqli_connect_errno(). " ". $e->getMessage();

      ///this could be set for writing a file instead, so we are aware of any changes, for simple use for testing just echo
    echo "$total_message\n";
    echo "yeah";
                }
}
new_log();
?>

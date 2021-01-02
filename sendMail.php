<?php
    header("Refresh:5; url=/contact.html");

    //get vars from post
    $name = $_POST["name"];
    $subject = $_POST["subject"];
    $emailAddress = $_POST["emailAddress"];
    $body = $_POST["body"];
    $test = $_POST["test"];
    $sendKA = true;

    //fail on blank
    if ($name == "" || $subject == "" || $emailAddress == "" || $body == "" || $test == "") {
        $sendKA = false;
        echo "MESSAGE FAILED TO SEND<br>";
        echo "You must not leave any fields blank.<br>";
    }

    //fail on invalid email
    if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
        $sendKA = false;
        echo "MESSAGE FAILED TO SEND<br>";
        echo "You must enter a valid email address.<br>";
      }

    //fail on test failure
    if ($body[0] != $test[0]) {
        $sendKA = false;
        echo "MESSAGE FAILED TO SEND<br>";
        echo "You failed the security test. Are you a robot?<br>";
        echo 'The "first character" is the first letter in your message. So if your message was "Hello iklone", the first character would be "H".' . "<br>";
    }

    //if sendKA then send email
    if ($sendKA) {
        //first build body string
        $msg = "From: " . $name . "\nTo: Maid Spin\nReturn: " . $emailAddress . "\n\n" . $body;
        $msg = wordwrap($msg,70);
        $sbj = "Maid Spin - " . $subject;
        $mailHeaders = "From: contact@iklone.org";

        //send email
        $response = mail("jamesthackway@hotmail.co.uk", $sbj, $msg, $mailHeaders);
        echo $response . "<br>";

        //success text
        echo "MESSAGE SUCCESSFULLY SENT<br>";
        echo "I will try to respond to you within three days.<br>";
    }

    //Redirect after 5 seconds
    echo "<hr>Redirecting in 5 seconds.<br>";
?>
<?php

$dbcon = mysqli_connect("localhost", "aalamviz_usr", "#XPS?ksesXxb");

mysqli_select_db($dbcon, "aalamviz_trust");



function sendSubscriptionConfirmationMail($data){
    $adminMailId = 'karthi0110@gmail.com';
    $headers = "From: $adminMailId\r\n";
    $headers .= "Reply-To: $adminMailId\r\n";
    $headers .= "Return-Path: $adminMailId\r\n";
    //$headers .= "BCC: karthi0110@gmail.com\r\n";

    $to = $data['email'];
    $subject = 'Registration Success';
    $message = 'Hi '.$data['name']."\n";
    $message .= 'Thank you for regestering with us! We have received your request. Currently your subscription is waiting for admin approval. Once its verified, you will be notified.';
    
    mail($to, $subject, $message, $headers);
    
    $subject = 'New subscription!';
    $message = 'Name: '. $data['name'] . ' Email: '. $data['email'];
    mail($adminMailId, $subject, $message, $headers);
}

function subscriptionApprovalMail($email, $name){
    $adminMailId = 'karthi0110@gmail.com';
    $headers = "From: $adminMailId\r\n";
    $headers .= "Reply-To: $adminMailId\r\n";
    $headers .= "Return-Path: $adminMailId\r\n";
    //$headers .= "BCC: karthi0110@gmail.com\r\n";

    $to = $email;
    $subject = 'Subscription Activated';
    $message = 'Hi '.$name."\n";
    $message .= 'Your registration is accepted!';
    
    mail($to, $subject, $message, $headers);
    
    $subject = 'Subscription Acknowledged!';
    $message = 'Name: '. $name . ' Email: '. $email;
    mail($adminMailId, $subject, $message, $headers);
}

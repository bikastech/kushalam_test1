<?php

if(!empty($_POST['user'])){
	
	  require 'PHPMailer/PHPMailer-master/PHPMailerAutoload.php';
	   $mail = new PHPMailer();
	   $mail ->IsSmtp();
	   $mail ->SMTPDebug = 0;
	   $mail ->SMTPAuth = true;
	   $mail ->SMTPSecure = 'ssl';
	   $mail ->Host = "smtp.gmail.com";
	   $mail ->Port = 465; // or 587
	   $mail ->IsHTML(true);


	   $mail ->Username = "Yourusername@gmail.com";
	   $mail ->Password = "youpassword@123";
	   $mail ->SetFrom("Yourusername@gmail.com");

	    require_once "db.php";
	    // print_r($_SESSION['user_id']);
	    // die;
        $sqlQuery = "SELECT 
            *
            FROM
                users where id in (".implode(',', $_POST['user']).")
            ORDER BY id DESC";
        
        $result = mysqli_query($db, $sqlQuery);
       
        $userArray = array();
        while ($row = mysqli_fetch_assoc($result)) {

            	$query = "INSERT INTO shared_event (user_by, shared_to,event_id) 
						  VALUES(".$_SESSION['user_id'].", ".$row['id'].", ".$_POST['event_id'].")";

				mysqli_query($db, $query);

             	$mail ->Subject = "You have got a event notification ";
			    $mail ->Body = "Hi".$row['name'].", You have invited for one event!";
			    $mail ->AddAddress($row['email']);

			    if(!$mail->Send())
			    {
			       // echo "Mail Not Sent";
			       header('location: index.php');
			    }
			    else
			    {
			       // echo "Mail Sent";
			       header('location: index.php');

			    }
        }


	  
}

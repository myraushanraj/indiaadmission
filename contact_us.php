<?php
include("admin/lib/database.php");
include("admin/lib/function.php");


    $mailto = "xyz@gmail.com";	
	$subject = 'Enquiry From Pencil Page';
	
	$from_mail= $_REQUEST['email'];
	$from_name= $_REQUEST['name'];
	$select1 = $_REQUEST['select1'];
	$phone = $_REQUEST['phone'];
    $message = $_REQUEST['message'];
    if(!empty($_REQUEST['name']) && !empty($_REQUEST['email']) && !empty($_REQUEST['select1']) && !empty($_REQUEST['message']))
    {
  	$message_db=mysqli_query($conn,"insert into customer set name='".$from_name."',email_id='".$from_mail."',mobile_no='".$phone."',message='".$message."',course='".$select1."',status='1',created_on=now()");	          
	$message = '
		<!DOCTYPE html>
		<html>
		<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<title>Contact Details</title>	
		</head>
		<body>
			<div style="font-family: \'Open Sans\',  sans-serif; background-color: #eeeeef; padding: 50px 0; ">
				<div style="max-width:640px; margin:0 auto; "> 
					<div style="color: #fff; text-align: center; background-color:#ea2127; padding: 5px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;">  
						<h1>Roof Ease</h1>
					</div>
					<div style="padding: 20px; border: 1px solid #989898; background-color: rgb(255, 255, 255);">           
					<p style="color: rgb(85, 85, 85); font-size: 14px;"><span style="font-weight: 600; color: rgb(53, 53, 53);">Hi '.$from_name.'</span>,<p>
					<p style="color: rgb(53, 53, 53); font-size: 14px; font-weight: 600;">Enquiry From Roof Ease Page!</p>    
					<div style="border-left: 1px solid #989898; padding-left:15px;">					
					<p style="color: rgb(85, 85, 85); font-size: 14px;"> Name: '.$from_name.'</p>  
					<p style="color: rgb(85, 85, 85); font-size: 14px;"> Email: '.$from_mail.'</p> 
			    	<p style="color: rgb(85, 85, 85); font-size: 14px;"> Course: '.$select1.'</p> 
					<p style="color: rgb(85, 85, 85); font-size: 14px;"> Message: '.$message.'</p>  
					
					</div>          
					<p style="color: rgb(85, 85, 85); font-size: 14px; padding: 20px 0px;"> Have a great day!</p> 
					 
					<p style="color: rgb(85, 85, 85); font-size: 14px; margin-bottom: 10px; margin-top: 2px; padding: 20px 0px;">Thanks & Regards,</p> 
					<p style="color: rgb(85, 85, 85); font-size: 14px; margin-bottom: 0px; margin-top: 2px;"><b>Cheers</b></p>
					
					<p style="color: rgb(85, 85, 85); font-size: 14px; margin-bottom: 0px;
		    margin-top: 2px;"><b>Team Pencil</b></p>
					<p style="color: rgb(85, 85, 85); font-size: 13px; margin-bottom: 0px; margin-top: 2px;"><a href="ABC@gmail.com" style="color: #ea2127;">ABC@gmail.com</a></p>
					<br>
							
					</div>
				</div>
			</div>
			</body>
		</html>';
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: '.$from_name.' <'.$from_mail. ">\r\n";
		if(mail($mailto, $subject, $message, $headers)){
		}
		$response['status']=1;
	    $response['status_message'] = 'Your enquiry has been sent successfully';
    }else{
        $response['status']=0;
	    $response['status_message'] = 'Required parameters are not available'; 
    }
    echo json_encode($response);

?>
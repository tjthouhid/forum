<?php 
	include 'Db.php';
	session_start();
	
	if(isset($_POST)){
		if(isset($_SESSION['user_loggedIn'])){
		
			$data['comment_detail']=$_POST['comment_detail'];
			
			$data['user_id']=$_SESSION['user_id'];
			$data['thread_id']=$_POST['thread_id'];
			
			
		
				
				$db = new Db();
				//$dbPrefix=$db->dbPrefix();

				$ins=$db->insert($data,"comments");
				if($ins->type=="success"){
					$_SESSION['noty_msg']="Comment Inserted Successfully";
					$_SESSION['noty_type']="success";
					header("Location:../view_thread.php?id=".$data['thread_id']);
				}else{
					$_SESSION['noty_msg']="Please Try Again Later!";
					$_SESSION['noty_type']="error";
					header("Location:../view_thread.php?id=".$data['thread_id']);
				}
			}else{
				//Eror Page
				$_SESSION['noty_msg']="Sorry You Are Not Logged In!";
				$_SESSION['noty_type']="error";
				header("Location:../index.php");
			}
			
	
		
		

	}else{
		//Eror Page
		$_SESSION['noty_msg']="Sorry You Have Tried To Access Protected File!";
		$_SESSION['noty_type']="error";
		header("Location:../index.php");
	}
	
?>
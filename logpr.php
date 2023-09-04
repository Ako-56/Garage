<?php session_start();
	include('config/config.php');
	$_SESSION['username']='';
	
	$ECode = $_POST['ECode'];
	$pwd = $_POST['pwd'];
	
	$ECode = str_replace("'", "`", $ECode);
	$pwd = str_replace("'", "`", $pwd);

	$query_i = "SELECT * FROM sysuserregister Where UserName = '$ECode'";
	$RAva = mysqli_query($conn, $query_i);
	if(mysqli_num_rows($RAva) > 0){  
		$Sta = 'Pending';
		$pwr = hash_hmac('sha512', 'thumbi'.$pwd, $Sta);

		$query = "SELECT * FROM sysuserregister Where UserName = '$ECode' And PassWord='$pwr' ";
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result) > 0){ 
			if($row = mysqli_fetch_object($result)){
				$Nam = $row->Name;
				$_SESSION['username']=$ECode; 
				header('Location:dashboard'); exit;
			}
		}else{ 
			$Ern='Unknown user or password'; header('Location:index'); exit;
		} 
	}else{
		echo "akun".mysqli_error($conn);
	}
?>
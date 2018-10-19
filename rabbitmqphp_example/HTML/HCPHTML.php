<?php
include('/home/cong-danh/IT490/Konsolidate/rabbitmqphp_example/myFunctions.php');
session_start();
//gateKeeper("login.html");
?>




<?php
	if(gateKeeper("login.html")){
?>
<!DOCTYPE html>

<style type>

#body
{
	height: 350px;
	width: 750px;
	margin: auto;
	border-style: ridge;
	border-width: 5px;
	border-radius: 25px;
	border-color: yellow black yellow black;
}

</style>

<center>
<body id = "body">
	[HCP Homepage] <br><br>
	<form action = "UploadProcess.php" method = "post" enctype = "multipart/form-data">
		Select a file: <input type = "file" name = "myFile" id = "myFile"><br><br>
		<input type = "submit" value = "Upload File" name = "submit">
	</form>
	<?php
		gateKeeper("login.html");
	?>

	<br><br><br><a href = "logout.php">[LOGOUT]</a>
</body>

<?php
	}
?>

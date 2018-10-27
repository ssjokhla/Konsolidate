<?php
include('/home/cong-danh/IT490/Konsolidate/rabbitmqphp_example/myFunctions.php');
session_start();
?>




<?php
	if(gateKeeperLogin("login.html") && gateKeeperRole("login.html", "HCP")){
	//echo $_SESSION["Therapist"];
	//echo gettype($_SESSION["Therapist"]);
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


	<form action = "viewReports.php" method = "get">
		<input type = submit value = "View Your Reports">
	</form>


	<form action = "logout.php" method = "get">
		<input type = submit value = "Back">
	</form>
</body>

<?php
	}
?>

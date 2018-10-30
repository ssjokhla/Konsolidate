<?php
include('/home/cong-danh/IT490/Konsolidate/rabbitmqphp_example/myFunctions.php');
session_start();
?>




<?php
if(gateKeeperLogin("login.html") && gateKeeperRole("login.html", "hcp")){
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
		<input type = submit value = "reports" name = "reports">
	</form>


	<form action = "logout.php" method = "get">
		<input type = submit value = "Back">
	</form>
<?php
	$client = new rabbitMQClient("testRabbitMQ.ini","downServer");
	$request = array();
	$request['type'] = "down";
	$response = $client -> send_request($request);
	$files = scandir("/var/www/html/downloads/");
	$files1 = scandir("/var/www/html/uploads/");
	//echo "$files[2]";
	for($i=2; $i < count($files); $i++)
	{	
?>
<p>
	<a href="downloads/
<?php
		echo $files[$i]
			?>"><?php echo $files[$i] ?></a>	
			</p>
<?php
			echo count($files);
		echo "<br> count of uploads folder is:".count($files1);
	}

?>
</body>

<?php
	#encapsulating HTML so that gateKeeper works
}
?>

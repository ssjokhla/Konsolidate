<?php
include('/home/cong-danh/IT490/Konsolidate/rabbitmqphp_example/myFunctions.php');
session_start();
//gateKeeper("login.html");
?>



<?php
	if(gateKeeperLogin("login.html") && gateKeeperRole("login.html", "researcher")){
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
	[Researcher Homepage] <br>

	<form action = "logout.php" method = "get">
		<input type = submit value = "Back">
	</form>

	
	<form action = "DownloadProcess.php" method = "get">
		<input type = submit value = "down">
	</form>
</body>

<?php
	}
?>

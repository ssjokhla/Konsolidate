<?php
include('/home/cong-danh/IT490/Konsolidate/rabbitmqphp_example/myFunctions.php');
session_start();
?>



<?php
	if(gateKeeperLogin("login.html") && gateKeeperRole("login.html", "patient")){
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
	[Patient Homepage] <br>

	<form action = "logout.php" method = "get">
		<input type = submit value = "Back">
	</form>
</body>

<?php
	}
?>

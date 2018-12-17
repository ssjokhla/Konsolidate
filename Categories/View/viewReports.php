<!DOCTYPE>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="boostrapcore.css" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
	table
	{
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 100%;
	}

	td, th
	{
		border: 1px solid #dddddd;
		text-aline: left;
		padding: 8px;
	}

</style>

<body>
<div class="container">
<div class="center">
<div class = "content">
		<div id="title">
<h1 style="color: black;"><strong> <font color ="black"> P A T I E N T &nbsp  D A T A<strong></h1>
</font>
</div>
	<div id="login">
    <h2>Filterable Table</h2>
  <p>Type something in the input field to search the table for first names, last names or emails:</p>
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
		<div class="table table-striped table table-hover table table-condensed">
<table class="table">
  <thead>
  <tr>
    <th>Name</th>
    <th>Patient Group</th>
    <th>Age</th>
    <th>Gender</th>
    <th>Time Since Stroke</th>
    <th>Affected Hand</th>
    <th>Dominant Hand</th>
    <th>Lesion Locations</th>
  </tr>
</thead>
<?php
	//My Functions
	include('/var/Konsolidate/Categories/Require/RequestProcessorFunctions.php');
	//include('/var/Konsolidate/Categories/View/ViewFunctions.php');
	session_start();
	$client = new rabbitMQClient("/var/Konsolidate/Categories/Require/testRabbitMQ.ini","viewServer");
	$therapist = $_SESSION["Therapist"];
  $request = array();
	$request['type'] = "view";
	$request['role'] = $therapist;
	$response = $client->send_request($request);
	$payload = json_encode($response);
	$array = json_decode($payload, true);
//echo "<hr>".$array[ID][0]."<hr> <hr>".$array[ID][1]."<hr>";
  $count = count($array[ID]);
  //echo $count;
  echo "<tbody id='myTable'>";
  for ($x = 0; $x < $count; $x++)
  {
		if($array[Gender][$x] == "1")
		{
				$gender = "Boy";
		}
		else
		{
			$gender = "Girl";
			// code...}
		}
		if($array[AffectedHand][$x] == "1")
		{
				$hand = "aRight";
		}
		else
		{
			$hand = "aLeft";
			// code...}
		}
  echo"<tr>
    <td>". $array[ID][$x]. "</td>
    <td>". $array[PatientGroup][$x]. "</td>
    <td>". $array[Age][$x]. "</td>
    <td>". $gender. "</td>
    <td>". $array[TimeSinceStroke][$x]. "</td>
    <td>". $hand. "</td>
    <td>". $array[Handedness][$x]. "</td>
    <td>". $array[LesionLocation][$x]. "</td>
  </tr>";
  }

echo"</tbody>";
?>
</table>
</div>
<form action = "HCPHTML.php">
<input class="btn btn-link btn-lg btn-block" type = submit value = "Back"/>
</form>
</div>
</div>
</div>
</div>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</body>
</html>

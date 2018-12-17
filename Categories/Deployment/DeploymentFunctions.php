<?php
require_once('/var/Konsolidate/Categories/Require/path.inc');
require_once('/var/Konsolidate/Categories/Require/get_host_info.inc');
require_once('/var/Konsolidate/Categories/Require/rabbitMQLib.inc');

#This function will send a message through rabbit with inforation about which version of a package to update
function pushUpdate($destination, $category)
{
	//Creating a new Client for RabbitMQ
	$client = new rabbitMQClient("depRabbitMQ.ini", "pushServer");
	//New array to eventually send
	$request = array();
	$request['type'] = "pushUpdate";
	$request['destination'] = $destination;
	$request['category'] = $category;
	$client->send_request($request);

}

function push($destination, $category)
{
	$con = mysqli_connect("localhost", "admin", "password", "masterDB");
	mysqli_select_db($con, "masterDB");

	//Checking if connected to database
	if (!$con){
		logError("Connection Failed: " . mysqli_connect_error());
		die("Connection failed: " . mysqli_connect_error());
	}

	//Checks username and hashes the password to chek database
	$s = "select * from packages where version = (SELECT MAX(Version) FROM packages where Name = '$category')";
	echo "SQL Statement: $s";
	$t = mysqli_query($con, $s);
	$row = mysqli_fetch_row($t);
	if($destination == "PRFE")
	{
		echo "Sending to Prod FrontEnd";
	}
	elseif($destination == "PRBE")
	{
		echo "Sending to Prod Backend";
	}
	elseif($destination == "QAFE")
	{
		echo "Sending to QA Frontend";
	}
	elseif($destination == "QABE")
	{
		//192.168.0.104
		shell_exec("scp $row[2] qa@192.168.0.108:/var/Konsolidate/Pending");
		echo "\n";
		echo "Sending to QA Backend";
	}
	else
	{
		return "N/A";
	}
}

function dePackage($name, $path, $status, $SCP, $PackageName)
{
//      shell_exec("scp $SCP:$path /var/Konsolidate/Pending/$name\_$newVersion");
        $con = mysqli_connect("localhost", "admin", "password", "masterDB");
        mysqli_select_db($con, "masterDB");

        //Checking if connected to database
        if (!$con){
                logError("Connection Failed: " . mysqli_connect_error());
                die("Connection failed: " . mysqli_connect_error());
        }

        $v = "select Version from packages where version = (Select MAX(Version) FROM packages where Name = '$name')";
        $version = mysqli_query($con, $v);
        $row = mysqli_fetch_row($version);
        $versionNum = $row[0];
        $newVersion = $versionNum + 1;

        $newPath = "/var/Konsolidate/Pending/$name"."_"."$newVersion.tar.gz";
        shell_exec("scp $SCP:$path $newPath");
        //Checks username and hashes the password to chek database
        $s = "INSERT INTO `packages` (`Name`, `Version`, `Path`, `Status`, `PackageName`) VALUES ('$name', '$newVersion', '$newPath', '$status', '$PackageName')";
        echo "SQL Statement is: $s";
        mysqli_query($con, $s);
        echo "Successfully inserted into packages table";
}

//Description of new row to be added to the packages database
function devPackage($name, $path, $status, $PackageName)
{
        if($status == "")
        {
                $status = "testing";
        }
        $whoami = shell_exec("whoami | awk '{print $1}'");
        $whoami = str_replace("\n", "", $whoami);
        $IP = shell_exec("hostname -I | awk '{print $1}'");
        $IP = str_replace("\n", "", $IP);
        $SCP = $whoami."@".$IP;
        //Creating a new Client for RabbitMQ
        $client = new rabbitMQClient("depRabbitMQ.ini", "depServer");
        //New array to eventually send
        $request = array();
        $request['type'] = "package";
        $request['name'] = $name;
        $request['path'] = $path;
        $request['status'] = $status;
        //$request['description'] = $description;
        $request['SCP'] = $SCP;
        $request['PackageName'] = $PackageName;
        $client->send_request($request);
}


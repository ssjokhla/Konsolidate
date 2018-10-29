<?php

if(isset($_FILES['file']))
{
	$file = $_FILES['file'];

	$file_name= $file['name'];
	$file_tmp = $file['tmp_name'];

	$file_ext = explode ('.', $file_name);
	$file_ext = strtolower(end($file_ext));
	//$file_Time_Stamp = filemtime($file_name);
	$file_name_new = uniqid('', true) . '.' . $file_ext;
	//$file_name_new = $file_Time_Stamp . '.' . $file_ext;

	echo gettype($file_ext);
	echo  $file_ext;
	$allowed_ext= array('csv');
	if(in_array($file_ext,$allowed_ext))
	{
		$file_destination = '/var/www/html/uploads/' . $file_name_new;
		echo " <br>";
		echo $file_destination;
		echo "<br>";
		echo $file_tmp;	
		echo "<br>";
	
		if(move_uploaded_file($file_tmp, $file_destination))
		{
			echo $file_destination;
		}
		else {
			echo "failure";
		     }
	
	}
	
	else
	{
		echo " You entered wrong file type";
	}
}
/*
$info = pathinfo($_FILES['myFile']['name']);
$ext = $info['extension'];
$newname = "newname.".$ext;

$target = 'testPurposes/' .$newname;
move_uploaded_file($_FILES['myFile']['tmp_name'], $target);

 */
$filename = $_FILES['myFile']['name'];
echo "File [" . $_FILES['myFile']['name'] . "] has been successfully uploaded!";
copy($file,'/home/cong-danh/IT490/Konsolidate/rabbitmqphp_example/testFileDirectory');
echo file_get_contents($file);
?>

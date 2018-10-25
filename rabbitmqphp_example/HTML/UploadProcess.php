<?php
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

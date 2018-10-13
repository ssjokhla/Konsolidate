#!/usr/bin/php
<?php
//$connection = new MongoClient( "mongodb://testadmin:test1234@ds041633.mongolab.com:41633/sys_integration" );
$connection = new MongoDB\Driver\Manager("mongodb://admin:password@localhost:27017");
$filter = array('username'=>'test','password'=>'password');
$options = array('limit'=>1);
$query = new MongoDB\Driver\Query($filter, $options);
$rows = $connection->executeQuery('TestDB.members', $query);
foreach($rows as $row)
{
	var_dump($row);
}
/*
$mongodb = $connection->selectDB('TestDB');
$collection = new MongoCollection($mongodb,'loghistory');
var_dump($connection);
var_dump($collection);
//$collection->insert(array("username"=>"steeeve"));

//echo "data inserted\n";
$cursor = $collection->find(array("username"=>"steeeve"));
echo "find results:\n";
foreach ($cursor as $doc)
{
  var_dump($doc);
}
 */
?>

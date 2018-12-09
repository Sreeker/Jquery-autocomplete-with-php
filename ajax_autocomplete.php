<?php
//session_start();
include ("dbconnect.php");

$term = $_REQUEST['term'];
$action = $_REQUEST['action'];
$a_json = array();
$a_json_row = array();

if($action == "name"){
	
	 $query = $pdo->prepare('SELECT name FROM customers WHERE name LIKE :keyword LIMIT 0,15');
	 $query -> bindValue('keyword','%'.$_GET['term'].'%');
	 $query ->execute();
	 $result = array();
	while($row = $query -> fetch(PDO::FETCH_OBJ))
	{
		array_push($result, $row->name);
	}
	echo json_encode($result);
}
if($action == "address"){

	$query = $pdo->prepare('SELECT address FROM customers WHERE address LIKE :keyword LIMIT 0,15');
	$query -> bindValue('keyword', '%'.$_GET['term'].'%');
	$query ->execute();
	$result=array();
	while($row = $query ->fetch(PDO :: FETCH_OBJ))
	{
		array_push($result, $row->address);
	}
	echo json_encode($result);
}
if($action == "city"){

	$query = $pdo->prepare("SELECT city FROM customers WHERE city LIKE :keyword LIMIT 0,15");
	$query -> bindValue('keyword','%'.$term.'%');
	$query->execute();
	$result = array();
	while($row = $query->fetch(PDO::FETCH_OBJ))
	{
		array_push($result,$row->city);
	}
	echo json_encode($result);
}


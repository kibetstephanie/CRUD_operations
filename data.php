<?php 

require 'conn.php';

if(isset($_POST['register']))
{
	$stmt = $conn->prepare('insert into user_data(name,email,city,password) values(:name,:email,:city,:password)');
	$stmt->bindValue('name', $_POST['name']);
	$stmt->bindValue('email', $_POST['email']);
	$stmt->bindValue('city', $_POST['city']);
	$stmt->bindValue('password',md5($_POST['password']));

	$stmt->execute();
	header("location:index.php?noError=true");
}
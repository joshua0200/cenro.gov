<?php 
ob_start();
$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();

if ($action == 'login') {
	$login = $crud->login();
	if ($login)
		echo $login;
}

if ($action == 'logout') {
	$logout = $crud->logout();
	if ($logout)
		echo $logout;
}

if ($action == "save_cases") {
	$save = $crud->save_cases();
	if ($save)
		echo $save;
}

if ($action == "save_case") {
	$save = $crud->save_case();
	if ($save)
		echo $save;
}

if ($action == "delete_case") {
	$save = $crud->delete_case();
	if ($save)
		echo $save;
}
?>
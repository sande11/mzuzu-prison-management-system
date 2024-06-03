<?php

require_once __DIR__ . '/classes/DB.php';
ob_start();
$action = $_GET['action'];
$connection = DB::getInstance();
include __DIR__ . '/action_class.php';
$crud = new Actions($connection);
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
if ($action == 'is_logged_in') {
	$save = $crud->is_logged_in();
	if ($save)
		echo $save;
}
if ($action == 'get_user_details') {
	$save = $crud->get_user_details();
	if ($save)
		echo $save;
}
if ($action == 'get_employees') {
	$save = $crud->get_employees();
	if ($save)
		echo $save;
}
if ($action == 'get_prisons') {
	$login = $crud->get_prisons();
	if ($login)
		echo $login;
}
if ($action == 'save_prison') {
	$login = $crud->save_prison();
	if ($login)
		echo $login;
}
if ($action == 'get_cells') {
	$login = $crud->get_cells();
	if ($login)
		echo $login;
}
if ($action == 'save_cell') {
	$login = $crud->save_cell();
	if ($login)
		echo $login;
}
if ($action == 'get_crimes') {
	$login = $crud->get_crimes();
	if ($login)
		echo $login;
}
if ($action == 'save_crime') {
	$login = $crud->save_crime();
	if ($login)
		echo $login;
}
if ($action == 'get_actions') {
	$login = $crud->get_actions();
	if ($login)
		echo $login;
}
if ($action == 'save_action') {
	$login = $crud->save_action();
	if ($login)
		echo $login;
}
if ($action == 'get_inmates') {
	$login = $crud->get_inmates();
	if ($login)
		echo $login;
}
if ($action == 'save_inmate') {
	$login = $crud->save_inmate();
	if ($login)
		echo $login;
}
if ($action == 'get_visitors') {
	$login = $crud->get_visitors();
	if ($login)
		echo $login;
}
if ($action == 'save_visitor') {
	$login = $crud->save_visitor();
	if ($login)
		echo $login;
}
?>
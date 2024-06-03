<?php
require_once __DIR__ . '/classes/DB.php';
require_once __DIR__ . '/classes/User.php';
require_once __DIR__ . '/classes/UserTableGateway.php';
require_once __DIR__ . '/classes/function.php';
require_once __DIR__ . '/classes/PrisonTableGateway.php';
require_once __DIR__ . '/classes/CellTableGateway.php';
require_once __DIR__ . '/classes/CrimeTableGateway.php';
require_once __DIR__ . '/classes/ActionTableGateway.php';
require_once __DIR__ . '/classes/VisitorTableGateway.php';
require_once __DIR__ . '/classes/InmateTableGateway.php';

$connection = DB::getInstance();
session_start();
ini_set('display_errors', 1);
class Actions
{
	private $connection;

	public function __construct($connection)
	{
		$this->connection = $connection;
	}
	function __destruct()
	{
		//$this->db->close();
		//ob_end_flush();
	}
	function login()
	{
		$email = $_POST['email'];
		$password = $_POST['password'];

		$connection = DB::getInstance();
		$userTable = new UserTableGateway($connection);
		$user = $userTable->getUserByEmail($email);

		if ($user != null) {
			$fetch_pass = $user->getPassword();
			if (password_verify($password, $fetch_pass)) {

				$status = $user->getCode();

				if ($status == null) {

					$_SESSION['userDetails'] = $user;
					if ($user->getRole() == 1) {
						return 1;
					}
					if ($user->getRole() == 2) {
						return 2;
					}
					if ($user->getRole() == 3) {
						return 3;
					}
					if ($user->getRole() == 4) {
						return 7;
					}
				} else {
					return 4;
				}
			} else {
				return 5;
			}
		} else {
			return 6;
		}
	}
	function logout()
	{
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		return 1;
	}
	function is_logged_in()
	{
		if (!is_logged_in()) {
			return 1;
		}
	}
    function get_user_details(){
		if (isset($_SESSION['userDetails'])) {
			$user = $_SESSION['userDetails'];

			$data = array();
			$data['username'] = $user->getUsername();
			$data['email'] = $user->getEmail();
			$data['role'] = $user->getRole();
			return json_encode($data);
		}
	}
    function get_employees()
	{
		$connection = DB::getInstance();
		$userGateway = new UserTableGateway($connection);
		$employees = $userGateway->getEmployees();
		$data = array();
		foreach ($employees as $employee) {
			$row["id"] = $employee->getId();
			$row["username"] = $employee->getUsername();
			$row["email"] = $employee->getEmail();
			$row["number"] = $employee->getNumber();
			$row["role_int"] = $employee->getRole();
			if ($employee->getRole() == 2) {
				$row["role"] = "Supervisor";
			}
			if ($employee->getRole() == 4) {
				$row["role"] = "Mechanic";
			}
			$data[] = $row;
		}
		return json_encode($data);
	}
    	function get_prisons()
	{
		$connection = DB::getInstance();
		$prisonGateway = new PrisonTableGateway($connection);
		$prisons = $prisonGateway->getPrisons();
		$data = array();
		if($prisons!=null){
            foreach ($prisons as $prison) {
			$row["id"] = $prison->getId();
			$row["prison"] = $prison->getPrison();
			$data[] = $row;
		}
        }
		return json_encode($data);
	}
	function save_prison()
	{
		$name = $_POST['prison'];
		$connection = DB::getInstance();
		$gateway = new PrisonTableGateway($connection);
		$prison = $gateway->getPrisonByName($name);
		$cnt = 1;
		if ($prison != null) {
			return 1;
		} else {
			$prison = new Prison(-1, $name);
			$id = $gateway->insert($prison);
			if ($id) {
				return 2;
			}
		}
	}
    	function get_cells()
	{
		$connection = DB::getInstance();
		$cellGateway = new CellTableGateway($connection);
		$cells = $cellGateway->getCells();
		$data = array();
		if($cells!=null){
            foreach ($cells as $cell) {
                $row["id"] = $cell->getId();
                $row["cell"] = $cell->getCell();
                $prisonGateway = new PrisonTableGateway($connection);
                $prison = $prisonGateway->getPrisonById($cell->getPrisonId());
                $row["prison"] = $prison->getPrison();
                $data[] = $row;
            }
        }
		return json_encode($data);
	}
	function save_cell()
	{
		$name = $_POST['cell'];
        $prison_id = $_POST['prison_id'];
		$connection = DB::getInstance();
		$gateway = new CellTableGateway($connection);
		$cell = $gateway->getCellByNameAndPrisonId($name,$prison_id);
		$cnt = 1;
		if ($cell != null) {
			return 1;
		} else {
			$cell = new Cell(-1, $name, $prison_id);
			$id = $gateway->insert($cell);
			if ($id) {
				return 2;
			}
		}
	}
    	function get_crimes()
	{
		$connection = DB::getInstance();
		$crimeGateway = new CrimeTableGateway($connection);
		$crimes = $crimeGateway->getCrimes();
		$data = array();
		if($crimes!=null){
            foreach ($crimes as $crime) {
			$row["id"] = $crime->getId();
			$row["crime"] = $crime->getCrime();
			$data[] = $row;
		}
        }
		return json_encode($data);
	}
	function save_crime()
	{
		$name = $_POST['crime'];
		$connection = DB::getInstance();
		$gateway = new CrimeTableGateway($connection);
		$crime = $gateway->getCrimeByName($name);
		$cnt = 1;
		if ($crime != null) {
			return 1;
		} else {
			$crime = new Crime(-1, $name);
			$id = $gateway->insert($crime);
			if ($id) {
				return 2;
			}
		}
	}
	 	function get_actions()
	{
		$connection = DB::getInstance();
		$actionGateway = new ActionTableGateway($connection);
		$actions = $actionGateway->getActions();
		$data = array();
		if($actions!=null){
            foreach ($actions as $action) {
			$row["id"] = $action->getId();
			$row["action"] = $action->getAction();
			$data[] = $row;
		}
        }
		return json_encode($data);
	}
	function save_action()
	{
		$name = $_POST['action'];
		$connection = DB::getInstance();
		$gateway = new ActionTableGateway($connection);
		$action = $gateway->getActionByName($name);
		$cnt = 1;
		if ($action != null) {
			return 1;
		} else {
			$action = new Action(-1, $name);
			$id = $gateway->insert($action);
			if ($id) {
				return 2;
			}
		}
	}
		function get_inmates()
	{
		$connection = DB::getInstance();
		$inmateGateway = new InmateTableGateway($connection);
		$inmates = $inmateGateway->getInmates();
		$data = array();
		if($inmates!=null){
            foreach ($inmates as $inmate) {
			$row["id"] = $inmate->getId();
			$row["code"] = $inmate->getCode();
			$row["inmate"] = $inmate->getFirstName(). " " .$inmate->getLastName();
			$data[] = $row;
		}
        }
		return json_encode($data);
	}
	function save_inmate()
	{
		$name = $_POST['inmate'];
		$connection = DB::getInstance();
		$gateway = new ActionTableGateway($connection);
		$action = $gateway->getActionByName($name);
		$cnt = 1;
		if ($action != null) {
			return 1;
		} else {
			$action = new Action(-1, $name);
			$id = $gateway->insert($action);
			if ($id) {
				return 2;
			}
		}
	}
	function get_visitors()
	{
		$connection = DB::getInstance();
		$visitorGateway = new VisitorTableGateway($connection);
		$visitors = $visitorGateway->getVisitors();
		$data = array();
		if($visitors!=null){
			foreach ($visitors as $visitor) {
				$row["id"] = $visitor->getId();
				$row["inmate"]= $visitor->getInmateId();
				// $inmateGateway = new InmateTableGateway($connection);
				// $inmate = $inmateGateway->getInmateById($inmate_id);
				// $row["inmate"] = $inmate->getFirstName(). " " .$inmate->getLastName();
				$row["visitor"] = $visitor->getFullName();
				$row["contact"] = $visitor->getContact();
				$row["relation"] = $visitor->getRelation();
				$row["added_date"] = $visitor->getAddedDate();
				$data[] = $row;
			}
        }
		return json_encode($data);
	}
	function save_visitor()
	{

		$full_name = $_POST['full_name'];
		$contact = $_POST['contact'];
		$relation = $_POST['relation'];
		$inmate_id = $_POST['inmate_id'];
		$added_date = date("Y-m-d H:i:s");
		$connection = DB::getInstance();
		$gateway = new VisitorTableGateway($connection);

		$visitor = new Visitor(-1, $inmate_id, $full_name, $contact, $relation, $added_date);
		$id = $gateway->insert($visitor);
		if ($id) {
			return 2;
		}
	}
}
?>
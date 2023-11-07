<?php 
session_start();
ini_set('display_errors', 1);
class Action{

    private $db;

    public function __construct()
    {
        ob_start();
        include 'config.php';

        $this->db = $mysqli;
    }

    function __destruct()
	{
		$this->db->close();
		ob_end_flush();
	}

    function login()
	{
		extract($_POST);
		$qry = $this->db->query("SELECT * FROM users where username = '" . $username . "' and password = '" . $password . "' ");
		if ($qry->num_rows > 0) {
			$data = $qry->fetch_assoc();
			// if ($data['status'] == 0) {
			// 	return 5;
			// }
			$qry = $this->db->query("SELECT * FROM users where user_id = " . $data['user_id']);
			foreach ($qry->fetch_array() as $key => $value) {
				if ($key != 'password' && !is_numeric($key)) {
					$_SESSION['login_' . $key] = $value;
				}
			}
			// $this->db->query("INSERT INTO `logs`( `type`, `message`, `user_id`, `date_updated`) VALUES ('Auth:Login','User login','" . $_SESSION['login_id'] . "', '" . date('Y-m-d h:i:s') . "')");
			return 1;
		} else {
			return 3;
		}
	}

	function logout()
	{
		session_destroy();
		// $this->db->query("INSERT INTO `logs`( `type`, `message`, `user_id`, `date_updated`) VALUES ('Auth:Logout','User logout','" . $_SESSION['login_id'] . "', '" . date('Y-m-d h:i:s') . "')");
		// foreach ($_SESSION as $key => $value) {
		// 	unset($_SESSION[$key]);
		// }

		header("location:index.php");
	}
	function logout2()
	{
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:../index.php");
	}

	function save_cases()
	{
		extract($_POST);
		$data = " case_desc = '$label' ";
		$data .= ", status = '$status' ";

		if (empty($id)) {
			$save = $this->db->query("INSERT INTO cases set " . $data);

		} else {
			$save = $this->db->query("UPDATE cases set " . $data . " where id=" . $id);
			//$this->db->query("INSERT INTO `logs`( `type`, `message`, `user_id`, `date_updated`) VALUES ('Update','Supplier has been updated: $name','" . $_SESSION['login_id'] . "', '" . date('Y-m-d h:i:s') . "')");
		}
		if ($save)
			return 1;
	}

	function save_case(){
		include "config.php";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$label = $_POST["label"];
			$status = $_POST["status"];
		
			// Insert data into the database
			$sql = "INSERT INTO cases (case_desc, stat) VALUES (?, ?)";
			$stmt = $mysqli->prepare($sql);
			$stmt->bind_param("si", $label, $status);
		
			if ($stmt->execute()) {
				return 1;
			} else {
				echo "Error: " . $stmt->error;
			}
		
			$stmt->close();
		}
	}

	function delete_case()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM cases where id = " . $id);
		//$this->db->query("INSERT INTO `logs`( `type`, `message`, `user_id`, `date_updated`) VALUES ('Delete','Supplier deleted','" . $_SESSION['login_id'] . "', '" . date('Y-m-d h:i:s') . "')");
		if ($delete)
			return 1;
	}
}
?>
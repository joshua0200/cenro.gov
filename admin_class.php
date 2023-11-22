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

	function save_ser()
	{
		include "config.php";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$label = $_POST["label"];
			$details = $_POST["serviceSteps"];
			$id = $_POST["id"]; // Get the id if it exists
		
			if (empty($id)) {
				// No id provided, so we're inserting a new record
				$sql = "INSERT INTO services (serviceLabel, serviceSteps) VALUES (?, ?)";
			} 
			// else {
			// 	// An id is provided, so we're updating an existing record
			// 	$sql = "UPDATE services SET serviceLabel = ?, case_desc = ?, case_details=?, stat = ? WHERE case_id = ?";
			// }
		
			$stmt = $mysqli->prepare($sql);
		
			if (empty($id)) { 
				$stmt->bind_param("ss", $label, $details);
			} else {
				$stmt->bind_param("ssi", $label, $details, $id);
			}
		
			if ($stmt->execute()) {
				echo "Data inserted or updated successfully.";
				
				//header("Location: cases.php");
			} else {
				echo "Error: " . $stmt->error;
			}
		
			$stmt->close();
		}
		
		
	}

	function save_service()
	{
		include "config.php"; // Include your database configuration file

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$label = $_POST["label"];
			$serviceSteps = $_POST["serviceSteps"];
			$id = $_POST["id"];

			// Validate and sanitize input if needed

			// Insert or update the data in the database
			if (empty($id)) {
				$sql = "INSERT INTO services (serviceLabel, serviceSteps) VALUES (?, ?)";
				$stmt = $mysqli->prepare($sql);
				$stmt->bind_param("ss", $label, $serviceSteps);
			} else {
				$sql = "UPDATE services SET serviceLabel = ?, serviceSteps = ? WHERE id = ?";
				$stmt = $mysqli->prepare($sql);
				$stmt->bind_param("ssi", $label, $serviceSteps, $id);
			}

			if ($stmt->execute()) {
				echo "Service data saved successfully.";
			} else {
				echo "Error: " . $stmt->error;
			}

			$stmt->close();
			$mysqli->close();
		}
	}
}
?>
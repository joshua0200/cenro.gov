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


}
?>
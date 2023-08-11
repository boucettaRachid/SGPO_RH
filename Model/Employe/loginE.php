<?php
require '../../setting/db.php';

class UserModel
{
    private $conn;

    public function __construct()
    {
        $db = new db(); // Create an instance of the db class
        $this->conn = $db->conexion(); // Use the conexion() method to establish the database connection
    }


    public function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function getUser($uname, $pass)
    {
        $uname = $this->validate($uname);
        $pass = $this->validate($pass);

        if (empty($uname) || empty($pass)) {
            return false;
        }

        $sql = "SELECT * FROM employer WHERE Username=:uname AND Password=:pass";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(':uname' => $uname, ':pass' => $pass));

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
}
?>

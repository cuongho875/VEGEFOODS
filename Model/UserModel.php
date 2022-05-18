<?php

class UserModel extends Database{
	protected $db;

	public function __construct()
	{
		$this->db = new Database();
		$this->db->connect();
	}

	public function register($email, $password, $ho,$ten,$sdt)
	{	
		$sql = "INSERT INTO user (user_group_id, email, password,ho,ten,sdt)
							VALUES ('2', '$email', '$password','$ho','$ten','$sdt')";
		$this->db->conn->query($sql);
	}

	public function checkExists($email) {
		$sql = "SELECT * FROM user WHERE email = '$email'";
		$result = $this->db->conn->query($sql);
		
		return $result;
	}
    public function login($email, $password){
        $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
		$result = $this->db->conn->query($sql);
		
		return $result;
    }
	public function getUser($email)
	{
		$sql = "SELECT * FROM user WHERE email='$email'";
		$result = $this->db->conn->query($sql);
		$data = $result->fetch_array() ;

		return $data;
	}
	public function getAllUser()
	{
		$sql = "SELECT * FROM user WHERE user_group_id=2";
		$result = $this->db->conn->query($sql);

		return $result;
	}
	public function DeleteUser($id){
		$sql = "DELETE FROM user
		WHERE user_id = $id";
		$this->db->conn->query($sql);
	}
	public function getSoDiaChi($user_id){
		$sql = "SELECT * FROM sodiachi WHERE user_id='$user_id'";
		$result = $this->db->conn->query($sql);
		return $result;
	}
	public function getDiaChi($id){
		$sql = "SELECT * FROM sodiachi WHERE diachi_id='$id'";
		$result = $this->db->conn->query($sql);
		return $result;
	}
	public function getDiaChiMacDinh($user_id){
		$sql = "SELECT * FROM sodiachi WHERE user_id='$user_id' AND macdinh= '1'";
		$result = $this->db->conn->query($sql);
		return $result;
	}
	public function addDiachi($user_id,$hoten,$sdt,$diachi){
		$sql = "INSERT INTO sodiachi(
			user_id,
			hoten,
			sdt,
			diachi
		) VALUES (
			'$user_id'
			,'$hoten',
			'$sdt',
			'$diachi'
		)";
		$this->db->conn->query($sql);
	}
	public function ChangePW($email,$password){
		$password = md5(md5($password));
		$sql = "UPDATE user
				SET password ='$password'
				WHERE email='$email'";
		return $this->db->conn->query($sql);
	}
	public function checkPass($email,$password) {
		$password = md5(md5($password));
		$sql = "SELECT * FROM user WHERE password = '$password' AND email = '$email'";
		$result = $this->db->conn->query($sql);
		return $result;
	}
	public function EditDiachi($id,$hoten,$sdt,$diachi){
		$sql = "UPDATE sodiachi SET
		hoten = '$hoten',
		sdt = '$sdt',
		diachi = '$diachi' ,
		WHERE diachi_id = '$id'";
		$this->db->conn->query($sql);
	}
	public function EdiMacDinh($id,$macdinh){
		$sql = "UPDATE sodiachi SET
		macdinh = '$macdinh'
		WHERE diachi_id = '$id'";
		$this->db->conn->query($sql);
	}
	public function DeleteDiachi($id){
		$sql = "DELETE FROM sodiachi WHERE diachi_id='$id'";
		$this->db->conn->query($sql);
	}
}
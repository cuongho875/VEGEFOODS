<?php

class CategoryModel extends Database{
	protected $db;

	public function __construct()
	{
		$this->db = new Database();
		$this->db->connect();
	}

	public function addCategory($name)
	{	
		$this->db->conn->real_escape_string($name);
		$sql = "INSERT INTO loaisanpham (tenloaisanpham)
							VALUES ('$name')";
		$this->db->conn->query($sql);
	}
    public function checkExists($name) {
		$sql = "SELECT * FROM loaisanpham WHERE tenloaisanpham = '$name'";
		$result = $this->db->conn->query($sql);
		return $result;
	}
	public function categoryList()
	{
		$sql = "SELECT * FROM loaisanpham";
		$result = $this->db->conn->query($sql);
		$list = array();
		while($data = $result->fetch_array()) {
			$list[] = $data;
		}

		return $list;
	}
	public function getCategory($loaisanpham_id)
	{
		$sql = "SELECT * FROM loaisanpham WHERE loaisanpham_id = $loaisanpham_id";
		$result = $this->db->conn->query($sql);
		$data = $result->fetch_array();

		return $data;
	}
	public function editCategory($loaisanpham_id,$name)
	{
		$sql = "UPDATE loaisanpham SET tenloaisanpham = '$name' WHERE loaisanpham_id = $loaisanpham_id";
		
		return $this->db->conn->query($sql);
	}
	public function delCategory($loaisanpham_id)
	{
		$sql = "DELETE FROM loaisanpham WHERE loaisanpham_id= $loaisanpham_id";
		
		return $this->db->conn->query($sql);
	}
}
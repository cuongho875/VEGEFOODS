<?php

class ProductModel extends Database{
	protected $db;

	public function __construct()
	{
		$this->db = new Database();
		$this->db->connect();
	}

	public function addProduct($name_product, $category_id, $gia, $weigth, $quantity, $image,$describe,$note,$nhacungcap,$date)
	{
		$name_product = $this->db->conn->real_escape_string($name_product);
		$category_id = $this->db->conn->real_escape_string($category_id);
		$gia = $this->db->conn->real_escape_string($gia);
		$weigth = $this->db->conn->real_escape_string($weigth);
		$quantity = $this->db->conn->real_escape_string($quantity);
		$image = $this->db->conn->real_escape_string($image);
		$describe = $this->db->conn->real_escape_string($describe);
		$note = $this->db->conn->real_escape_string($note);
		$nhacungcap = $this->db->conn->real_escape_string($nhacungcap);
		$sql = "INSERT INTO sanpham (name, loaisanpham_id, gia, weigth, soluong, image,mota,ghichu,nhacungcap,ngaythem)
							VALUES ('$name_product',  '$category_id', '$gia', '$weigth', '$quantity', '$image','$describe','$note','$nhacungcap','$date')";
		
		return $this->db->conn->query($sql);
	}
	public function editProduct($id,$name_product, $category_id, $gia, $weigth, $quantity, $image,$describe,$note,$nhacungcap,$date)
	{
		$name_product = $this->db->conn->real_escape_string($name_product);
		$category_id = $this->db->conn->real_escape_string($category_id);
		$gia = $this->db->conn->real_escape_string($gia);
		$weigth = $this->db->conn->real_escape_string($weigth);
		$quantity = $this->db->conn->real_escape_string($quantity);
		$image = $this->db->conn->real_escape_string($image);
		$describe = $this->db->conn->real_escape_string($describe);
		$note = $this->db->conn->real_escape_string($note);
		$nhacungcap = $this->db->conn->real_escape_string($nhacungcap);
		$sql = "UPDATE sanpham SET image = '$image'
							, name = '$name_product'
							, gia = '$gia', 
							loaisanpham_id = '$category_id',
							mota = '$describe', 
							ghichu = '$note', 
							weigth = '$weigth',
							soluong = '$quantity', 
							nhacungcap = '$nhacungcap', 
							ngaythem = '$date'
							 WHERE sanpham_id = $id
								 ";

		return $this->db->conn->query($sql);
	}
	public function getList()
	{
		$sql = "SELECT * FROM sanpham";
		$result = $this->db->conn->query($sql);
		$list = array();
		while ($data = $result->fetch_array()) {
			$list[] = $data;
		}

		return $list;
	}
	
}
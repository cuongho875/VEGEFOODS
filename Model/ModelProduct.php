<?php
class ModelProduct extends Database{
	protected $db;
	public function __construct()
	{
		$this->db = new Database();
		$this->db->connect();
	}
    public function getAllProduct(){
        $sql = "SELECT * FROM sanpham";
		$result = $this->db->conn->query($sql);
        return $result;
    }
    public function setQuantity($sanpham_id,$quantity){
        $sql = "UPDATE sanpham
        SET soluong = '$quantity'
        WHERE sanpham_id = '$sanpham_id'";
		$this->db->conn->query($sql);

    }
    public function getProductByCategory($loaisanpham_id){
        if($loaisanpham_id=='0'){
            $sql = "SELECT * FROM sanpham ";
        }
        else {
            $sql = "SELECT * FROM sanpham WHERE loaisanpham_id = '$loaisanpham_id'";
        }
		$result = $this->db->conn->query($sql);
        return $result;
    }
    public function getCategory($loaisanpham_id){
        $sql = "SELECT tenloaisanpham FROM loaisanpham WHERE loaisanpham_id = '$loaisanpham_id'";
		$result = $this->db->conn->query($sql);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        return $row;
    }
    public function getProductByID($id){
        $sql = "SELECT * FROM sanpham WHERE sanpham_id = '$id'";
		$result = $this->db->conn->query($sql);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        return $row;
    }
    public function NewProduct($loaisanpham_id){
        if($loaisanpham_id=='0'){
            $sql = "SELECT * FROM sanpham  ORDER BY ngaythem DESC";
        }
        else{
            $sql ="SELECT * FROM sanpham WHERE loaisanpham_id = '$loaisanpham_id' ORDER BY ngaythem DESC";

        }
        $result = $this->db->conn->query($sql);
        return $result;
    }
    public function SortAZ($loaisanpham_id){
        if($loaisanpham_id=='0'){
            $sql = "SELECT * FROM sanpham  ORDER BY name ASC";
        }
        else {
            $sql ="SELECT * FROM sanpham WHERE loaisanpham_id = '$loaisanpham_id' ORDER BY name ASC";

        }
        $result = $this->db->conn->query($sql);
        return $result;
    }
    public function SortZA($loaisanpham_id){
        if($loaisanpham_id=='0'){
            $sql = "SELECT * FROM sanpham  ORDER BY name DESC";
        }
        else {
            $sql ="SELECT * FROM sanpham WHERE loaisanpham_id = '$loaisanpham_id' ORDER BY name DESC";
        }
        $result = $this->db->conn->query($sql);
        return $result;
    }
    public function SortUp($loaisanpham_id){
        if($loaisanpham_id=='0'){
            $sql = "SELECT * FROM sanpham  ORDER BY gia ASC";
        }
        else {
            $sql ="SELECT * FROM sanpham WHERE loaisanpham_id = '$loaisanpham_id' ORDER BY gia ASC";

        }
        $result = $this->db->conn->query($sql);
        return $result;
    }
    public function SortDown($loaisanpham_id){
        if($loaisanpham_id=='0'){
            $sql = "SELECT * FROM sanpham  ORDER BY gia DESC";
        }
        else {
            $sql ="SELECT * FROM sanpham WHERE loaisanpham_id = '$loaisanpham_id' ORDER BY gia DESC";


        }
        $result = $this->db->conn->query($sql);
        return $result;
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
    public function deleteProduct($id)
	{
		$sql = "DELETE FROM sanpham WHERE sanpham_id = $id";
		
		return $this->db->conn->query($sql);
	}
    public function getPrice($id){
        $sql="SELECT gia FROM sanpham WHERE sanpham_id='$id'";
        return $this->db->conn->query($sql)->fetch_array();
    }
};
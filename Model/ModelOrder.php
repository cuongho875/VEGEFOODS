<?php

    class ModelOrder extends Database {
	 protected $db;
        public function __construct()
        {
            $this->db = new Database();
            $this->db->connect();
        }
        public function getOrder($user_id){
            $sql = "SELECT * FROM orders WHERE user_id='$user_id'";
            $result = $this->db->conn->query($sql);
            return $result;
        }
        public function getAllOrder(){
            $sql = "SELECT * FROM orders ORDER BY order_id DESC";
            $result = $this->db->conn->query($sql);
            return $result;
        }
        public function getOrderNew(){
            $sql = " SELECT * FROM orders ORDER BY ngaydat DESC LIMIT 10";
            return $this->db->conn->query($sql);   
        }
        public function EditOrder($id,$thanhtoan,$trangthai){
            $sql = "UPDATE orders SET
            thanhtoan='$thanhtoan',
            trangthai='$trangthai'
            WHERE order_id='$id'
            ";
            return $this->db->conn->query($sql);
        }
        public function CancelOrder($id){
            $sql = "UPDATE orders SET
            trangthai='Đã hủy'
            WHERE order_id='$id'
            ";
            $this->db->conn->query($sql);
        }
        public function addOrder($user_id, $hoten, $sdt	, $diachi, $ghichu, $email,$thanhtoan,$trangthai,$total,$ngaydat)
        {
            $user_id = $this->db->conn->real_escape_string($user_id);
            $hoten = $this->db->conn->real_escape_string($hoten);
            $sdt = $this->db->conn->real_escape_string($sdt);
            $diachi = $this->db->conn->real_escape_string($diachi);
            $diachi = $this->db->conn->real_escape_string($diachi);
            $ghichu = $this->db->conn->real_escape_string($ghichu);
            $email = $this->db->conn->real_escape_string($email);
            $thanhtoan = $this->db->conn->real_escape_string($thanhtoan);
            $trangthai = $this->db->conn->real_escape_string($trangthai);
            $total = $this->db->conn->real_escape_string($total);
            $ngaydat = $this->db->conn->real_escape_string($ngaydat);
            $sql = "INSERT INTO orders (user_id, hoten, sdt, diachi, ghichu,email,thanhtoan,trangthai,total,ngaydat)
                                VALUES ('$user_id','$hoten','$sdt', '$diachi', '$ghichu', '$email','$thanhtoan','$trangthai','$total','$ngaydat')";

            return $this->db->conn->query($sql);
        }
        public function addDetalOrder($order_id,$sanpham_id,$soluong,$gia){
            $sql = "INSERT INTO detail_order (order_id, sanpham_id, soluong,gia)
            VALUES ('$order_id','$sanpham_id','$soluong', '$gia')";
            return $this->db->conn->query($sql);
        }
        public function getOrder_id_Max(){
            $sql1= "SELECT MAX(order_id) FROM orders";
            $result = $this->db->conn->query($sql1);
            return $result->fetch_array();
        }
     }
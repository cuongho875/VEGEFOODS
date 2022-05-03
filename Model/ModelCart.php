<?php

    class ModelCart extends Database {
	 protected $db;
        public function __construct()
        {
            $this->db = new Database();
            $this->db->connect();

        }
        public function AddToCart($id){
            $sql="SELECT * FROM sanpham 
            WHERE sanpham_id='$id'"; 
        $query_s=$this->db->conn->query($sql); 
        if(mysqli_num_rows($query_s)!=0){ 
            $row_s=mysqli_fetch_array($query_s); 
            $_SESSION['cart'][$row_s['sanpham_id']]=array( 
                    "sanpham_id"=> $id,
                    "image" => $row_s['image'],
                    "name" => $row_s['name'],
                    "quantity" => $_POST['quantity'], 
                    "gia" => $row_s['gia'] 
            );
        }
    }
}
?>
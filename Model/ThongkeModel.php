<?php
    class ThongkeModel extends Database{
        protected $db;
        public function __construct()
        {
            $this->db= new Database();
            $this->db->connect();
        }
        public function TkDoanhThu($month){
            $sql = "SELECT ngaydat,sum(total) as total FROM orders WHERE thanhtoan='Đã thanh toán' AND MONTH(ngaydat) ='$month' GROUP BY DAY(ngaydat)";
            return $this->db->conn->query($sql);
        }
        public function TkTinhTrangDonHang(){
            $sql = "SELECT COUNT(trangthai) as soluong,trangthai FROM orders GROUP BY trangthai";
            return $this->db->conn->query($sql);
        }
        public function SanPhamBanChay(){
            $sql = "SELECT SUM(soluong) as luotmua,sanpham_id  FROM detail_order GROUP BY sanpham_id";
            return $this->db->conn->query($sql);
        }
    }
?>
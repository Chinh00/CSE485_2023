<?php
class BaiViet{
    // Thuộc tính

    private $ma_bviet;
    private $tieude;
    private $ten_bhat;
    private $ma_tloai;
    private $tomtat;
    private $noidung;
    private $ma_tgia;
    private $ngayviet;
    private $hinhanh;

    // public function __construct($ma_bviet, $tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh)
    // {
    //     $this->ma_bviet = $ma_bviet;
    //     $this->tieude = $tieude;
    //     $this->ten_bhat = $ten_bhat;
    //     $this->ma_tloai = $ma_tloai;
    //     $this->tomtat = $tomtat;
    //     $this->noidung = $noidung;
    //     $this->ma_tgia = $ngayviet;
    //     $this->hinhanh = $hinhanh;
    // }
    

    public function __construct()
    {
        $this->ma_bviet = "SDFDS";
    }
        public function get_ma_bviet() {
            return $this->ma_bviet;
        }
        public function get_tieude() {
            return $this->tieude;
        }
        public function get_ten_bhat() {
            return $this->ten_bhat;
        }
        public function get_ma_tloai() {
            return $this->ma_tloai;
        }
        public function get_tomtat() {
            return $this->tomtat;
        }
        public function get_noidung() {
            return $this->noidung;
        }
        public function get_ma_tgia() {
            return $this->ma_tgia;
        }
        public function get_ngayviet() {
            return $this->ngayviet;
        }
        public function get_hinhanh() {
            return $this->hinhanh;
        }


}

?>
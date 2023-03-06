<?php


class TheLoai {
    private $ma_tloai;
    private $ten_tloai;
    private $SLBaiViet;


    public function __construct($ma_tloai, $ten_tloai)
    {
        $this->ma_tloai = $ma_tloai;
        $this->ten_tloai = $ten_tloai;
    }
    public function get_ma_tloai() {
        return $this->ma_tloai;
    }
    public function get_ten_tloai() {
        return $this->ten_tloai;
    }
    public function get_SLBaiViet() {
        return $this->SLBaiViet;
    }

    
}

?>
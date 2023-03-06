<?php
    class Tacgia {
        private $ma_tgia;
        private $ten_tgia;
        private $hinh_tgia;

        public function __construct($ma_tgia, $ten_tgia, $hinh_tgia)
        {
            $this->ma_tgia = $ma_tgia;
            $this->ten_tgia = $ten_tgia;
            $this->hinh_tgia = $hinh_tgia;
        }


        public function get_ma_tgia() {
            return $this->ma_tgia;
        }
        public function get_ten_tgia() {
            return $this->ten_tgia;
        }
        public function get_hinh_tgia() {
            return $this->hinh_tgia;
        }
    }


?>

<?php
class produk{
  public $namaBarang, 
         $bahan;
         protected $diskon; 
         private $harga;

  public function getCetak(){
    return "$this->namaBarang, $this->bahan  (Rp $this->harga)";
  }
  public function __construct($namaBarang="nama barang", $bahan="bahan", $harga=0, $ukuranBelt="ukuran belt", $sizeCelana="size celana"){
    $this->namaBarang = $namaBarang;
    $this->bahan=$bahan;
    $this->harga=$harga;
    $this->ukuranBelt=$ukuranBelt;
    $this->sizeCelana=$sizeCelana;
  }

    public function cetakInfo(){
        $str="{$this->namaBarang}, {$this->getCetak()}";
        return $str;
    }
    
    public function getHarga(){
        return $this->harga - ($this->harga * $this->diskon / 100);
    }
}

class Celana extends produk{
    public $sizeCelana;
    public function __construct($namaBarang, $bahan, $harga, $sizeCelana){
        parent::__construct($namaBarang, $bahan, $harga);
        $this->sizeCelana=$sizeCelana;
    }
    public function cetakInfo(){
        $str="Celana: ".parent::getCetak()." | Size Celana: {$this->sizeCelana}";
        return $str;
    }
    public function setDiskon($diskon){
        $this->diskon=$diskon;          
    }
}

class Sabuk extends produk{
    public $ukuranBelt;
    public function __construct($namaBarang, $bahan, $harga, $ukuranBelt){
        parent::__construct($namaBarang, $bahan, $harga);
        $this->ukuranBelt=$ukuranBelt;
    }
    public function cetakInfo(){
        $str="Aksesoris:  ".parent::getCetak()." | Ukuran Belt: {$this->ukuranBelt}";
        return $str;
    }
}

$produk1 = new Celana("Kulot","Scuba",80000,"XL");
$produk2 = new Sabuk("Head Belt","Stainless Steel",23000,"32 inch");


echo $produk1->cetakInfo();
echo "<br>";
echo $produk2->cetakInfo();
echo "<br>";
echo "<hr>";
echo "Harga Setelah Diskon: ";
$produk1->setDiskon(50);
echo $produk1->getHarga();
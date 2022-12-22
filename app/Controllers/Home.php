<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\DiskonModel;
use CodeIgniter\I18n\Time;

class Home extends BaseController
{
    private $diskonModel;
    private $todayDate;
    private $barangModel;

    public function __construct()
    {
        helper("form");
        $this->diskonModel = new DiskonModel();
        $this->todayDate = Time::today()->toDateString();
        $this->barangModel = new BarangModel();
    }

    public function index()
    {
        $sendDiscountToHome = $this->diskonModel
            ->select('*')
            ->where('aktif', 1)
            ->where('tanggal_akhir_berlaku >', $this->todayDate)
            ->findAll();
        $barangImages = $this->barangModel
            ->select("*")
            ->orderBy("gambar", "ASC");
        return view('/pages/home', [
            "promos" => $sendDiscountToHome,
            "barang_images" => $barangImages,
        ]);
    }

    public function contact()
    {
        return view('/pages/contact');
    }
}

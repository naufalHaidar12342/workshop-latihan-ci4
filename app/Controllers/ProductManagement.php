<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;
use CodeIgniter\I18n\Time;



class ProductManagement extends BaseController
{
    private $barangModel;
    private $kategoriModel;
    private $productCreatedAt;
    private $productUpdatedAt;
    public function __construct()
    {
        helper("form");
        $this->barangModel = new BarangModel();
        $this->kategoriModel = new KategoriModel();
        $this->productCreatedAt = Time::now()->toDateTimeString();
        $this->productUpdatedAt = Time::now()->toDateTimeString();
    }


    public function index()
    {
        $produk = $this->barangModel
            ->select("barang.*, kategori.nama AS kategori")
            ->join('kategori', 'barang.id_kategori=kategori.id')
            ->findAll();
        return view("/pages/product-management/product", [
            "daftarProduk" => $produk
        ]);
    }

    public function tambahProduct()
    {
        $kategori = $this->kategoriModel->findAll();
        return view("/pages/product-management/tambah-product", [
            "kategoriProduk" => $kategori
        ]);
    }

    public function simpanProduk()
    {

        $flashNamaProduk = $this->request->getPost("nama-produk");
        $this->barangModel->save([
            "nama" => $this->request->getPost("nama-produk"),
            "harga" => $this->request->getPost("harga-produk"),
            "stok" => $this->request->getPost("stok-produk"),
            "gambar" => $this->request->getPost("gambar-produk"),
            "id_kategori" => $this->request->getPost("kategori"),
            "created_by" => 1,
            "updated_by" => 1,
        ]);
        session()->setFlashdata("pesan", "Data untuk produk {$flashNamaProduk} berhasil dimasukkan!");
        return redirect()->to("product-management");
    }

    public function editProduct()
    {
        $id = $this->request->uri->getSegment(3);
        $kategori = $this->kategoriModel->findAll();
        $barang = $this->barangModel->find($id);
        // dd($barang);

        return view("/pages/product-management/edit-product", [
            "editedProduk" => $barang,
            "kategoriProduk" => $kategori,
        ]);
    }

    public function hapusProduct()
    {
        # code...
    }
}

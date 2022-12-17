<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;
use App\Models\KomentarModel;
use App\Libraries\Bantuan;

class Shop extends BaseController
{
    private $url = "https://api.rajaongkir.com/starter/";
    private $apiKey = "895722d9e59d91aee2a393659d779c59";
    private $kategoriModel;
    private $barangModel;
    private $komentarModel;
    private $bantuanLibrary;

    public function __construct()
    {
        helper('form');
        $this->barangModel = new BarangModel();
        $this->komentarModel = new KomentarModel();
        $this->bantuanLibrary = new Bantuan();
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $barang = $this->barangModel
            ->select('barang.*, kategori.nama AS kategori')
            ->join('kategori', 'barang.id_kategori=kategori.id')
            ->findAll();
        $kategoriHome = $this->kategoriModel->findAll();
        return view(
            '/pages/shops/index',
            [
                'barangs' => $barang,
                'kategoris' => $kategoriHome,
            ]
        );
    }

    public function category()
    {
        $id = $this->request->uri->getSegment(3);


        $barang = $this->barangModel
            ->select('barang.*, kategori.nama AS kategori')
            ->where('id_kategori', $id)
            ->join('kategori', 'barang.id_kategori=kategori.id')
            ->where('id_kategori', $id)
            ->findAll();
        $kategori = $this->kategoriModel->findAll();
        return view(
            '/pages/shops/index',
            [
                'barangs' => $barang,
                'kategoris' => $kategori,
            ]
        );
    }

    public function product()
    {
        $id = $this->request->uri->getSegment(3);

        $barang = $this->barangModel->find($id);
        $kategoriProduct = $this->kategoriModel->findAll();
        $komentar = $this->komentarModel
            ->select('komentar.*, pengguna.username')
            ->where('id_barang', $id)
            ->join('pengguna', 'komentar.id_pengguna=pengguna.id')
            ->findAll();

        $provinsi = $this->bantuanLibrary
            ->rajaOngkirAPI(
                $this->url . "province",
                $this->apiKey,
                method: "GET"
            );

        return view(
            '/pages/shops/product',
            [

                'barang' => $barang,
                'kategoris' => $kategoriProduct,
                'komentars' => $komentar,
                'provinsi' => json_decode($provinsi)->rajaongkir->results,
            ]
        );
    }

    public function getCity()
    {
        if ($this->request->isAJAX()) {
            $id_province = $this->request->getGet('id_province');
            $send = [
                'province' => $id_province
            ];
            $data = $this->bantuanLibrary
                ->rajaOngkirAPI(
                    $this->url . "city?province=" . $id_province,
                    $this->apiKey,
                    method: "GET"
                );
            return $this->response->setJSON($data);
        }
    }

    public function getCost()
    {
        if ($this->request->isAJAX()) {
            $origin = $this->request->getGet('origin');
            $destination = $this->request->getGet('destination');
            $weight = $this->request->getGet('weight');
            $courier = $this->request->getGet('courier');
            $send = [
                'origin' => $origin,
                'destination' => $destination,
                'weight' => $weight,
                'courier' => $courier,
            ];
            $data = $this->bantuanLibrary
                ->rajaOngkirAPI(
                    $this->url . "cost",
                    $this->apiKey,
                    $send,
                    "POST"
                );
            return $this->response->setJSON($data);
        }
    }
}

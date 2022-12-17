<?php

namespace App\Controllers;

use App\Libraries\InvoiceToPDF;
use App\Models\BarangModel;
use App\Models\PenggunaModel;
use App\Models\TransaksiModel;

class Transaksi extends BaseController
{
    private $validation;
    private $transaksi;
    private $barang;
    private $pembeli;
    private $pdf;
    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->transaksi = new TransaksiModel();
        $this->barang = new BarangModel();
        $this->pembeli = new PenggunaModel();
        $this->pdf = new InvoiceToPDF();
    }

    public function index()
    {
        $id = session('id');
        $transaksi = $this->transaksi
            ->where('id_pembeli', $id)
            ->findAll();
        return view(
            'transaksi/index',
            [
                'transaksis' => $transaksi,
            ]
        );
    }

    public function buy()
    {
        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'transaksi');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $transaksi = new \App\Entities\Transaksi();

                $id_barang = $this->request->getPost('id_barang');
                $jumlah_pembelian = $this->request->getPost('jumlah');

                $barang = $this->barang->find($id_barang);
                $entityBarang = new \App\Entities\Barang();

                $entityBarang->id = $id_barang;

                $entityBarang->stok = $barang->stok - $jumlah_pembelian;
                $this->barang->save($entityBarang);

                $transaksi->fill($data);
                $transaksi->status = 0;
                $transaksi->created_by = session('id');
                $transaksi->created_date = date("Y-m-d H:i:s");

                $this->transaksi->save($transaksi);

                $id = $this->transaksi->insertID();

                return redirect()->to('transaction');
            }
        }
    }

    public function invoice()
    {
        $id = $this->request->uri->getSegment(2);
        $transaksi = $this->transaksi->find($id);

        $userModel = new \App\Models\PenggunaModel();
        $pembeli = $userModel->find($transaksi->id_pembeli);

        $barang = $this->barang->find($transaksi->id_barang);
        $data = [
            'transaksi' => $transaksi,
            'pembeli' => $pembeli,
            'barang' => $barang,
        ];

        $filename = date('y-m-d-H-i-s') . '-invoice';
        $this->pdf->generate('transaksi/invoice', $data, $filename);
    }
}

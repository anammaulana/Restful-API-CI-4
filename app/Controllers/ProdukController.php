<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Controllers\ResfulController;

class ProdukController extends ResfulController
{
    //todo Membuat fungsi create produk
    public function create()
    {
        $data = [
            'kode_produk' => $this->request->getVar('kode_produk'),
            'nama_produk' => $this->request->getVar('nama_produk'),
            'harga' => $this->request->getVar('harga')
        ];
        $model = new ProdukModel();
        $model->insert($data);
        $produk = $model->find($model->getInsertID());
        return $this->responseHasil(200, true, $produk);
    }
    //todo Membuat fungsi list produk
    public function list()
    {
        $model = new ProdukModel();
        $produk = $model->findAll();
        return $this->responseHasil(200, true, $produk);
    }

    //todo Membuat fungsi tampil produk
    public function detail($id)
    {
        $model = new ProdukModel();
        $produk = $model->find($id);
        return $this->responseHasil(200, true, $produk);
    }
    //todo Membuat fungsi update produk
    public function ubah($id)
    {
        $data = [
            'kode_produk' => $this->request->getVar('kode_produk'),
            'nama_produk' => $this->request->getVar('nama_produk'),
            'harga' => $this->request->getVar('harga')
        ];
        $model = new ProdukModel();
        $model->update($id, $data);
        $produk = $model->find($id);
        return $this->responseHasil(200, true, $produk);
    }

    //todo Membuat fungsi delete produk
    public function hapus($id)
    {
        $model = new ProdukModel();
        $produk = $model->delete($id);
        return $this->responseHasil(200, true, $produk);
    }
}

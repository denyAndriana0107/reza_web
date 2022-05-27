<?php

namespace App\Controllers;

class Sumur extends BaseController
{
    protected $sumurModel;
    public function __construct()
    {
        $this->sumurModel = new \App\Models\SumurModel();
    }
    public function index()
    {
        $currentPage = $this->request->getVar('page_sumur') ? $this->request->getVar('page_sumur') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $sumur = $this->sumurModel->search($keyword);
        } else {
            $sumur = $this->sumurModel;
        }

        $data = [
            'title' => "sumur",
            'sumur' => $sumur->paginate(3, 'sumur'),
            'pager' => $this->sumurModel->pager,
            'currentPage' => $currentPage
        ];

        return view('sumur/index', $data);
    }
    public function map_api($data)
    {
        $result=$this->get_CURL('https://api.mapbox.com/geocoding/v5/mapbox.places/'.$data.'.json?access_token=pk.eyJ1IjoiYW5kcmlhbmEwMTA3IiwiYSI6ImNsM2tpcTJmZTAweWMzY2xhbXFoNndneTkifQ.hYMFttoAsM5Aa-14gWxLKA');
		$data = array('result'=>$result['features']);
        return view('sumur/create',$data);
    }
    public function chart()
    {
        $data = [
            'title' => "Dashboard",
            'sumur' => $this->sumurModel->findAll()
        ];
        echo view('sumur/chart', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data sumur',
            'validation' => \Config\Services::validation()
        ];

        return view('sumur/create', $data);
    }

    public function save()
    {
        // validasi input
        if (!$this->validate([
            'nama_perusahaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    // 'is_unique' => '{field} kota sudah terdaftar '
                ]
            ],
            'alamat_perusahaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    // 'is_unique' => '{field} kota sudah terdaftar '
                ]
            ],
            'lokasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    // 'is_unique' => '{field} kota sudah terdaftar '
                ]
            ],
            'koordinat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    // 'is_unique' => '{field} kota sudah terdaftar '
                ]
            ],
            'sampul' => [
                'rules' => 'uploaded[sampul]|max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih Gambar sampul terlebih dahulu',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                    // 'is_unique' => '{field} kota sudah terdaftar '
                ]
            ],

        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/sumur/create' . $this->request->getVar('id'))->withInput()->with('validation', $validation);
            // $validation = \Config\Services::validation();
            return redirect()->to('/sumur/create' . $this->request->getVar('id'))->withInput();
        }
        // ambil foto
        $fileFoto = $this->request->getFile('sampul');
        // apakah tidak ada file yang diupload
        if ($fileFoto->getError() == 4) {
            $namaFoto = 'default.jpg';
        } else {
            // ambil nama file
            $namaFoto = $fileFoto->getRandomName();
            // pi ndahkan file ke folder img
            $fileFoto->move('image', $namaFoto);
            // dd($namaFoto);
        }


        $this->sumurModel->save([
            'nama_perusahaan' => $this->request->getVar('nama_perusahaan'),
            'alamat_perusahaan' => $this->request->getVar('alamat_perusahaan'),
            'lokasi' => $this->request->getVar('lokasi'),
            'koordinat' => $this->request->getVar('koordinat'),
            'nomor_registrasi' => $this->request->getVar('nomor_registrasi'),
            'kegunaan_air' => $this->request->getVar('kegunaan_air'),
            'jumlah_max' => $this->request->getVar('jumlah_max'),
            'kedalaman_bor' => $this->request->getVar('kedalaman_bor'),
            'kedalaman_aquifer' => $this->request->getVar('kedalaman_aquifer'),
            'kedalaman_pompa' => $this->request->getVar('kedalaman_pompa'),
            'foto' => $namaFoto
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');

        return redirect()->to('/sumur');
    }

    public function delete($id)
    {
        // cari gambar berdasarkan id
        $sumur = $this->sumurModel->find($id);

        // cek jika file gambarnya default.png
        if ($sumur['foto'] != null) {
            //hapus gambar
            unlink('image/' . $sumur['foto']);
            $this->sumurModel->delete($id);
            session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
            return redirect()->to('/sumur');
        } else {
            $this->sumurModel->delete($id);
            session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
            return redirect()->to('/sumur');
        }

        // $this->sumurModel->delete($id);
        // session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        // return redirect()->to('/sumur');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Ubah Data sumur',
            'sumur' => $this->sumurModel->getSumur($id),
            'validation' => \Config\Services::validation()
        ];

        return view('sumur/edit', $data);
    }

    public function update($id)
    {
        // $dataLama = $this->sumurModel->getsumur($this->request->getVar('id'));
        // dd($dataLama['kota']);
        // if ($dataLama['kota'] == $this->request->getVar('kota')) {
        //     $rules = 'required';
        // } else {
        //     $rules = 'required|is_unique[sumur.kota]';
        // }
        if (!$this->validate([
            'nama_perusahaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} nama_perusahaan harus diisi.',
                    // 'is_unique' => '{field} kota sudah terdaftar '
                ]
            ],
            'sampul' => [
                'rules' => 'uploaded[sampul]|max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih Gambar sampul terlebih dahulu',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                    // 'is_unique' => '{field} kota sudah terdaftar '
                ]
            ],
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/sumur/edit/' . $this->request->getVar('id'))->withInput()->with('validation', $validation);
            return redirect()->to('/sumur/edit/' . $this->request->getVar('id'))->withInput();
        }

        $fileFoto = $this->request->getFile('sampul');
        $sumur = $this->sumurModel->find($id);

        // cek gambar, apakah tetap gambar lama
        if ($fileFoto->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else if ($sumur['foto'] != null) {
            $namaSampul = $fileFoto->getRandomName();

            $fileFoto->move('image', $namaSampul);

            // hapus file lama
            unlink('image/' . $this->request->getVar('sampulLama'));
            $this->sumurModel->save([
                'id' => $id,
                'nama_perusahaan' => $this->request->getVar('nama_perusahaan'),
                'alamat_perusahaan' => $this->request->getVar('alamat_perusahaan'),
                'lokasi' => $this->request->getVar('lokasi'),
                'koordinat' => $this->request->getVar('koordinat'),
                'nomor_registrasi' => $this->request->getVar('nomor_registrasi'),
                'kegunaan_air' => $this->request->getVar('kegunaan_air'),
                'jumlah_max' => $this->request->getVar('jumlah_max'),
                'kedalaman_bor' => $this->request->getVar('kedalaman_bor'),
                'kedalaman_aquifer' => $this->request->getVar('kedalaman_aquifer'),
                'kedalaman_pompa' => $this->request->getVar('kedalaman_pompa'),
                'foto' => $namaSampul
            ]);
        } else {
            $namaSampul = $this->request->getVar('sampulLama');
            $this->sumurModel->save([
                'id' => $id,
                'nama_perusahaan' => $this->request->getVar('nama_perusahaan'),
                'alamat_perusahaan' => $this->request->getVar('alamat_perusahaan'),
                'lokasi' => $this->request->getVar('lokasi'),
                'koordinat' => $this->request->getVar('koordinat'),
                'nomor_registrasi' => $this->request->getVar('nomor_registrasi'),
                'kegunaan_air' => $this->request->getVar('kegunaan_air'),
                'jumlah_max' => $this->request->getVar('jumlah_max'),
                'kedalaman_bor' => $this->request->getVar('kedalaman_bor'),
                'kedalaman_aquifer' => $this->request->getVar('kedalaman_aquifer'),
                'kedalaman_pompa' => $this->request->getVar('kedalaman_pompa'),
                'foto' => $namaSampul
            ]);
        }

        session()->setFlashdata('pesan', 'Data Berhasil Diubah');

        return redirect()->to('/sumur');
    }
}

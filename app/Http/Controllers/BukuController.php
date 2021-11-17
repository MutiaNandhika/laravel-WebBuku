<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuModel;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->BukuModel = new BukuModel();

    }

    public function index(Request $request)
    {
        $data = [
            'buku' => $this->BukuModel->allData(),
        ];

        return view('v_buku', $data);
    }

    public function detail($id_buku)
    {
        if (!$this->BukuModel->detailData($id_buku)) {
            abort(404);
        }
        $data = [
            'buku' => $this->BukuModel->detailData($id_buku),

        ];
        return view('v_detailbuku', $data);
    }

    public function add()
    {
        return view('v_addbuku');
    }

    public function insert()
    {
        Request()->validate(
            [
                'judul' => 'required',
                'pengarang' => 'required',
                'penerbit' => 'required',
                'gambar' => 'required|mimes:jpg,jpeg,bmp,png|max:1024',
            ],
            [
                'judul.required' => 'Wajib Diisi !!!',
                'pengarang.required' => 'Wajib Diisi !!!',
                'penerbit.required' => 'Wajib Diisi !!!',
                'gambar.required' => 'Wajib Diisi !!!',
            ]
        );
        //jika validasi tidak ada maka lakukan simpan data
        //upload gambar/foto
        $file = Request()->gambar;
        $fileName = Request()->judul . '.' . $file->extension();
        $file->move(public_path('gambar'), $fileName);

        $data = [
            'judul' => Request()->judul,
            'pengarang' => Request()->pengarang,
            'penerbit' => Request()->penerbit,
            'gambar' => $fileName,
        ];

        $this->BukuModel->addData($data);
        return redirect()->route('buku')->with('pesan', 'Data Berhasil Di Tambahkan !!!');
    }

    public function edit($id_buku)
    {
        if (!$this->BukuModel->detailData($id_buku)) {
            abort(404);
        }
        $data = [
            'buku' => $this->BukuModel->detailData($id_buku),

        ];
        return view('v_editbuku',$data);
    }

    public function update($id_buku)
    {
        Request()->validate(
            [
                'judul' => 'required',
                'pengarang' => 'required',
                'penerbit' => 'required',
                'gambar' => 'mimes:jpg,jpeg,bmp,png|max:1024',
            ],
            [
                'judul.required' => 'Wajib Diisi !!!',
                'pengarang.required' => 'Wajib Diisi !!!',
                'penerbit.required' => 'Wajib Diisi !!!',
            ]
        );
        //jika validasi tidak ada maka lakukan simpan data
        if (Request()->gambar <> "") {
            //jika ingin ganti foto
            //upload gambar/foto
           $file = Request()->gambar;
           $fileName = Request()->judul . '.' . $file->extension();
           $file->move(public_path('gambar'), $fileName);

            $data =
            [
                'judul' => Request()->judul,
                'pengarang' => Request()->pengarang,
                'penerbit' => Request()->penerbit,
                'gambar' => $fileName,
            ];

            $this->BukuModel->editData($id_buku, $data);
        } else {
            //jika tidak ingin ganti foto
            $data = [
                'judul' => Request()->judul,
                'pengarang' => Request()->pengarang,
                'penerbit' => Request()->penerbit,
            ];

            $this->BukuModel->editData($id_buku, $data);
        }

        return redirect()->route('buku')->with('pesan', 'Data Berhasil Di Update !!!');

    }

    public function delete($id_buku)
    {
        //hapus atau delete foto
        $buku = $this->BukuModel->detailData($id_buku);
        if ($buku->gambar <> "") {
            unlink(public_path('gambar') . '/' . $buku->gambar);
        }

        $this->BukuModel->deleteData($id_buku);
        return redirect()->route('buku')->with('pesan', 'Data Berhasil Di Hapus!!!');
    }

    public function search(Request $request){
        $search = $request->get('search');
        $data = [
         'buku' =>DB::table('buku')->where('judul', 'like', '%' .$search. '%')->paginate(4)
        ];
        return view('v_buku', $data);
    }
}

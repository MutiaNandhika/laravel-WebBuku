<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BukuModel extends Model
{
    public function allData(){
        return DB::table('buku')->paginate(4);
    }

    public function detailData($id_buku)
    {
        return DB::table('buku')->where('id_buku',$id_buku)->first();
    }

    public function addData($data)
    {
        DB::table('buku') -> insert($data);
    }

    public function editData($id_buku,$data)
    {
        DB::table('buku')
        -> where('id_buku',$id_buku)
        ->update($data);
    }

    public function deleteData($id_buku)
    {
        DB::table('buku')
        -> where('id_buku',$id_buku)
        ->delete();
    }


}

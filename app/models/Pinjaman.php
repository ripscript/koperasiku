<?php

namespace App\models;

use App\models\Anggota;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    protected $table = "pinjaman";
    protected $guarded = ['id'];
    public $timestamps = false;

    public function anggota ()
    {
        return $this->hasOne(Anggota::class, 'id', 'nama');
    }
}

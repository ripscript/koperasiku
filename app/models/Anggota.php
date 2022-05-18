<?php

namespace App\models;

use App\models\Jabatan;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = "anggota";
    protected $guarded = ['id'];
    public $timestamps = false;
}

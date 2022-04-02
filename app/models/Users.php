<?php

namespace App\models;

use App\models\Jabatan;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $guarded = ['id'];
}

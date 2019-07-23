<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'tb_member';

    protected $fillable = [
        'member_nama', 'member_user', 'email', 'member_alamat',
    ];
}

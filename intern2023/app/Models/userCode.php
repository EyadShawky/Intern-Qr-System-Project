<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userCode extends Model
{
    use HasFactory;
    protected $table = 'user_code';
    protected $fillable = ['user_id','code','qr_code'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;
    // protected $table = "바꾸고 싶은 테이블명";
    // protected $primaryKey = "바꾸고 싶은 PK명";
    protected $fillable = ['title', 'ctnt', 'hits'];
    // protected $guarded = ["컬럼명"]; : 수정이 안되길 원하는 경우
    protected $guarded = ["created_ad"];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    //permitir carga maxiba de datos
    protected $fillable=[
        'title',
        'description',
        'status',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

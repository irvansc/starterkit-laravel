<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['jenjang', 'tingkat', 'nama_kelas'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'web_name',
        'web_url',
        'web_email',
        'web_email_noreply',
        'web_telp',
        'web_desc',
    ];
}

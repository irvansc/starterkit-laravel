<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    use HasFactory;
    protected $fillable = ['logo_utama', 'logo_email', 'logo_favicon'];

    public function getLogoUtamaAttribute($value)
    {
        if ($value) {
            return asset('back/images/logo/' . $value);
        }

        return asset('/back/images/logo/default.png');
    }

    public function getLogoEmailAttribute($value)
    {
        if ($value) {
            return asset('back/images/logo/' . $value);
        }

        return asset('/back/images/logo/default.png');
    }

    public function getLogoFaviconAttribute($value)
    {
        if ($value) {
            return asset('back/images/logo/' . $value);
        }

        return asset('/back/images/logo/default.png');
    }
}

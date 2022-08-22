<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $table = 'phone';
    protected $fillable = ['name', 'storage', 'price', 'manufacturer_id', 'phone_photo'];

    public function users()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function manufacturor()
    {
        return $this->belongsTo(Manufacturer::class)->withDefault();
    }
}

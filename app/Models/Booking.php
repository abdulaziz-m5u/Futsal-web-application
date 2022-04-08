<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function arena(){
        return $this->belongsTo(Arena::class);
    }

    public function getStatusAttribute($input){
        return [
            0 => 'On Proses',
            1 => 'Sukses',
            2 => 'Batal'
        ][$input];
    }
}

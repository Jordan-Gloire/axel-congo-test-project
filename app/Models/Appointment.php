<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    use HasFactory;
    protected $fillable = ['client_id', 'date', 'time', 'description', 'status'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}

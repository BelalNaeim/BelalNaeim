<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model {
    use HasFactory;
    protected $table = 'shipments';
    protected $fillable = [
        'user_id',
        'adda',
        'fromcount',
        'fromcity',
        'tocount',
        'tocity',
        'shwe',
        'ndbfda',
        'prlink',
        'prname',
        'prtype',
        'prprice',
        'prquan',
        'primage',
        'prdet',
        'dshto',
        'atds',
    ];

    public function user() {
        return $this->belongsTo( User::class );
    }
    protected $casts = [
        'adda'=>'datetime',
        'ndbfda'=>'datetime'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ont extends Model
{
    use HasFactory;

    protected $table = "ont";
    protected $fillable = [
       'ip_address_ont', 'sn_ont', 'site_id', 'type', 'alamat', 'status', 'modified_by'
    ];
}

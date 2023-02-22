<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('tgl_tanggapan','like','%'. $search .'%')
            ;
        });
    }

    public function pengaduan(){
        return $this->belongsTo(Pengaduan::class, 'id_pengaduan');
    }
    public function petugas(){
        return $this->belongsTo(User::class, 'id_petugas');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->whereHas('masyarakat', function($query) use ($search){
                $query->where('nik','like','%' . $search . '%')
                ->orWhere('nama','like','%' . $search . '%')
                ->orWhere('username','like','%' . $search . '%')
                ;
            })->orWhere('tgl_pengaduan','like','%' . $search . '%')
            ->orWhere('isi_laporan','like','%' . $search . '%')
            ->orWhere('status','like','%' . $search . '%')
            ;
        });
    }

    public function masyarakat(){
        return $this->belongsTo(Masyarakat::class, 'id_masyarakat');
    }
}

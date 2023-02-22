<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('nama','like','%'. $search .'%')
            ->orWhere('username','like',$search . '%')
            ->orWhere('telp','like',$search . '%')
            ->orWhere('nik','like','%'. $search .'%')
            ;
        });
    }
}

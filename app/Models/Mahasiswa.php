<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Mahasiswa as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;


class Mahasiswa extends Model
{
    use HasFactory;
    protected $table="mahasiswa";
    public $timestamps= false;
    protected $primaryKey = 'Nim';  
    protected $perPage = 5;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Nim',
        'Nama',
        'foto',
        'kelas_id',
        'Jurusan',
        'NoHp',
        'email',
        'tanggalLahir',
    ];
    protected $guarded = [];

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }

    public function mataKuliah() {
        return $this->belongsToMany(Matakuliah::class, "mahasiswa_matakuliah", "mahasiswa_id", "matakuliah_id")->withPivot('nilai');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $table = "mdl_grade_grades";

    public function pelajaran()
    {
        return $this->belongsTo(Item::class, 'itemid');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'userid');
    }
}

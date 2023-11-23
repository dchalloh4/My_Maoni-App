<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Units extends Model
{
    use HasFactory;
    protected $table = 'Units';

    protected $fillable = [
        'UNIT Code',
        'UNIT Name',
        'Description',
        'Lecturer',
    ];

    public function lecturers()
    {
        return $this->belongsToMany(Lecturer::class);
    }

    public function users() {
        $this->belongsToMany(User::class, 'user_units')->withPivot('number_of_units');
    }
}

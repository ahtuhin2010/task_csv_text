<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['file_name', 'total_upload', 'total_processed'];

    public function groups()
    {
        return $this->hasMany(Group::class, 'file_id');
    }
}

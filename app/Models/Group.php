<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name','file_id'];

    public function contacts ()
    {
        return $this->hasMany(Contact::class, 'group_id');
    }

    public function getNumberOfContactsAttribute() {
        return $this->contacts()->count();
    }
}

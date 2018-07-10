<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'units';
    protected $fillable = ['nama_unit'];

    public function employee()
    {
        return $this->belongsTo('employees');
    }
}

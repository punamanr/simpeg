<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pangkatgolongan extends Model
{
		protected $table = 'pangkatgolongans';

		protected $fillable = ['golongan','pangkat'];
}

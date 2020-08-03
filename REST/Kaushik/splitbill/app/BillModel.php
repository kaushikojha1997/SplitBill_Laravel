<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SplitBtwnModel;


class BillModel extends Model
{
    //
	protected $table='bill';
	protected $primaryKey='id';
	public $timestamps=false;
	protected $guarded=['id'];


	public function splitbtwn()
	{
		return $this->hasMany('App\SplitBtwnModel','bill_id');
	}
}

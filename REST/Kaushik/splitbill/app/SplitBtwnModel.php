<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BillModel;
class SplitBtwnModel extends Model
{
    //
	protected $table='splitbtwn';
	protected $primaryKey='id';
	public $timestamps=false;
	protected $guarded=['id'];
	protected $fillable=['bill_id','split_user_email'];


	public function user()
	{
    	return $this->belongsTo('App\BillModel');
		
	}
}

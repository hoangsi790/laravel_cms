<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;

class Tags extends Model
{
	protected $table = 'tags';
	public function query_tags($order_by, $order) {
    	 return DB::table($this->table)->select('id', 'title')->orderBy($order_by, $order)->get();
	}

	public function query_tag($tag_id, $order_by, $order) {
		return DB::table($this->table)->select('id', 'title')->orderBy($order_by, $order)->get();
   }
	
}
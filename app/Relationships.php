<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;

class Relationships extends Model
{
	protected $table = 'relationships';
	public function query_relationships($post_id, $trash, $order_by, $order) {
    	 return DB::table($this->table)->select('id', 'post_id', 'tag_id')
		 ->where('post_id', $post_id)->where('trash', $trash)->orderBy($order_by, $order)->get();
	}
	
	public function query_insert_relationship($arr_create) {
		return DB::table($this->table)->insertGetId($arr_create);
   }
}
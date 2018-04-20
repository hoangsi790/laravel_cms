<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;

class Posts extends Model
{
	protected $table = 'posts';
	public function query_posts($post_type, $trash, $paginate, $order_by, $order) {
    	 return DB::table($this->table)->select('id', 'title', 'created_at', 'user_id', 'featured', 'thumbnail','post_type')
		 ->where('post_type', $post_type)->where('trash', $trash)->orderBy($order_by, $order)->paginate($paginate);
	}
	
	public function query_insert_post($arr_create) {
		return DB::table($this->table)->insertGetId($arr_create);
   }
}
<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;

class Users extends Model
{
	protected $table = 'users';
	public function query_users($post_type, $trash, $paginate, $order_by, $order) {
    	 return DB::table($this->table)->select('id', 'title', 'created_at', 'user_id', 'featured', 'post_type')
		 ->where('post_type', $post_type)->where('trash', $trash)->orderBy($order_by, $order)->paginate($paginate);
    }
    public function query_user($user_id) {
        return DB::table($this->table)->select('id', 'display_name')->where('id', $user_id)->get();
   }
	
}
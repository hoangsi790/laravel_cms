<?php
namespace App\Http\Controllers;
use Session;
use DB;
use View;
use Request;
use Illuminate\Support\Facades\Input;
class BaseController extends Controller
{
		public function __construct() {
			
			$path= Request::path();
		    View::share('path', $path);
		}
}
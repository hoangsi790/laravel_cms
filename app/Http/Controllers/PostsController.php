<?php
namespace App\Http\Controllers;

use App\Posts;
use App\Tags;
use App\Relationships;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
//use Request;
use View;

class PostsController extends BaseController
{
    public function pr($pr)
    {
        echo '<pre>';
        print_r($pr);
        echo '</pre>';
    }

    public function pr_die($pr)
    {
        echo '<pre>';
        print_r($pr);
        echo '</pre>';die();
    }

    public function posts(Request $request) {
        $m_posts = new Posts();
        $m_tags = new Tags();
        $m_relationships = new Relationships();
        $m_users = new Users();

        if (isset($request->post_type)) {
            if ($request->post_type == 'posts') {$post_type = 'post';} else if ($request->post_type == 'pages') {$post_type = 'page';} else { $post_type = $request->post_type;}
        }
        
        //$this->pr_die($tags);
        $get_posts = $m_posts->query_posts($post_type, 0, 20, 'id', 'desc');
        $paginate_posts = $get_posts;
        if (isset($get_posts) and count($get_posts) > 0) {
            $posts_result = array();
            foreach ($get_posts as $get_post) {
                $user = '';
                $user = $m_users->query_user($get_post->user_id);

                $arr_posts = array();
                $arr_posts['id'] = $get_post->id;
                $arr_posts['title'] = $get_post->title;
                $arr_posts['created_at'] = $get_post->created_at;
                $arr_posts['user_display_name'] = $user[0]->display_name;
                $arr_posts['featured'] = $get_post->featured;
                $arr_posts['thumbnail'] = $get_post->thumbnail;
                $arr_posts['post_type'] = $post_type;
                /* ------------------ */
                    $relationships = array();
                    $relationships = $m_relationships->query_relationships($get_post->id, 0, 'id', 'desc');
                    if(isset($relationships) and count($relationships) > 0) { 
                        $tags_result = array();
                        foreach($relationships as $relationship) {
                            $tag_id=''; $tag_id = $relationship->tag_id;
                            $tags = $m_tags->query_tag($tag_id, 'id', 'desc');
                            if(isset($tags) and count($tags) > 0) {
                                $arr_tags= array();
                                $arr_tags['id'] = $tags[0]->id;
                                $arr_tags['title'] = $tags[0]->title;
                                $tags_result[] = $arr_tags;
                            }
                        }
                        $arr_posts['tags'] = $tags_result;
                    }
                /* ------------------ */
                $posts_result[] = $arr_posts;
            }
            $posts = array(); $posts = $posts_result;
            $this->pr_die($posts);
        }
        return view('backend.posts', compact('posts', 'paginate_posts', 'post_type'));
    }

    public function post_create(Request $request) {
        $m_tags = new Tags();
        if (isset($request->post_type)) {
            if ($request->post_type == 'posts') {$post_type = 'post';} else if ($request->post_type == 'pages') {$post_type = 'page';} else { $post_type = $request->post_type;}
        }
        
        $get_tags = $m_tags->query_tags('title', 'asc');
        if (isset($get_tags) and count($get_tags) > 0) {
            $tags = array();
            foreach ($get_tags as $get_tag) {
                $arr_tags = array();
                $arr_tags['id'] = $get_tag->id;
                $arr_tags['title'] = $get_tag->title;
                $tags[] = $arr_tags;
            }
        }
        return view('backend.post-create', compact('post_type', 'tags'));
    }

    public function post_insert(Request $request) {
        $m_posts = new Posts();
        $m_tags = new Tags();
        $m_relationships = new Relationships();

        $arr_insert = array();
        if(isset($request->post_type) and $request->post_type!='') { $arr_insert['post_type'] = $request->post_type;}
        if(isset($request->content) and $request->content!='') { $arr_insert['content'] = $request->content;}
        if(isset($request->excerpt) and $request->excerpt!='') { $arr_insert['excerpt'] = $request->excerpt;}
        if(isset($request->status) and $request->status!='') { $arr_insert['status'] = $request->status;}
        if(isset($request->featured) and $request->featured!='' and $request->featured=='on') { $arr_insert['featured'] = 1;} else { $arr_insert['featured'] = 0;}
        $arr_insert['trash'] = 0;
        if(isset($request->post_order) and $request->post_order!='') { $arr_insert['post_order'] = $request->post_order;}
        if(isset($request->title) and $request->title!='') { 
            $arr_insert['title'] = $request->title;
            $arr_insert['slug'] = str_slug($request->title, '-');
            $post_id = $m_posts->query_insert_post($arr_insert);

            // insert relationship tags
                if(isset($request->tags) and $request->tags!='') {
                    $tags = array();
                    $tags = $request->tags;
                    if(isset($tags) and count($tags) > 0) { 
                        foreach($tags as $tag) {
                            $arr_insert = array();
                            $arr_insert['post_id'] = $post_id; // id note vừa sinh ra ở trên
                            $arr_insert['tag_id'] = $tag;
                            $arr_insert['user_id'] = 1;
                            $arr_insert['trash'] = 0;
                            $relationship_id = $m_relationships->query_insert_relationship($arr_insert);
                        }
                    }
                }
            // end insert relationship tags
        }
        
        

       
       

       // return view('backend.post-create');
    }

}

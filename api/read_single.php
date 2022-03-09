<?php
//headers
header('Access-Control-Allow-Origin: *'); // * OR https://www.reddit.com/
header('Content-Type: application/json ; charset=utf-8');
//initializing our api
include_once('../core/initial.php');
// instantial post
$post= new Post($db);
$post->id =isset($_GET['id']) ? $_GET['id'] : die();
$post->read_single();


$post_arr =array(
       'id' =>$post->id,
       'title' =>$post->title,
       'body' =>$post->body,
       'title' =>$post->title,
       'category_id' =>$post->category_id,
       'category_name' =>$post->category_name,

    );
    print_r(Json_encode($post_arr));
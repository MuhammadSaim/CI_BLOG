<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class PostModel extends CI_Model{


	public function insert($data)
	{
		return ($this->db->insert('posts', $data)) ? true : false;
	}


	public function getAllPosts()
	{
		return $this->db->order_by('id', 'DESC')->get('posts')->result();
	}


	public function uniqueSlug($str)
	{
		$slug = url_title($str, '-', true);
		$table = $this->db->where('slug', $slug)->get('posts');
		if($table){
			return $slug.'-'.mt_rand(10000, 99999);
		}else{
			return $slug;
		}
	}


	public function findPost($slug)
	{
		$post = $this->db->where('slug', $slug)->get('posts')->first_row();
		if($post){
			return $post;
		}else{
			return false;
		}
	}


}
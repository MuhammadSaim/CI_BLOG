<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PostController extends CI_Controller {


	public function addPost()
	{

		$config = [
			[
				'field' => 'title',
				'label' => 'Title',
				'rules' => 'required'
			],
			[
				'field' => 'post',
				'label' => 'Post',
				'rules' => 'required'
			]
		];


		$this->form_validation->set_rules($config);

		if($this->form_validation->run() === False){
			$this->load->view('includes/header');
			$this->load->view('pages/post/add');
			$this->load->view('includes/footer');
		}else{


			$config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2048;
            $config['file_ext_tolower']     = TRUE;
            $config['encrypt_name']			= TRUE;


            $this->upload->initialize($config);


            if(!$this->upload->do_upload('image')){
            	$data['file_error'] = $this->upload->display_errors();
            	$this->load->view('includes/header');
				$this->load->view('pages/post/add', $data);
				$this->load->view('includes/footer');
            }else{
            	$image = $this->upload->data();
            	$title = $this->input->post('title');
				$post = $this->input->post('post');
				$post_insert = $this->post->insert([
					'title' => $title,
					'image' => $image['file_name'],
					'slug' => $this->post->uniqueSlug($title),
					'post'  => $post
				]);
				if($post_insert){
					$data['message'] = '<div class="alert alert-success"><strong>Successfully!</strong> Post is inserted successfully.</div>';
					$this->load->view('includes/header');
					$this->load->view('pages/post/add', $data);
					$this->load->view('includes/footer');
				}else{
					$data['message'] = '<div class="alert alert-danger"><strong>Error!</strong> Something went wrong please try again.</div>';
					$this->load->view('includes/header');
					$this->load->view('pages/post/add', $data);
					$this->load->view('includes/footer');
				}// post insert else ends here
            }



			
		}// else ends here
	}// main method here



	public function post($slug)
	{
		$post = $this->post->findPost($slug);
		if($post){
			$data['post'] = $post;
			$this->load->view('includes/header');
			$this->load->view('pages/post/show', $data);
			$this->load->view('includes/footer');
		}else{
			show_404();
		}
	}


}
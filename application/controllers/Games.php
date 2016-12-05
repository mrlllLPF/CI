<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Games extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('games_model');
		$this->load->helper('form');
		$this->load->helper('url_helper');
		$this->load->helper('url');
	}
	
	/**
	 * 游戏合辑列表
	 */
	public function index($index=0)
	{
		$this->load->library('pagination');
		
		$config['base_url'] = base_url().'index.php/games/index/';
		$config['total_rows'] = $this->games_model->get_num_rows(); 
		$config['per_page'] = 4;
		
		$config['cur_tag_open'] = '<b style="font-size:25px;">';
		$config['cur_tag_close'] = '</b>';
		$config['attributes'] = array('class' => 'myclass');
		
		$this->pagination->initialize($config);
		
		$data['page_html']=$this->pagination->create_links();
		
		$data['dataList'] = $this->games_model->get_games_list($index,$config['per_page']);
		$this->load->view('games_list',$data);
		
		
		
	}
	
	/**
	 * 新增游戏合辑html页面
	 */
	public function addNewGamesHtml($e=''){
		$error = array('error' => $e);
		$this->load->view('add_games',$error);
	}
	
	/**
	 * 新增游戏合辑
	 */
	public function addNewGames(){
		
		//上传图片
		$config['upload_path']      = './uploads/';
		$config['allowed_types']    = 'gif|jpg|png';
		$config['max_size']     = 100;
		$config['max_width']        = 1024;
		$config['max_height']       = 768;
		
		
		
		$fillet_url='';
		$banner_url='';
		
		$config['file_name'] = time().rand(1,9);
		$this->load->library('upload', $config);
		$re1=$this->upload->do_upload('banner_url');
		if($re1==1){
			$arr=$this->upload->data();
			$banner_url='uploads/'.$arr['file_name'];
		}else{
			//echo '新增失败:'. $this->upload->display_errors();
			//exit;
			$this->addNewGamesHtml('新增失败:'. $this->upload->display_errors());
			return;
		}
		
		$config['file_name'] = time().rand(1,9);
		$this->load->library('upload', $config);
		$re2=$this->upload->do_upload('fillet_url');
		
		
		if($re2==1){
			$arr=$this->upload->data();
			$fillet_url='uploads/'.$arr['file_name'];
		}else{
			//echo '新增失败:'. $this->upload->display_errors();
			//exit;
			$this->addNewGamesHtml('新增失败:'. $this->upload->display_errors());
			return;
		}

		//新增数据
		$re=$this->games_model->add_new_games($fillet_url,$banner_url);
		if($re==1){
			header("location: ".base_url());
		}else{
			echo '新增失败';
		}
	}
	
	/**
	 * 删除游戏合辑
	 */
	public function deleteGames(){
		$id=$_POST['id'];
		echo $this->games_model->delete_games($id);
	}
	
	/**
	 * 编辑游戏合辑html页面
	 */
	public function editGamesHtml($id,$code=1,$des=''){
		$data['games']=$this->games_model->get_games($id);
		$data['code']=1;
		$data['des']=$des;
		
		$this->load->view('edit_games',$data);
	}
	
	/**
	 * 编辑游戏合辑
	 */
	public function editGames(){
		
		$id=$this->input->post('id');
		
		//上传图片
		$config['upload_path']      = './uploads/';
		$config['allowed_types']    = 'gif|jpg|png';
		$config['max_size']     = 100;
		$config['max_width']        = 1024;
		$config['max_height']       = 768;
		
		
		
		$fillet_url='';
		$banner_url='';
		
		$config['file_name']       = time().rand(1,9);
		$this->load->library('upload', $config);
		$re1=$this->upload->do_upload('banner_url');
		
		//var_dump($_FILES);exit;
		if($re1==1){
			$arr=$this->upload->data();
			$banner_url='uploads/'.$arr['file_name'];
		}else{
			if(!empty($_FILES['banner_url']['name'])){
				$this->editGamesHtml($id,0,'编辑失败：'.$this->upload->display_errors());
				return;
			}
		}
		
		$config['file_name']       = time().rand(1,9);
		$this->load->library('upload', $config);
		$re2=$this->upload->do_upload('fillet_url');
		if($re2==1){
			$arr=$this->upload->data();
			$fillet_url='uploads/'.$arr['file_name'];
		}else{
		if(!empty($_FILES['fillet_url']['name'])){
				$this->editGamesHtml($id,0,'编辑失败：'.$this->upload->display_errors());
				return;
			}
			
		}
		
		//编辑数据
		$id=$this->games_model->edit_games($fillet_url,$banner_url);
		if($id>0){
			$this->editGamesHtml($id,1,'编辑成功！');
			return;
		}else{
			$this->editGamesHtml($id,0,'编辑失败：请稍后重试！');
		    return;
		}
	}
	
}

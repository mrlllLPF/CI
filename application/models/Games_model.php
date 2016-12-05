<?php
class Games_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    /**
     * 获取记录总数
     */
    public function get_num_rows(){
    	$query = $this->db->query("SELECT id FROM game_set WHERE is_delete=0");
    	return $query->num_rows();
    }
    
    /**
     * 
     * 读取全部数据
     */
    public function get_games_list($index,$num)
    {
    	//$query = $this->db->get('game_set');
    	$query = $this->db->query("SELECT * FROM game_set WHERE is_delete=0 order by sort_number asc LIMIT ".$index.",".$num.";");
    	return $query->result_array();
    }
    
    /**
     *
     * 读取指定数据
     */
    public function get_games($id)
    {
    	$query = $this->db->get_where('game_set', array('id' => $id));
        return $query->row_array();
    }
    
    /**
     * 删除数据(逻辑删除)
     */
    public function delete_games($id){
    	//return $this->db->delete('game_set',array('id'=>$id));
    	$data=array('is_delete'=>1);
    	return $this->db->update('game_set',$data,array('id'=>$id));
    }
    
    /**
     * 新增数据
     * @param unknown $fillet_url
     * @param unknown $banner_url
     */
    public function add_new_games($fillet_url,$banner_url)
    {
    
    	$data = array(
    			'system' =>  $this->input->post('system'),
    			'collection_name' => $this->input->post('collection_name'),
    			'collection_abbreviation' => $this->input->post('collection_abbreviation'),
    			
    			'collection_txt' => $this->input->post('collection_txt'),
    			'contain_games' => $this->input->post('contain_games'),
    			'contain_h5' => $this->input->post('contain_h5'),
    			
    			'label_name' => $this->input->post('label_name'),
    			'label_color' => $this->input->post('label_color'),
    			'sort_number' => $this->input->post('sort_number'),
    			
    			'fillet_url' => $fillet_url,
    			'banner_url' => $banner_url,
    			
    			'is_home_recommended' =>$this->input->post('is_home_recommended'),
    			'is_search_recommended' =>$this->input->post('is_search_recommended')
    	);
    
    	return $this->db->insert('game_set', $data);
    	
    }
    
    /**
     * 编辑数据
     */
    public function edit_games($fillet_url,$banner_url){
    	$id=$this->input->post('id');
    	
    	$data = array(
    			'system' =>  $this->input->post('system'),
    			'collection_name' => $this->input->post('collection_name'),
    			'collection_abbreviation' => $this->input->post('collection_abbreviation'),
    			 
    			'collection_txt' => $this->input->post('collection_txt'),
    			'contain_games' => $this->input->post('contain_games'),
    			'contain_h5' => $this->input->post('contain_h5'),
    			 
    			'label_name' => $this->input->post('label_name'),
    			'label_color' => $this->input->post('label_color'),
    			'sort_number' => $this->input->post('sort_number'),

    			'is_home_recommended' =>$this->input->post('is_home_recommended'),
    			'is_search_recommended' =>$this->input->post('is_search_recommended')
    	);
    	
    	if(!empty($fillet_url)){
    		$data['fillet_url']=$fillet_url;
    	}
    	
    	if(!empty($banner_url)){
    		$data['banner_url']=$banner_url;
    	}
    	
    	$bool=$this->db->update('game_set',$data,array('id'=>$id));
    	
    	if($bool){
    		return $id;
    	}else{
    		return 0;
    	}
    }
    
    
}

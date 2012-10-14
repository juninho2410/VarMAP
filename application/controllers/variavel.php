<?php
class variavel extends CI_Controller {


	public function index()
	{
		$this->load->model('variavel_model','varia');
		$data['variaveis']=$this->varia->getVariavel();
		
	
	
		$this->load->view('variavel/index.php',$data);
	
	}
}
?>
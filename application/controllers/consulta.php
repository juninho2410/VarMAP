<?php

class Consulta extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->helper('file');
		$this->load->library('csvreader'); 
		$this->load->model('variavel_model','variavel');
	}

	function index()
	{
		$this->load->view('variavel/consulta', array('error' => ' ' ));
	}

	function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'txt|csv';
		$config['max_size']	= '100';
		//$config['max_width']  = '1024';
		//$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('variavel/consulta', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			//Seta o separador de arquivo CSV
			$this->csvreader->field_separator(';');
			//Converte o arquivo CSV para array pegando a url do arquivo que acabou de fazer upload
			$data['content'] = $this->csvreader->parse_file($data['upload_data']['full_path']);
			
			$data=$data['content'];
			$variables['variable']=array();
			$variables['notfound']=array();
			
			foreach($data as $item => $value){
				$variableData=$this->variavel->findVariable($value['VARIAVEL']);
				if($variableData== false){
					array_push($variables['notfound'],$value['VARIAVEL']);
				}
				else{
					array_push($variables['variable'],$variableData);
				}
			}
			
			$this->load->view('variavel/upload_sucess', $variables);
		}
	}
}

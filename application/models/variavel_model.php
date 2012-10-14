<?php

class Variavel_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	function getVariavel(){
		$query=$this->db->get('DIS_VARIAVEL');
		if($query->num_rows()>0){
			$rows = Array();
				foreach($query->result_array() as $row){
					
					$data['ID']=$row['ID'];
					$data['NOME']=$row['NOME'];
					$data['DESCRICAO_PORTUGUES']=$row['DESCRICAO_PORTUGUES'];
					$data['DESCRICAO_INGLES']=$row['DESCRICAO_INGLES'];
					$data['BOOK_ID']=$row['BOOK_ID'];
					array_push($rows,$data);
				
				}
				return $rows;
			}
		else
			return 0;
	
	}
	function findVariable($name){
	$this->db->select('DIS_VARIAVEL.ID,DIS_VARIAVEL.NOME,DIS_VARIAVEL.DESCRICAO_PORTUGUES,DIS_VARIAVEL.DESCRICAO_INGLES,DIS_BOOK.NOME_PORTUGUES AS BOOK');
	$this->db->from('DIS_VARIAVEL');
	$this->db->join('DIS_LAYOUT_C_VARIAVEL','DIS_LAYOUT_C_VARIAVEL.ID=DIS_VARIAVEL.ID','inner');
	$this->db->join('DIS_BOOK','DIS_BOOK.ID=DIS_VARIAVEL.BOOK_ID','inner');
	$this->db->where('NOME', trim($name));
	$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->row_array();
		}
		else{
			return false;
		}
	}
}

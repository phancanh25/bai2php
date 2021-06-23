<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class nhansu_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function insertData($anh,$ten,$tuoi,$phone,$donhang,$linkfb)
	{
		$dulieu = array(
			'avatar' => $anh,
			'ten' => $ten,
			'tuoi' => $tuoi,
			'sdt' => $phone,
			'sodonhang' => $donhang,
			'linkfb' => $linkfb
		);
		$this->db->insert('nhan_vien', $dulieu);
		return $this->db->insert_id();
	}
	public function getAllData()
	{
		$this->db->select('*');
		$dulieu = $this->db->get('nhan_vien');
		$dulieu = $dulieu->result_array();
		return $dulieu;
	}
	public function getDataById($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$dulieu = $this->db->get('nhan_vien');
		$dulieu = $dulieu->result_array();
		return $dulieu;
	}
	public function updateById($id,$ten,$tuoi,$sdt,$anh,$linkfb,$sodonhang)
	{
		$dulieu = array(
			'id' => $id,
			'avatar' => $anh,
			'ten' => $ten,
			'tuoi' => $tuoi,
			'sdt' => $sdt,
			'sodonhang' => $sodonhang,
			'linkfb' => $linkfb
		);
		$this->db->where('id', $id);
		return $this->db->update('nhan_vien', $dulieu);
	}
	public function RemoveDataById($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('nhan_vien');
	}

}



/* End of file nhansu_model.php */
/* Location: ./application/models/nhansu_model.php */
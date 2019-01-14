<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_db');
	}
	public function index()
	{
		$this->load->view('login');
	}
	function get_client_ip() {
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
		   $ipaddress = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}
	public function masuk()
	{
		$data['username']=$this->input->post('username',TRUE);
		$data['password']=$this->input->post('password',TRUE);
		$where = array(
			'kode_login' 	=> $data['username'],
			'pass' 	=> md5($data['password'])
		);
		$cek = $this->m_db->cek_login("user",$where)->num_rows();
		$get =$this->m_db->cek_login("user",$where);
		$row=$get->row();
		if($cek > 0)
		{
			if($row->is_admin == '1')
			{
				$data_session = array('id' => $row->id_user,'is_admin' =>$row->is_admin, 'status' => "login"  );
				$this->session->set_userdata('logged_in', $data_session);
				redirect('admin');
			}
			else
			{
/* 				$ip = $this->get_client_ip();
 */				$stat = $this->db->query("select * from statistik where key_meta = 'hit';")->row();
				$p = $stat->value_meta +1;
				$this->db->query("update statistik set value_meta = '".$p."' where key_meta = 'hit';");
/* 				$this->db->query("update siswa_meta set `siswa_value` = '".$ip."' where `siswa_key` = 'last_ip' and id_siswa= ".$row->kode_login);
				$this->db->query("update siswa_meta set `siswa_value` = now() where `siswa_key` = 'last_login' and id_siswa= ".$row->kode_login);
 */				$data_session = array('nisn'=>$row->kode_login, 'id' => $row->id_user,'is_admin' =>$row->is_admin, 'status' => "login"  );
				$this->session->set_userdata('logged_in', $data_session);
				redirect('');
			}
		}
		else
		{
			$data['username'] = '';
			$data['password'] = '';
			$data['message'] = "salah";
			$data['pesan'] = "password anda salah atau pengumuman belum di buka";
			$data['title'] = "Akses Terbatas - Login";
			$this->load->view('login', $data);
		}
	}
	public function keluar()
	{
		$this->session->sess_destroy();
		redirect(site_url('login'));
	}

}

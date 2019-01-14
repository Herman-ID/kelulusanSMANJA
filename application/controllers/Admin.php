<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
	public function index()
	{
		$stat = $this->db->query('select value_meta as hit, count(nama) as banyak from statistik join siswa;')->row();
		$ips = $this->db->query('select count(*) as ips from siswa where kelas>5;')->row();
		$ipa = $this->db->query('select count(*) as ipa from siswa where kelas<=5;')->row();
		$data['hit'] = $stat->hit;
		$data['banyak'] = $stat->banyak;
		$data['ipa'] = $ipa->ipa;
		$data['ips'] = $ips->ips;
		$data['title'] = 'Dashboard Admin';
		$data['app'] = 'admin';
		$data['page'] = 'dashboard';
		$this->load->view('admin/container', $data);
	}
	public function biodata()
	{
		$data['title'] = 'Dashboard Admin';
		$data['app'] = 'admin';
		$data['page'] = 'biodata';
		$this->load->view('admin/container', $data);
	}
	public function getbiodata($id)
	{
		$data['title'] = 'Dashboard Admin';
		$data['app'] = 'admin';
		$data['page'] = 'detail_bio';
		$this->load->view('admin/container', $data);
	}
	public function gettugas($id)
	{
		$data['title'] = 'Dashboard Admin';
		$data['app'] = 'admin';
		$data['page'] = 'detail_tugas';
		$this->load->view('admin/container', $data);
	}
	public function editbiodata($id)
	{
		$data['title'] = 'Dashboard Admin';
		$data['app'] = 'admin';
		$data['page'] = 'edit_bio';
		$this->load->view('admin/container', $data);
	}
	public function setuju()
	{
		$data['title'] = 'Dashboard Admin';
		$data['app'] = 'admin';
		$data['page'] = 'setuju';
		$this->load->view('admin/container', $data);
	}
	public function user()
	{
		$data['title'] = 'Dashboard Admin';
		$data['app'] = 'admin';
		$data['page'] = 'admin';
		$this->load->view('admin/container', $data);
	}
	public function getuser()
	{
		$data['title'] = 'Dashboard Admin';
		$data['app'] = 'admin';
		$data['page'] = 'detailadmin';
		$this->load->view('admin/container', $data);
	}
	public function edituser()
	{
		$data['title'] = 'Dashboard Admin';
		$data['app'] = 'admin';
		$data['page'] = 'editadmin';
		$this->load->view('admin/container', $data);
	}
	public function import()
	{
		$data['title'] = 'Dashboard Admin';
		$data['app'] = 'admin';
		$data['page'] = 'import';
		$this->load->view('admin/container', $data);
	}
}

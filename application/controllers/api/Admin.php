<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Admin extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get() {
        $id = $this->get('id');
        if ($id == '') {
            $kontak = $this->db->query("select  kode_login, pass, nama, email  from user join admin where user.is_admin = 1 and user.id_user = admin.id_admin")->result();
        } else {
            $kontak = $this->db->query("select  kode_login, pass, nama, email, telepon from user join admin where user.is_admin = 1 and user.id_user = admin.id_user and user.id_admin=".$id)->result();
        }
        $this->response($kontak, 200);
    }
	function index_post() {
        $data = array(
                    'id_user'    => $this->post('id_user'),
                    'kode_login' => $this->post('kode_login'),
                    'pass'       => md5($this->post('pass')),
                    'is_admin'   => $this->post('is_admin')
                );
        $insert = $this->db->insert('user', $data);
        if ($insert) {
            $this->response(array('status' => 'success', 200));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
	function index_put() {
        $id = $this->put('id');
        $data = array(
            'id_user'    => $this->put('id'),
            'kode_login' => $this->put('kode'),
            'pass'       => md5($this->put('pass')),
            'is_admin'   => $this->put('is_admin'));
        $this->db->where('id_user', $id);
        $update = $this->db->update('user', $data);
        if ($update) {
            $this->response(array('status' => 'success'), 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_delete() {
        $id = $this->delete('id');
        $this->db->where('id_user', $id);
        $delete = $this->db->delete('user');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    //Masukan function selanjutnya disini
}
?>
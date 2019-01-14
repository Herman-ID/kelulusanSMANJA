<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Siswastat extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

	function index_put() {
        $id = $this->put('id');
        $x = $this->db->query('select * from siswa_meta where id_siswa = '.$id)->row();
        $tambah = $x->siswa_value + 1;
        $update = $this->db->query("update siswa_meta set siswa_value = ". $tambah ." where siswa_key = 'cetak_surat' and id_siswa =".$id);
        if ($update) {
            $this->response(array('status' => 'success'), 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
?>
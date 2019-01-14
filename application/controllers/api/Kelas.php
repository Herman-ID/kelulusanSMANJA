<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Kelas extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

        //Menampilkan data kontak
    function index_get() {
        $id = $this->get('id_kelas');
        if ($id == '') {
            $respon = $this->db->get('kelas')->result();
        } else {
            $this->db->where('id_user', $id);
        }
        $respon = $this->db->get('kelas')->result();
        $this->response($respon, 200);
    }

}

?>
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Peminatan extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

        //Menampilkan data kontak
    function index_get() {
        $id = $this->get('id_peminatan');
        if ($id == '') {
            $respon = $this->db->get('peminatan')->result();
        } else {
            $this->db->where('id_peminatan', $id);
        }
        $respon = $this->db->get('peminatan')->result();
        $this->response($respon, 200);
    }

}

?>
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Tugas extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
		$this->load->model('m_db');
    }

    //Menampilkan data kontak
    function index_get() {
        $id = $this->get('id');
        $sql = " SELECT queue.id,`siswa`.`nama`, `siswa`.`nisn`, `keterangan`.`isi` AS `ket`,`kelas`.`vkelas` AS 'kelas', CONCAT(`siswa`.`tempat_lhr`, ',', `siswa`.`tanggal_lhr`) AS 'ttl',`siswa`.`no_ujian`,`peminatan`.`pelajaran` AS 'peminatan', `queue`.`key_queue` AS 'key', `queue`.`value_queue` AS 'value' FROM `siswa` JOIN `kelas`JOIN `keterangan` JOIN `peminatan` JOIN `queue` WHERE `siswa`.`kelas` = `kelas`.`id_kelas` AND `siswa`.`ket` = `keterangan`.`id` AND `siswa`.`peminatan` = `peminatan`.`id_peminatan` AND `queue`.`key_queue` = `siswa`.`nisn`;";
        if ($id == '') {
            $kontak = $this->db->query($sql)->result();
        } else {
            $kontak = $this->db->query("SELECT queue.id, `siswa`.`nama`, `siswa`.`nisn`, `keterangan`.`isi` AS `ket`,`kelas`.`vkelas` AS 'kelas', CONCAT(`siswa`.`tempat_lhr`, ',', `siswa`.`tanggal_lhr`) AS 'ttl',`siswa`.`no_ujian`,`peminatan`.`pelajaran` AS 'peminatan', `queue`.`key_queue` AS 'key', `queue`.`value_queue` AS 'value' FROM `siswa` JOIN `kelas`JOIN `keterangan` JOIN `peminatan` JOIN `queue` WHERE `siswa`.`kelas` = `kelas`.`id_kelas` AND `siswa`.`ket` = `keterangan`.`id` AND `siswa`.`peminatan` = `peminatan`.`id_peminatan` AND `queue`.`key_queue` = `siswa`.`nisn` AND queue.id = ".$id)->result();
        }
        $this->response($kontak, 200);
    }
	function index_post() {
        $data = array(
                    'id'    => $this->post('id'),
                    'key_queue' => $this->post('key'),
                    'value_queue' => $this->post('value'),
        );
            $insert = $this->db->insert('queue', $data);
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
        $this->db->where('id', $id);
        $delete = $this->db->delete('queue');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    //Masukan function selanjutnya disini
}
?>
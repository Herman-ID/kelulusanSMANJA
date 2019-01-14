<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Un extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get() {
        $id = $this->get('id');
        if ($id == '') {
            $respon = $this->db->query("SELECT `siswa`.`nama`,`siswa`.`alamat`, `siswa`.`nisn`, `kelas`.`vkelas` AS 'kelas', CONCAT(`siswa`.`tempat_lhr`, ',', `siswa`.`tanggal_lhr`) AS 'ttl',`siswa`.`no_ujian`,`peminatan`.`pelajaran` AS 'peminatan' , `indo`, `inggris`, `mtk`, `nilai`.`peminatan` AS 'pelajaran', `peringkat` FROM `siswa` JOIN `kelas` JOIN `peminatan` JOIN `nilai` WHERE `siswa`.`kelas` = `kelas`.`id_kelas` AND `siswa`.`peminatan` = `peminatan`.`id_peminatan` AND `siswa`.`id_user` = `nilai`.`id_siswa`;")->result();
        } else {
            $respon = $this->db->query("SELECT `siswa`.`nama`,`siswa`.`alamat`, `siswa`.`nisn`, `kelas`.`vkelas` AS 'kelas', CONCAT(`siswa`.`tempat_lhr`, ',', `siswa`.`tanggal_lhr`) AS 'ttl',`siswa`.`no_ujian`,`peminatan`.`pelajaran` AS 'peminatan' , `indo`, `inggris`, `mtk`, `nilai`.`peminatan` AS 'pelajaran', `peringkat` FROM `siswa` JOIN `kelas` JOIN `peminatan` JOIN `nilai` WHERE `siswa`.`kelas` = `kelas`.`id_kelas` AND `siswa`.`peminatan` = `peminatan`.`id_peminatan` AND `siswa`.`id_user` = `nilai`.`id_siswa` AND `siswa`.`nisn` = '".$id."';")->result();
        }
        $this->response($respon, 200);
    }
}
?>
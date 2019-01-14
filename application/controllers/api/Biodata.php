<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Biodata extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get() {
        $id = $this->get('id');
        if ($id == '') {
            $respon = $this->db->query("SELECT `siswa_meta`.`siswa_value` AS 'jumlah', `siswa`.`nama`, `siswa`.`nisn`, `keterangan`.`isi` AS `ket`,`kelas`.`vkelas` AS 'kelas', CONCAT(`siswa`.`tempat_lhr`, ',', `siswa`.`tanggal_lhr`) AS 'ttl',`siswa`.`no_ujian`,`peminatan`.`pelajaran` AS 'peminatan' FROM `siswa` JOIN `kelas`JOIN `keterangan` JOIN `peminatan` JOIN `siswa_meta` WHERE `siswa`.`nisn` = `siswa_meta`.`id_siswa`and `siswa`.`kelas` = `kelas`.`id_kelas` AND `siswa`.`ket` = `keterangan`.`id` AND `siswa`.`peminatan` = `peminatan`.`id_peminatan` AND `siswa_meta`.`siswa_key` = 'cetak_surat';")->result();
        } else {
            $respon = $this->db->query("SELECT `siswa_meta`.`siswa_value` AS 'jumlah', `siswa`.`nama`, `siswa`.`nisn`, `keterangan`.`isi` AS `ket`,`kelas`.`vkelas` AS 'kelas', CONCAT(`siswa`.`tempat_lhr`, ',', `siswa`.`tanggal_lhr`) AS 'ttl',`siswa`.`no_ujian`,`peminatan`.`pelajaran` AS 'peminatan' FROM `siswa` JOIN `kelas`JOIN `keterangan` JOIN `peminatan` JOIN `siswa_meta` WHERE `siswa`.`nisn` = `siswa_meta`.`id_siswa`and `siswa`.`kelas` = `kelas`.`id_kelas` AND `siswa`.`ket` = `keterangan`.`id` AND `siswa`.`peminatan` = `peminatan`.`id_peminatan` AND `siswa_meta`.`siswa_key` = 'cetak_surat' AND `siswa`.`nisn` = '".$id."';")->result();
        }
        $this->response($respon, 200);
    }
    function convertKelas($kelas){
        switch ($kelas) {
            case '12 IPA 1':
                return 1;
                break;  
            case '12 IPA 2':
                return 2;
                break;  
            case '12 IPA 3':
                return 3;
                break;  
            case '12 IPA 4':
                return 4;
                break;  
            case '12 IPA 5':
                return 5;
                break;  
            case '12 IPS 1':
                return 6;
                break; 
            case '12 IPS 2':
                return 7;
                break; 
            case '12 IPS 3':
                return 8;
                break;
            case '12 IPS 4':
                return 9;
                break; 
            case '12 IPS 5':
                return 10;
                break; 
        }
    }
    function convertTempatLhr($ttl)
    {
        $arr = explode(',', $ttl);
        return $arr[0];
    }
    function convertTanggalLhr($ttl)
    {
        if(!$ttl){
        return 0;
        }else{
        $arr = explode(',', $ttl);
        return $arr[1];}
    }
    function convertPeminatan($peminatan){
        switch ($peminatan) {
            case 'fisika':
                return 1;
                break;
            case 'kimia':
                return 2;
                break;
            case 'biologi':
                return 3;
                break;
            case 'ekonomi':
                return 4;
                break;
            case 'sosiologi':
                return 5;
                break;
            case 'ekonomi':
                return 6;
                break;
            
            }
    }
    function index_post() {
        $nisn    = $this->post('nisn');
        $tgl     = $this->post('tanggal');
        $tmp     = $this->post('tempat');
        $nama   = $this->post('nama');
        $kelas = $this->post('kelas');
        $nomor = $this->post('nomor');
        $minat = $this->post('peminatan');
        $ket = $this->post('ket');
        $sql = "insert into user values(NULL, '".$nisn."', MD5('".$tgl."'), 0);";
        $sql1 = 'insert into siswa values("'.$nama.'", "'.$nisn.'", '.$kelas.', "'.$tmp.'", "'.$tgl.'", "'.$nomor.'", '.$minat.', '.$ket.');';
        $sql2 = "insert into siswa_meta values(NULL, '".$nisn."', 'cetak_surat', 0);";
        $this->db->query($sql);
        $this->db->query($sql1);
        $query = $this->db->query($sql2);
        if ($query) {
            $this->response(array('status' => 'success',  200));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_put() {
        $id = $this->put('id');
        $data = array(
            'nama' => $this->put('nama'),
            'nisn'       => $this->put('nisn'),
            'kelas'   => $this->convertKelas($this->put('kelas')),
            'tempat_lhr' => $this->convertTempatLhr($this->put('ttl')),
            'tanggal_lhr' => $this->convertTanggalLhr($this->put('ttl')),
            'no_ujian' => $this->put('noujian'),
            'peminatan' => $this->convertPeminatan($this->put('peminatan'))
        );
        $this->db->where('nisn', $id);
        $update = $this->db->update('siswa', $data);
        if ($update) {
            $this->response(array('status' => 'success', $data), 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_delete() {
        $id = $this->delete('id');
        $sql = "delete user,siswa from user join siswa where `siswa`.`nisn` = `user`.`kode_login`  and `siswa`.`nisn` = ".$id;
        $delete = $this->db->query($sql);
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
?>
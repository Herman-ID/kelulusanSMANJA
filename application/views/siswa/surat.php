<div class="row">
        <div class="col-lg-6 col-md-6 con-awal con-cetak-surat fixed-con" id="cetak-surat">  
        <div class="surat-div cr">
                <h1>Cetak <br>Surat kelulusan</h1>
                <button class="btn-title" onclick="goback()">Kembali</button>
            </div>
    </div>
        <div class="col-lg-6 col-md-6 cetak-surat-con">
            <h1>Selamat anda lulus</h1>
        <p>
                              Pastikan semua data anda adalah benar, jika data anda salah silahkan merubahnya di bagian biodata diri, anda dapat mengajukan pengubahan data dengan mengklik tombol <code>salah</code>, jika ada kesalahan teknis harap segera laporkan pada petugas.
                            </p>
                            <p>
                              Surat keterangan akan didownload dalam bentuk <code>PDF</code> . Anda dapat mencetak dan mendownload dimanapun dan kapanpun hingga tanggal yang telah ditentukan, namun anda akan tetap diawasi oleh Petugas agar dapat terlaksana dengan baik.
                            </p>
                            <p>
                                Dengan Mengklik <code>Iya</code> maka anda menyetujui semua persyaratan dari panitia dan semua perangkat yang digunakan, serta anda sudah menyatakan bahwa data yang anda berikan pada halaman<code> Biodata </code>telah benar.
                              </p>
        <table class='table table-hover'> <thead>    <tr>
                              <th>#</th>
                              <th>Jenis Data</th>
                              <th>Isi Data</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th >1</th>
                              <td>Nama</td>
                              <td id="nama-siswa">data</td>
                            </tr>
                            <tr>
                              <th >2</th>
                              <td>Nomor Ujian</td>
                              <td id="nomor-siswa">data</td>
                            </tr>
                            <tr>
                              <th >3</th>
                              <td>NISN</td>
                              <td id="nisn-siswa">data</td>
                            </tr>
                            <tr>
                              <th >4</th>
                              <td>Kelas</td>
                              <td id="kelas-siswa">data</td>
                            </tr>
                            <tr>
                              <th >5</th>
                              <td>Mata Pelajaran Peminatan</td>
                              <td id="peminatan-siswa">data</td>
                            </tr>
                            <tr>
                              <th >6</th>
                              <td>Tempat, Tanggal Lahir</td>
                              <td id="lahir-siswa">data</td>
                            </tr>

                          </tbody></table>
            <div class="user-feedback__content">
<h1 class="user-feedback__title">Cetak surat?</h1>
        <button class="user-feedback__answer user-feedback__answer--yes" onclick="cetaksurat()">Iya</button>
        <button class="user-feedback__answer user-feedback__answer--no" onclick="go('biodata')">Biodata</button>

            </div>        </div>
</div>

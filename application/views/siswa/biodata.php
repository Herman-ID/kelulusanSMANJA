<div class="row">
        <div class="col-lg-6 col-md-6 con-awal con-biodata fixed-con" id="biodata">
            <div class="biodata-div cr">
                <h1>Lihat
                    <br>biodata anda</h1>
                <button class="btn-title" onclick="goback()">Kembali</button>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 cetak-surat-con">
            <p>
                Pastikan semua data anda adalah benar, jika data anda salah silahkan merubahnya di bagian biodata diri, anda dapat mengedit
                semua data pribadi anda, jika ada kesalahan teknis harap segera laporkan pada petugas.
            </p>

            <table class='table table-hover'>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Jenis Data</th>
                        <th>Isi Data</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <td>Nama</td>
                        <td id='nama-siswa'>data</td>
                    </tr>
                    <tr>
                        <th>2</th>
                        <td>Nomor Ujian</td>
                        <td id='nomor-siswa'>data</td>
                    </tr>
                    <tr>
                        <th>3</th>
                        <td>NISN</td>
                        <td id='nisn-siswa'>data</td>
                    </tr>
                    <tr>
                        <th>4</th>
                        <td>Kelas</td>
                        <td id='kelas-siswa'>data</td>
                    </tr>
                    <tr>
                        <th>5</th>
                        <td>Mata Pelajaran Peminatan</td>
                        <td id='peminatan-siswa'>data</td>
                    </tr>
                    <tr>
                        <th>6</th>
                        <td>Tempat, Tanggal Lahir</td>
                        <td id='lahir-siswa'>data</td>
                    </tr>

                </tbody>
            </table>
            <div class="user-feedback__content">
                <h1 class="user-feedback__title">Sudah benar?</h1>
                <button class="user-feedback__answer user-feedback__answer--yes" onclick="go('surat')">Iya</button>
                <button class="user-feedback__answer user-feedback__answer--no" onclick="go('biodata/edit')">Salah</button>
            </div>
        </div>
    </div>
    <div class="kc_fab_wrapper">
</div>
<div class="row">
        <div class="col-lg-6 col-md-6 con-awal con-biodata fixed-con" id="biodata">
            <div class="biodata-div cr">
                <h1>Edit
                    <br>biodata anda</h1>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 cetak-surat-con">
            <p>
                Untuk menghindari hal yang tidak diinginkan maka data tidak akan langsung diedit,
                dan harus menunggu keputusan panitia, mohon segera hubungi panitia!
            </p>
            <table class='table table-hover bio'>
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
                        <td ><input type="text" name="" id='nama-siswa'></td>
                    </tr>
                    <tr>
                        <th>2</th>
                        <td>Nomor Ujian</td>
                        <td ><input type="text" name="" id='nomor-siswa'></td>
                    </tr>
                    <tr>
                        <th>3</th>
                        <td>NISN</td>
                        <td ><input type="text" name="" id='nisn-siswa's></td>
                    </tr>
                    <tr>
                        <th>4</th>
                        <td>Kelas</td>
                        <td >
                        <select name="" id="kelas-siswa" >
                                <option value="12 IPA 1">12 IPA 1</option>
                                <option value="12 IPA 2">12 IPA 2</option>
                                <option value="12 IPA 3" >12 IPA 3</option>
                                <option value="12 IPA 4">12 IPA 4</option>
                                <option value="12 IPA 5">12 IPA 5</option>
                                <option value="12 IPS 1">12 IPS 1</option>
                                <option value="12 IPS 2">12 IPS 2</option>
                                <option value="12 IPS 3">12 IPS 3</option>
                                <option value="12 IPS 4">12 IPS 4</option>
                                <option value="12 IPS 5">12 IPS 5</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>5</th>
                        <td>Mata Pelajaran Peminatan</td>
                        <td >
                            <select name="" id="peminatan-siswa" >
                                <option value="biologi">biologi</option>
                                <option value="fisika">fisika</option>
                                <option value="kimia" >kimia</option>
                                <option value="ekonomi">ekonomi</option>
                                <option value="sosiologi">sosiologi</option>
                                <option value="geografi">geografi</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>6</th>
                        <td>Tempat, Tanggal Lahir</td>
                        <td ><input type="text" name="" id='lahir-siswa'></td>
                    </tr>

                </tbody>
            </table>
            <div class="user-feedback__content">
                <h1 class="user-feedback__title">Yakin untuk edit?</h1>
                <button class="user-feedback__answer user-feedback__answer--yes" onclick="ajukan()">Ajukan</button>
                <button class="user-feedback__answer user-feedback__answer--no" onclick="goback()">Kembali</button>
            </div>
        </div>
    </div>
    <div class="kc_fab_wrapper">
</div>
<section class="content-header">
    <h1>
        Add Quiz
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url() . 'admin/quiz' ?>">Quiz</a></li>
        <li class="active">Add Quiz</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <form class="form-horizontal" action="<?php echo base_url() . 'admin/quiz/simpan_quiz' ?>" method="post">
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-2 control-label">Judul Quiz</label>
                            <div class="col-sm-10">
                                <input type="text" name="xjudul" class="form-control" id="inputUserName" placeholder="Judul Quiz" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-2 control-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea name="xdeskripsi" class="form-control" rows="3" placeholder="Deskripsi"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-2 control-label">Kelas</label>
                            <div class="col-sm-10">
                                <select name="xkelas" class="form-control" required>
                                    <option value="">-Pilih-</option>
                                    <?php foreach ($kelas->result_array() as $k) {
                                        echo "<option value='" . $k['kelas_id'] . "'>" . $k['kelas_nama'] . "</option>";
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-2 control-label">Waktu Mulai</label>
                            <div class="col-sm-10">
                                <input type="datetime-local" name="xwaktu_mulai" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUserName" class="col-sm-2 control-label">Waktu Selesai</label>
                            <div class="col-sm-10">
                                <input type="datetime-local" name="xwaktu_selesai" class="form-control" required>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="inputUserName" class="col-sm-2 control-label">Waktu Pengerjaan (menit)</label>
                            <div class="col-sm-10">
                                <input type="number" name="xwaktu_pengerjaan" class="form-control" required>
                            </div>
                        </div>

                        <hr>

                        <h4>Soal</h4>

                        <div id="soal-container">
                            <!-- Soal akan ditambahkan di sini -->
                        </div>

                        <button type="button" class="btn btn-primary" id="add-soal">Tambah Soal</button>

                        <div class="modal-footer">
                            <a href="<?php echo base_url() . 'admin/quiz' ?>" class="btn btn-default btn-flat">Batal</a>
                            <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const soalContainer = document.getElementById('soal-container');
        const addSoalBtn = document.getElementById('add-soal');
        let soalIndex = 0;

        addSoalBtn.addEventListener('click', function() {
            const soalDiv = document.createElement('div');
            soalDiv.classList.add('soal-item');
            soalDiv.innerHTML = `
                <div class="form-group">
                    <label class="col-sm-2 control-label">Soal No. ${soalIndex + 1}</label>
                    <div class="col-sm-10">
                        <input type="text" name="xsoal[]" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Tipe Soal</label>
                    <div class="col-sm-10">
                        <select name="xtipe_soal[]" class="form-control tipe-soal" data-index="${soalIndex}">
                            <option value="pilihan_ganda">Pilihan Ganda</option>
                            <option value="essay">Essay</option>
                        </select>
                    </div>
                </div>
                <div class="jawaban-container" data-index="${soalIndex}">
                    <!-- Jawaban akan ditambahkan di sini -->
                </div>
                <hr>
            `;
            soalContainer.appendChild(soalDiv);
            addJawaban(soalIndex);
            soalIndex++;
        });

        soalContainer.addEventListener('change', function(e) {
            if (e.target.classList.contains('tipe-soal')) {
                const index = e.target.dataset.index;
                const jawabanContainer = document.querySelector(`.jawaban-container[data-index="${index}"]`);
                jawabanContainer.innerHTML = '';
                if (e.target.value === 'pilihan_ganda') {
                    addJawaban(index);
                }
            }
        });

        function addJawaban(index) {
            const jawabanContainer = document.querySelector(`.jawaban-container[data-index="${index}"]`);
            const jawabanDiv = document.createElement('div');
            jawabanDiv.innerHTML = `
                <div class="form-group">
                    <label class="col-sm-2 control-label">Jawaban</label>
                    <div class="col-sm-10">
                        <div class="jawaban-item">
                            <input type="radio" name="xis_correct[${index}]" value="0" required>
                            <input type="text" name="xjawaban[${index}][]" class="form-control">
                        </div>
                        <div class="jawaban-item">
                            <input type="radio" name="xis_correct[${index}]" value="1">
                            <input type="text" name="xjawaban[${index}][]" class="form-control">
                        </div>
                        <div class="jawaban-item">
                            <input type="radio" name="xis_correct[${index}]" value="2">
                            <input type="text" name="xjawaban[${index}][]" class="form-control">
                        </div>
                        <div class="jawaban-item">
                            <input type="radio" name="xis_correct[${index}]" value="3">
                            <input type="text" name="xjawaban[${index}][]" class="form-control">
                        </div>
                    </div>
                </div>
            `;
            jawabanContainer.appendChild(jawabanDiv);
        }
    });
</script>

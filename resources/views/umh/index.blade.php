@extends('layouts.master')
@section('judul')
@endsection
@section('judul_sub')
Nariyuki
@endsection
@section('content')

<body>
    <div class="card shadow mb-4">
        <div class="card-header py-3" style="display: flex; justify-content: space-between; align-items: center;">
            <h6 class="m-0 font-weight-bold text-primary">UMH</h6>
        </div>
        <div class="row justify-content-between" style="align-items: center;">
            <div class="form-group col-md-6" style="margin-left: 12px">
                <a href="{{ url('umh') }}" class="btn btn-success mt-3 ml-2" style="height: 40px;"><i
                        class="bi bi-arrow-clockwise" style="font-size: 20px;"></i></a>

                <!-- Button modal -->
                <button style="height: 38px; width: 45px; position: relative;" type="button"
                    class="btn btn-secondary p-0 mt-3" data-toggle="modal" data-target="#addModal">
                    <i class="bi bi-plus"
                        style="margin-top:3px; font-size: 2rem; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"></i>
                </button>

                <!-- Modal adding data -->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addModalLabel">Tambah Nariyuki</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form for adding data -->
                                <form id="addForm">
                                    @csrf
                                    <div class="form-group">
                                        <label for="addLTP_JUL">LTP JUL</label>
                                        <input type="text" class="form-control" id="addLTP_JUL" name="ltp_jul">
                                    </div>
                                    <div class="form-group">
                                        <label for="addLTP_AUG">LTP AUG</label>
                                        <input type="text" class="form-control" id="addLTP_AUG" name="ltp_aug">
                                    </div>
                                    <div class="form-group">
                                        <label for="addLTP_SEP">LTP SEP</label>
                                        <input type="text" class="form-control" id="addLTP_SEP" name="ltp_sep">
                                    </div>
                                    <div class="form-group">
                                        <label for="addLTP_OKT">LTP OKT</label>
                                        <input type="text" class="form-control" id="addLTP_OKT" name="ltp_okt">
                                    </div>
                                    <div class="form-group">
                                        <label for="addLTP_NOV">LTP NOV</label>
                                        <input type="text" class="form-control" id="addLTP_NOV" name="ltp_nov">
                                    </div>
                                    <div class="form-group">
                                        <label for="addLTP_DEC">LTP DEC</label>
                                        <input type="text" class="form-control" id="addLTP_DEC" name="ltp_dec">
                                    </div>
                                    <div class="form-group">
                                        <label for="addLTP_JAN">LTP JAN</label>
                                        <input type="text" class="form-control" id="addLTP_JAN" name="ltp_jan">
                                    </div>
                                    <div class="form-group">
                                        <label for="addLTP_FEB">LTP FEB</label>
                                        <input type="text" class="form-control" id="addLTP_FEB" name="ltp_feb">
                                    </div>
                                    <div class="form-group">
                                        <label for="addLTP_MAR">LTP MAR</label>
                                        <input type="text" class="form-control" id="addLTP_MAR" name="ltp_mar">
                                    </div>
                                    <div class="form-group">
                                        <label for="addLTP_APR">LTP APR</label>
                                        <input type="text" class="form-control" id="addLTP_APR" name="ltp_apr">
                                    </div>
                                    <div class="form-group">
                                        <label for="addLTP_MAY">LTP MAY</label>
                                        <input type="text" class="form-control" id="addLTP_MAY" name="ltp_may">
                                    </div>
                                    <div class="form-group">
                                        <label for="addLTP_JUN">LTP JUN</label>
                                        <input type="text" class="form-control" id="addLTP_JUN" name="ltp_jun">
                                    </div>

                                    <div class="form-group">
                                        <label for="addSTP_JUL">STP JUL</label>
                                        <input type="text" class="form-control" id="addSTP_JUL" name="stp_jul">
                                    </div>
                                    <div class="form-group">
                                        <label for="addSTP_AUG">STP AUG</label>
                                        <input type="text" class="form-control" id="addSTP_AUG" name="stp_aug">
                                    </div>
                                    <div class="form-group">
                                        <label for="addSTP_SEP">STP SEP</label>
                                        <input type="text" class="form-control" id="addSTP_SEP" name="stp_sep">
                                    </div>
                                    <div class="form-group">
                                        <label for="addSTP_OKT">STP OKT</label>
                                        <input type="text" class="form-control" id="addSTP_OKT" name="stp_okt">
                                    </div>
                                    <div class="form-group">
                                        <label for="addSTP_NOV">STP NOV</label>
                                        <input type="text" class="form-control" id="addSTP_NOV" name="stp_nov">
                                    </div>
                                    <div class="form-group">
                                        <label for="addSTP_DEC">STP DEC</label>
                                        <input type="text" class="form-control" id="addSTP_DEC" name="stp_dec">
                                    </div>
                                    <div class="form-group">
                                        <label for="addSTP_JAN">STP JAN</label>
                                        <input type="text" class="form-control" id="addSTP_JAN" name="stp_jan">
                                    </div>
                                    <div class="form-group">
                                        <label for="addSTP_FEB">STP FEB</label>
                                        <input type="text" class="form-control" id="addSTP_FEB" name="stp_feb">
                                    </div>
                                    <div class="form-group">
                                        <label for="addSTP_MAR">STP MAR</label>
                                        <input type="text" class="form-control" id="addSTP_MAR" name="stp_mar">
                                    </div>
                                    <div class="form-group">
                                        <label for="addSTP_APR">STP APR</label>
                                        <input type="text" class="form-control" id="addSTP_APR" name="stp_apr">
                                    </div>
                                    <div class="form-group">
                                        <label for="addSTP_MAY">STP MAY</label>
                                        <input type="text" class="form-control" id="addSTP_MAY" name="stp_may">
                                    </div>
                                    <div class="form-group">
                                        <label for="addSTP_JUN">STP JUN</label>
                                        <input type="text" class="form-control" id="addSTP_JUN" name="stp_jun">
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="addSaveButton">Save</button>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-primary mb-0 mt-3" data-toggle="modal"
                    data-target="#uploadModal">Unggah Data</button>

                <!-- Modal untuk mengunggah data -->
                <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="uploadModalLabel">Unggah Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="fileUploadForm" enctype="multipart/form-data"
                                    action="{{ route('import-excel-umh') }}" method="POST">
                                    @csrf
                                    <input type="file" id="fileInput" name="file"
                                        accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary"
                                    onclick="document.getElementById('fileUploadForm').submit()">Unggah</button>
                            </div>
                        </div>
                    </div>
                </div>

                <button id="reset-umh-button" class="btn btn-danger mt-3">Reset</button>

                <!-- Modal konfirmasi reset -->
                <div class="modal fade" id="confirmResetModal" tabindex="-1" role="dialog"
                    aria-labelledby="confirmResetModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmResetModalLabel">Reset Data</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah Anda yakin ingin reset seluruh data?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button id="confirmResetButton" type="button" class="btn btn-danger">Reset</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal pesan sukses -->
                <div class="modal fade" id="successModal" tabindex="-1" role="dialog"
                    aria-labelledby="successModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="successModalLabel">Pesan Sukses</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Data berhasil direset.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tombol Edit -->
                <button type="button" class="btn btn-warning mt-3" id="editButton" onclick="handleEditClick()"
                    disabled>Edit</button>

                <!-- Modal Edit-->
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Nariyuki</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form for editing data -->
                                <form id="editForm">
                                    <div class="form-group">
                                        <label for="editLTP_JUL">LTP JUL</label>
                                        <input type="text" class="form-control" id="editLTP_JUL" name="ltp_jul">
                                    </div>
                                    <div class="form-group">
                                        <label for="editLTP_AUG">LTP AUG</label>
                                        <input type="text" class="form-control" id="editLTP_AUG" name="ltp_aug">
                                    </div>
                                    <div class="form-group">
                                        <label for="editLTP_SEP">LTP SEP</label>
                                        <input type="text" class="form-control" id="editLTP_SEP" name="ltp_sep">
                                    </div>
                                    <div class="form-group">
                                        <label for="editLTP_OKT">LTP OKT</label>
                                        <input type="text" class="form-control" id="editLTP_OKT" name="ltp_okt">
                                    </div>
                                    <div class="form-group">
                                        <label for="editLTP_NOV">LTP NOV</label>
                                        <input type="text" class="form-control" id="editLTP_NOV" name="ltp_nov">
                                    </div>
                                    <div class="form-group">
                                        <label for="editLTP_DEC">LTP DEC</label>
                                        <input type="text" class="form-control" id="editLTP_DEC" name="ltp_dec">
                                    </div>
                                    <div class="form-group">
                                        <label for="editLTP_JAN">LTP JAN</label>
                                        <input type="text" class="form-control" id="editLTP_JAN" name="ltp_jan">
                                    </div>
                                    <div class="form-group">
                                        <label for="editLTP_FEB">LTP FEB</label>
                                        <input type="text" class="form-control" id="editLTP_FEB" name="ltp_feb">
                                    </div>
                                    <div class="form-group">
                                        <label for="editLTP_MAR">LTP MAR</label>
                                        <input type="text" class="form-control" id="editLTP_MAR" name="ltp_mar">
                                    </div>
                                    <div class="form-group">
                                        <label for="editLTP_APR">LTP APR</label>
                                        <input type="text" class="form-control" id="editLTP_APR" name="ltp_apr">
                                    </div>
                                    <div class="form-group">
                                        <label for="editLTP_MAY">LTP MAY</label>
                                        <input type="text" class="form-control" id="editLTP_MAY" name="ltp_may">
                                    </div>
                                    <div class="form-group">
                                        <label for="editLTP_JUN">LTP JUN</label>
                                        <input type="text" class="form-control" id="editLTP_JUN" name="ltp_jun">
                                    </div>

                                    <div class="form-group">
                                        <label for="editSTP_JUL">STP JUL</label>
                                        <input type="text" class="form-control" id="editSTP_JUL" name="stp_jul">
                                    </div>
                                    <div class="form-group">
                                        <label for="editSTP_AUG">STP AUG</label>
                                        <input type="text" class="form-control" id="editSTP_AUG" name="stp_aug">
                                    </div>
                                    <div class="form-group">
                                        <label for="editSTP_SEP">STP SEP</label>
                                        <input type="text" class="form-control" id="editSTP_SEP" name="stp_sep">
                                    </div>
                                    <div class="form-group">
                                        <label for="editSTP_OKT">STP OKT</label>
                                        <input type="text" class="form-control" id="editSTP_OKT" name="stp_okt">
                                    </div>
                                    <div class="form-group">
                                        <label for="editSTP_NOV">STP NOV</label>
                                        <input type="text" class="form-control" id="editSTP_NOV" name="stp_nov">
                                    </div>
                                    <div class="form-group">
                                        <label for="editSTP_DEC">STP DEC</label>
                                        <input type="text" class="form-control" id="editSTP_DEC" name="stp_dec">
                                    </div>
                                    <div class="form-group">
                                        <label for="editSTP_JAN">STP JAN</label>
                                        <input type="text" class="form-control" id="editSTP_JAN" name="stp_jan">
                                    </div>
                                    <div class="form-group">
                                        <label for="editSTP_FEB">STP FEB</label>
                                        <input type="text" class="form-control" id="editSTP_FEB" name="stp_feb">
                                    </div>
                                    <div class="form-group">
                                        <label for="editSTP_MAR">STP MAR</label>
                                        <input type="text" class="form-control" id="editSTP_MAR" name="stp_mar">
                                    </div>
                                    <div class="form-group">
                                        <label for="editSTP_APR">STP APR</label>
                                        <input type="text" class="form-control" id="editSTP_APR" name="stp_apr">
                                    </div>
                                    <div class="form-group">
                                        <label for="editSTP_MAY">STP MAY</label>
                                        <input type="text" class="form-control" id="editSTP_MAY" name="stp_may">
                                    </div>
                                    <div class="form-group">
                                        <label for="editSTP_JUN">STP JUN</label>
                                        <input type="text" class="form-control" id="editSTP_JUN" name="stp_jun">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="saveChanges()">Save
                                    Changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tombol Hapus -->
                <button type="button" class="btn btn-danger mt-3" id="deleteButton" onclick="handleDeleteClick()"
                    disabled>Hapus</button>
            </div>
            <div class="input-group col-md-3 mr-4">
                <input type="text" name="search" style="height: 2.4rem; font-size: 12pt; margin-top: 0.10rem;"
                    id="searchp" class="form-control input-text" placeholder="Cari disini ..."
                    aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div>
        </div>

        <div class="card-body pt-0">
            <div class="table-responsive">
                <table class="table table-striped" id="umhTableBody">
                    <thead style="background-color: #263a74; color:white; position: sticky; top: 0;">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">No</th>
                            <th scope="col">LTP JUL</th>
                            <th scope="col">LTP AUG</th>
                            <th scope="col">LTP SEP</th>
                            <th scope="col">LTP OKT</th>
                            <th scope="col">LTP NOV</th>
                            <th scope="col">LTP DEC</th>
                            <th scope="col">LTP JAN</th>
                            <th scope="col">LTP FEB</th>
                            <th scope="col">LTP MAR</th>
                            <th scope="col">LTP APR</th>
                            <th scope="col">LTP MAY</th>
                            <th scope="col">LTP JUN</th>

                            <th scope="col" style="background-color: green; color: white;">STP JUL</th>
                            <th scope="col" style="background-color: green; color: white;">STP AUG</th>
                            <th scope="col" style="background-color: green; color: white;">STP SEP</th>
                            <th scope="col" style="background-color: green; color: white;">STP OKT</th>
                            <th scope="col" style="background-color: green; color: white;">STP NOV</th>
                            <th scope="col" style="background-color: green; color: white;">STP DEC</th>
                            <th scope="col" style="background-color: green; color: white;">STP JAN</th>
                            <th scope="col" style="background-color: green; color: white;">STP FEB</th>
                            <th scope="col" style="background-color: green; color: white;">STP MAR</th>
                            <th scope="col" style="background-color: green; color: white;">STP APR</th>
                            <th scope="col" style="background-color: green; color: white;">STP MAY</th>
                            <th scope="col" style="background-color: green; color: white;">STP JUN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1 ?>
                        @foreach ($umh as $u)
                        <tr id="tr_{{ $u->id }}">
                            <td><input type="checkbox" class="sub_chk" data-id="{{$u->id}}"
                                    onclick="handleCheckboxChange({{ $u->id }})"></td>
                            <td>{{$no++}}</td>
                            <td>{{ number_format($u->ltp_jul, 2) }}</td>
                            <td>{{ number_format($u->ltp_aug, 2) }}</td>
                            <td>{{ number_format($u->ltp_sep, 2) }}</td>
                            <td>{{ number_format($u->ltp_okt, 2) }}</td>
                            <td>{{ number_format($u->ltp_nov, 2) }}</td>
                            <td>{{ number_format($u->ltp_dec, 2) }}</td>
                            <td>{{ number_format($u->ltp_jan, 2) }}</td>
                            <td>{{ number_format($u->ltp_feb, 2) }}</td>
                            <td>{{ number_format($u->ltp_mar, 2) }}</td>
                            <td>{{ number_format($u->ltp_apr, 2) }}</td>
                            <td>{{ number_format($u->ltp_may, 2) }}</td>
                            <td>{{ number_format($u->ltp_jun, 2) }}</td>

                            <td>{{ number_format($u->stp_jul, 2) }}</td>
                            <td>{{ number_format($u->stp_aug, 2) }}</td>
                            <td>{{ number_format($u->stp_sep, 2) }}</td>
                            <td>{{ number_format($u->stp_okt, 2) }}</td>
                            <td>{{ number_format($u->stp_nov, 2) }}</td>
                            <td>{{ number_format($u->stp_dec, 2) }}</td>
                            <td>{{ number_format($u->stp_jan, 2) }}</td>
                            <td>{{ number_format($u->stp_feb, 2) }}</td>
                            <td>{{ number_format($u->stp_mar, 2) }}</td>
                            <td>{{ number_format($u->stp_apr, 2) }}</td>
                            <td>{{ number_format($u->stp_may, 2) }}</td>
                            <td>{{ number_format($u->stp_jun, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <br>{!! $umh->links() !!}
        </div>
    </div>
</body>

<script>
    $(document).ready(function () {
        function calculateNewAmount() {
            var LTP_JUL = parseFloat($('#addLTP_JUL').val());
            var LTP_AUG = parseFloat($('#addLTP_AUG').val());
            var LTP_SEP = parseFloat($('#addLTP_SEP').val());
            var LTP_OKT = parseFloat($('#addLTP_OKT').val());
            var LTP_NOV = parseFloat($('#addLTP_NOV').val());
            var LTP_DEC = parseFloat($('#addLTP_DEC').val());
            var LTP_JAN = parseFloat($('#addLTP_JAN').val());
            var LTP_FEB = parseFloat($('#addLTP_FEB').val());
            var LTP_MAR = parseFloat($('#addLTP_MAR').val());
            var LTP_APR = parseFloat($('#addLTP_APR').val());
            var LTP_MAY = parseFloat($('#addLTP_MAY').val());
            var LTP_JUN = parseFloat($('#addLTP_JUN').val());

            var STP_JUL = parseFloat($('#addSTP_JUL').val());
            var STP_AUG = parseFloat($('#addSTP_AUG').val());
            var STP_SEP = parseFloat($('#addSTP_SEP').val());
            var STP_OKT = parseFloat($('#addSTP_OKT').val());
            var STP_NOV = parseFloat($('#addSTP_NOV').val());
            var STP_DEC = parseFloat($('#addSTP_DEC').val());
            var STP_JAN = parseFloat($('#addSTP_JAN').val());
            var STP_FEB = parseFloat($('#addSTP_FEB').val());
            var STP_MAR = parseFloat($('#addSTP_MAR').val());
            var STP_APR = parseFloat($('#addSTP_APR').val());
            var STP_MAY = parseFloat($('#addSTP_MAY').val());
            var STP_JUN = parseFloat($('#addSTP_JUN').val());
        }
    
        $('#addSaveButton').click(function () {
            $.ajax({
                type: 'POST',
                url: '{{ url('add-umh') }}',
                data: $('#addForm').serialize(),
                success: function (response) {
                    console.log(response);
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Berhasil Menambahkan Data',
                    }).then(function () {
                        location.reload();
                    });
                },
                error: function (error) {
                    console.log(error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Tidak Berhasil Menambahkan Data',
                    });
                }
            });
        });
    });
    
</script>

<script>
    // Fungsi untuk mengirim permintaan pencarian ke server dan mengganti konten tabel
    function searchUMH() {
        const selected = document.getElementById('searchp').value;
    
        fetch(`{{ route('search.umh') }}?umh=${selected}`)
            .then(response => response.text())
            .then(data => {
                document.getElementById('umhTableBody').innerHTML = data;
            });
    }

    // Menambahkan event listener untuk input pencarian
    document.getElementById('searchp').addEventListener('input', function() {
    searchUMH();
    });

    // Fungsi yang akan dipanggil ketika checkbox berubah
    function handleCheckboxChange(id) {
        // Tambahkan logika yang sesuai untuk menangani perubahan checkbox di sini
        console.log('Checkbox with ID ' + id + ' changed.');
    }
</script>

<script>
    // JavaScript to handle checkbox change
    function handleCheckboxChange() {
        const selectedCheckboxes = document.querySelectorAll('.sub_chk:checked');
        const editButton = document.querySelector('#editButton');
        const deleteButton = document.querySelector('#deleteButton'); // Tambahkan tombol Hapus
      
        if (selectedCheckboxes.length === 1) {
          editButton.removeAttribute('disabled');
          deleteButton.removeAttribute('disabled');
        } else if (selectedCheckboxes.length > 0){
            deleteButton.removeAttribute('disabled'); // Aktifkan tombol Hapus jika satu checkbox terpilih
        }else if (selectedCheckboxes.length === 0) {
          editButton.setAttribute('disabled', 'true');
          deleteButton.setAttribute('disabled', 'true'); // Nonaktifkan tombol Hapus jika tidak ada checkbox terpilih
        } else {
          editButton.setAttribute('disabled', 'true');
          deleteButton.setAttribute('disabled', 'true'); // Nonaktifkan tombol Hapus jika lebih dari satu checkbox terpilih
        }
    }
      
    function handleDeleteClick() {
        const selectedCheckboxes = document.querySelectorAll('.sub_chk:checked');
        const selectedIds = Array.from(selectedCheckboxes).map(checkbox => checkbox.getAttribute('data-id'));
      
        if (selectedIds.length > 0) {
          Swal.fire({
            title: 'Konfirmasi Hapus',
            text: 'Apakah Anda yakin ingin menghapus data yang dipilih?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal'
          }).then((result) => {
            if (result.isConfirmed) {
              // Lakukan penghapusan data dengan AJAX
              $.ajax({
                url: '{{ url('delete-umh') }}',
                method: 'POST',
                data: {
                  _token: '{{ csrf_token() }}',
                  ids: selectedIds, // Kirim array ID yang akan dihapus
                  _method: 'DELETE' // Tambahkan _method dengan nilai 'DELETE' untuk metode DELETE
                },
                success: function (response) {
                  console.log(response);
      
                  Swal.fire({
                    icon: 'success',
                    title: 'Data berhasil dihapus!',
                    showConfirmButton: false,
                    timer: 1500
                  });
      
                  setTimeout(function () {
                    window.location.href = '{{ url('umh') }}';
                  }, 2000);
                },
                error: function (error) {
                  console.log(error);
                  Swal.fire({
                    icon: 'error',
                    title: 'Terjadi kesalahan!',
                    text: 'Data tidak dapat dihapus.'
                  });
                }
              });
            }
          });
        }
    }
      
    // JavaScript to open the modal and populate data for editing
    function handleEditClick() {
      const selectedCheckboxes = document.querySelectorAll('.sub_chk:checked');
      const editModal = document.querySelector('#editModal');
      const editForm = document.querySelector('#editForm');
    
      if (selectedCheckboxes.length === 1) {
        const selectedId = selectedCheckboxes[0].getAttribute('data-id');
        const ltp_jul = document.querySelector(`#tr_${selectedId} td:nth-child(3)`).textContent;
        const ltp_aug = document.querySelector(`#tr_${selectedId} td:nth-child(4)`).textContent;
        const ltp_sep = document.querySelector(`#tr_${selectedId} td:nth-child(5)`).textContent;
        const ltp_okt = document.querySelector(`#tr_${selectedId} td:nth-child(6)`).textContent;
        const ltp_nov = document.querySelector(`#tr_${selectedId} td:nth-child(7)`).textContent;
        const ltp_dec = document.querySelector(`#tr_${selectedId} td:nth-child(8)`).textContent;
        const ltp_jan = document.querySelector(`#tr_${selectedId} td:nth-child(9)`).textContent;
        const ltp_feb = document.querySelector(`#tr_${selectedId} td:nth-child(10)`).textContent;
        const ltp_mar = document.querySelector(`#tr_${selectedId} td:nth-child(11)`).textContent;
        const ltp_apr = document.querySelector(`#tr_${selectedId} td:nth-child(12)`).textContent;
        const ltp_may = document.querySelector(`#tr_${selectedId} td:nth-child(13)`).textContent;
        const ltp_jun = document.querySelector(`#tr_${selectedId} td:nth-child(14)`).textContent;

        const stp_jul = document.querySelector(`#tr_${selectedId} td:nth-child(15)`).textContent;
        const stp_aug = document.querySelector(`#tr_${selectedId} td:nth-child(16)`).textContent;
        const stp_sep = document.querySelector(`#tr_${selectedId} td:nth-child(17)`).textContent;
        const stp_okt = document.querySelector(`#tr_${selectedId} td:nth-child(18)`).textContent;
        const stp_nov = document.querySelector(`#tr_${selectedId} td:nth-child(19)`).textContent;
        const stp_dec = document.querySelector(`#tr_${selectedId} td:nth-child(20)`).textContent;
        const stp_jan = document.querySelector(`#tr_${selectedId} td:nth-child(21)`).textContent;
        const stp_feb = document.querySelector(`#tr_${selectedId} td:nth-child(22)`).textContent;
        const stp_mar = document.querySelector(`#tr_${selectedId} td:nth-child(23)`).textContent;
        const stp_apr = document.querySelector(`#tr_${selectedId} td:nth-child(24)`).textContent;
        const stp_may = document.querySelector(`#tr_${selectedId} td:nth-child(25)`).textContent;
        const stp_jun = document.querySelector(`#tr_${selectedId} td:nth-child(26)`).textContent;

        document.querySelector('#editLTP_JUL').value = ltp_jul;
        document.querySelector('#editLTP_AUG').value = ltp_aug;
        document.querySelector('#editLTP_SEP').value = ltp_sep;
        document.querySelector('#editLTP_OKT').value = ltp_okt;
        document.querySelector('#editLTP_NOV').value = ltp_nov;
        document.querySelector('#editLTP_DEC').value = ltp_dec;
        document.querySelector('#editLTP_JAN').value = ltp_jan;
        document.querySelector('#editLTP_FEB').value = ltp_feb;
        document.querySelector('#editLTP_MAR').value = ltp_mar;
        document.querySelector('#editLTP_APR').value = ltp_apr;
        document.querySelector('#editLTP_MAY').value = ltp_may;
        document.querySelector('#editLTP_JUN').value = ltp_jun;


        document.querySelector('#editSTP_JUL').value = stp_jul;
        document.querySelector('#editSTP_AUG').value = stp_aug;
        document.querySelector('#editSTP_SEP').value = stp_sep;
        document.querySelector('#editSTP_OKT').value = stp_okt;
        document.querySelector('#editSTP_NOV').value = stp_nov;
        document.querySelector('#editSTP_DEC').value = stp_dec;
        document.querySelector('#editSTP_JAN').value = stp_jan;
        document.querySelector('#editSTP_FEB').value = stp_feb;
        document.querySelector('#editSTP_MAR').value = stp_mar;
        document.querySelector('#editSTP_APR').value = stp_apr;
        document.querySelector('#editSTP_MAY').value = stp_may;
        document.querySelector('#editSTP_JUN').value = stp_jun;

        $(editModal).modal('show');
        }
    }

    function saveChanges() {
        const ltp_jul = document.querySelector('#editLTP_JUL').value;
        const ltp_aug = document.querySelector('#editLTP_AUG').value;
        const ltp_sep = document.querySelector('#editLTP_SEP').value;
        const ltp_okt = document.querySelector('#editLTP_OKT').value;
        const ltp_nov = document.querySelector('#editLTP_NOV').value;
        const ltp_dec = document.querySelector('#editLTP_DEC').value;
        const ltp_jan = document.querySelector('#editLTP_JAN').value;
        const ltp_feb = document.querySelector('#editLTP_FEB').value;
        const ltp_mar = document.querySelector('#editLTP_MAR').value;
        const ltp_apr = document.querySelector('#editLTP_APR').value;
        const ltp_may = document.querySelector('#editLTP_MAY').value;
        const ltp_jun = document.querySelector('#editLTP_JUN').value;

        const stp_jul = document.querySelector('#editSTP_JUL').value;
        const stp_aug = document.querySelector('#editSTP_AUG').value;
        const stp_sep = document.querySelector('#editSTP_SEP').value;
        const stp_okt = document.querySelector('#editSTP_OKT').value;
        const stp_nov = document.querySelector('#editSTP_NOV').value;
        const stp_dec = document.querySelector('#editSTP_DEC').value;
        const stp_jan = document.querySelector('#editSTP_JAN').value;
        const stp_feb = document.querySelector('#editSTP_FEB').value;
        const stp_mar = document.querySelector('#editSTP_MAR').value;
        const stp_apr = document.querySelector('#editSTP_APR').value;
        const stp_may = document.querySelector('#editSTP_MAY').value;
        const stp_jun = document.querySelector('#editSTP_JUN').value;

        const selectedCheckboxes = document.querySelectorAll('.sub_chk:checked');
    
        if (selectedCheckboxes.length === 1) {
            const selectedId = selectedCheckboxes[0].getAttribute('data-id');
    
            $.ajax({
                url: '{{ url('update-umh') }}/' + selectedId,
                method: 'POST',
                data: {
                    ltp_jul: ltp_jul,
                    ltp_aug: ltp_aug,
                    ltp_sep: ltp_sep,
                    ltp_okt: ltp_okt,
                    ltp_nov: ltp_nov,
                    ltp_dec: ltp_dec,
                    ltp_jan: ltp_jan,
                    ltp_feb: ltp_feb,
                    ltp_mar: ltp_mar,
                    ltp_apr: ltp_apr,
                    ltp_may: ltp_may,
                    ltp_jun: ltp_jun,

                    stp_jul: stp_jul,
                    stp_aug: stp_aug,
                    stp_sep: stp_sep,
                    stp_okt: stp_okt,
                    stp_nov: stp_nov,
                    stp_dec: stp_dec,
                    stp_jan: stp_jan,
                    stp_feb: stp_feb,
                    stp_mar: stp_mar,
                    stp_apr: stp_apr,
                    stp_may: stp_may,
                    stp_jun: stp_jun,
                    _token: '{{ csrf_token() }}',
                },
                success: function (response) {
                    console.log(response);
    
                    Swal.fire({
                        icon: 'success',
                        title: 'Data berhasil diperbarui!',
                        showConfirmButton: false,
                        timer: 1500
                    });
    
                    setTimeout(function () {
                        window.location.href = '{{ url('umh') }}/';
                    }, 2000);
                },
                error: function (error) {
                    console.log(error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi kesalahan!',
                        text: 'Data tidak dapat diperbarui.'
                    });
                }
            });
        }
    }
</script>

<script>
    document.getElementById('reset-umh-button').addEventListener('click', function () {
        $('#confirmResetModal').modal('show');
    });

    document.getElementById('confirmResetButton').addEventListener('click', function () {
        // Tutup modal konfirmasi
        $('#confirmResetModal').modal('hide');

        // Kirim permintaan ke rute 'reset_umh' menggunakan fetch
        fetch('{{ route('reset_umh') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Tampilkan modal pesan sukses
                $('#successModal').modal('show');
                location.reload();
            } else {
                alert('Terjadi kesalahan.'); // Menampilkan pesan kesalahan jika ada
            }
        })
        .catch(error => {
            console.error(error);
        });
    });
</script>

@endsection
@extends('layouts.master')
@section('judul')
@endsection
@section('judul_sub')
UMH
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
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah Anda yakin ingin reset seluruh data?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
                                <h5 class="modal-title" id="editModalLabel">Edit UMH</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form for editing data -->
                                <form id="editForm">
                                    <div class="form-group">
                                        <label for="editMonth">Month</label>
                                        <input type="text" class="form-control" id="editMonth" name="month">
                                    </div>
                                    <div class="form-group">
                                        <label for="editUMH">UMH</label>
                                        <input type="text" class="form-control" id="editUMH" name="umh">
                                    </div>
                                    <div class="form-group">
                                        <label for="editAmount">Amount</label>
                                        <input type="text" class="form-control" id="editAmount" name="amount">
                                    </div>
                                    <div class="form-group">
                                        <label for="editNewUMH">New UMH</label>
                                        <input type="text" class="form-control" id="editNewUMH" name="new_umh">
                                    </div>
                                    <div class="form-group">
                                        <label for="editNewAmount">New Amount</label>
                                        <input type="text" class="form-control" id="editNewAmount" name="new_amount">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="saveChanges()">Save
                                    Changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tombol Hapus -->
                <button type="button" class="btn btn-danger mt-3" id="deleteButton" onclick="handleDeleteClick()"
                    disabled>Hapus</button>

                <!-- Tombol Tambah-->
                <button type="button" class="btn btn-success mb-0 mt-3" data-toggle="modal" data-target="#addModal">Tambah Data</button>

                <!-- Modal Tambah-->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addModalLabel">Tambah UMH</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form for adding data -->
                                <form id="addForm">
                                    <div class="form-group">
                                        <label for="addMonth">Month</label>
                                        <input type="text" class="form-control" id="addMonth" name="month">
                                    </div>
                                    <div class="form-group">
                                        <label for="addUMH">UMH</label>
                                        <input type="text" class="form-control" id="addUMH" name="umh">
                                    </div>
                                    <div class="form-group">
                                        <label for="addAmount">Amount</label>
                                        <input type="text" class="form-control" id="addAmount" name="amount">
                                    </div>
                                    <div class="form-group">
                                        <label for="addNewUMH">New UMH</label>
                                        <input type="text" class="form-control" id="addNewUMH" name="new_umh">
                                    </div>
                                    <div class="form-group">
                                        <label for="addNewAmount">New Amount</label>
                                        <input type="text" class="form-control" id="addNewAmount" name="new_amount">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="addSaveButton" onclick="saveChanges()">Save</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="input-group col-md-4 mr-4">
                {{-- <input type="text" class="form-control" aria-label="Text input with dropdown button">
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <select class="form-select" id="dropdown-select">
                            @foreach($umh->unique('name') as $item)
                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </ul>
                </div> --}}

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
                            <th scope="col">Month</th>
                            <th scope="col">Umh</th>
                            <th scope="col">Amount</th>
                            <th scope="col">New Umh</th>
                            <th scope="col">New Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1 ?>
                        @foreach ($umh as $u)
                        <tr id="tr_{{ $u->id }}">
                            <td><input type="checkbox" class="sub_chk" data-id="{{$u->id}}"
                                    onclick="handleCheckboxChange({{ $u->id }})"></td>
                            <td>{{$no++}}</td>
                            <td>{{ $u->month }}</td>
                            <td>{{ $u->umh }}</td>
                            <td>{{ $u->amount }}</td>
                            <td>{{ $u->new_umh }}</td>
                            <td>{{ $u->new_amount }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <br>{!! $umh->links() !!}
        </div>
    </div>
</body>

<!-- Tambahkan script berikut di bawah elemen HTML Anda -->

<script>
    function handleAddClick() {
        // Bersihkan formulir jika ada data sebelumnya
        document.querySelector('#addForm').reset();
    
        // Tampilkan modal tambah data
        $('#addModal').modal('show');
    }
    
    function saveChanges() {
        // Ambil nilai dari formulir
        const month = document.querySelector('#addMonth').value;
        const umh = document.querySelector('#addUMH').value;
        const amount = document.querySelector('#addAmount').value;
        const newUMH = document.querySelector('#addNewUMH').value;
        const newAmount = document.querySelector('#addNewAmount').value;
    
        // Kirim data ke server melalui AJAX
        $.ajax({
            url: '/store',  // Gantilah dengan URL yang sesuai
            method: 'POST',
            data: {
                month: month,
                umh: umh,
                amount: amount,
                new_umh: newUMH,
                new_amount: newAmount,
                _token: '{{ csrf_token() }}', // Ini digunakan untuk melindungi dari serangan CSRF
            },
            success: function (response) {
                // Data berhasil disimpan, tutup modal
                $('#addModal').modal('hide');
    
                // Lakukan tindakan lain jika diperlukan, seperti memuat ulang halaman
                location.reload();
            },
            error: function (error) {
                // Terjadi kesalahan, tampilkan pesan kesalahan jika diperlukan
                console.log(error);
            }
        });
    }
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
        const month = document.querySelector(`#tr_${selectedId} td:nth-child(3)`).textContent;
        const umh = document.querySelector(`#tr_${selectedId} td:nth-child(4)`).textContent;
        const amount = document.querySelector(`#tr_${selectedId} td:nth-child(5)`).textContent;
        const new_umh = document.querySelector(`#tr_${selectedId} td:nth-child(6)`).textContent;
        const new_amount = document.querySelector(`#tr_${selectedId} td:nth-child(7)`).textContent;

        document.querySelector('#editMonth').value = month;
        document.querySelector('#editUMH').value = umh;
        document.querySelector('#editAmount').value = amount;
        document.querySelector('#editNewUMH').value = new_umh;

        const editNewUMH = document.querySelector('#editNewUMH');
        const editNewAmount = document.querySelector('#editNewAmount');

        editNewUMH.addEventListener('input', function() {
        const new_umh_value = parseFloat(editNewUMH.value);
        const umh_value = parseFloat(document.querySelector('#editUMH').value);
        const amount_value = parseFloat(document.querySelector('#editAmount').value);

        if (!isNaN(new_umh_value) && !isNaN(umh_value) && !isNaN(amount_value)) {
            const new_amount_value = new_umh_value * amount_value / umh_value;
            editNewAmount.value = new_amount_value.toFixed(4);
        } else {
            editNewAmount.value = '';
        }
    });

        $(editModal).modal('show');
      }
    }
    function saveChanges() {
        const month = document.querySelector('#editMonth').value;
        const umh = document.querySelector('#editUMH').value;
        const amount = document.querySelector('#editAmount').value;
        const new_umh = document.querySelector('#editNewUMH').value;
        const new_amount = document.querySelector('#editNewAmount').value;

        const selectedCheckboxes = document.querySelectorAll('.sub_chk:checked');
    
        if (selectedCheckboxes.length === 1) {
            const selectedId = selectedCheckboxes[0].getAttribute('data-id');
    
            $.ajax({
                url: '{{ url('update-umh') }}/' + selectedId,
                method: 'POST',
                data: {
                    month: month,
                    umh: umh,
                    amount: amount,
                    new_umh: new_umh,
                    new_amount: new_amount,
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
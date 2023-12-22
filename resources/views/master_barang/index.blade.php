@extends('layouts.master')
@section('judul')
@endsection
@section('judul_sub')
Master Barang
@endsection
@section('content')

<body>
    <div class="card shadow mb-4">
        <div class="card-header py-3" style="display: flex; justify-content: space-between; align-items: center;">
            <h6 class="m-0 font-weight-bold text-primary">Master Barang</h6>
        </div>
        <div class="row justify-content-between" style="align-items: center;">
            <div class="form-group col-md-8" style="margin-left: 12px">
                <a href="{{ url('master_barang') }}" class="btn btn-success mt-3 ml-2" style="height: 40px;"><i
                        class="bi bi-arrow-clockwise" style="font-size: 20px;"></i></a>

                @if (Auth::user()->role === "Admin")
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
                                <h5 class="modal-title" id="addModalLabel">Tambah Master Barang</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form for adding data -->
                                <form id="addForm">
                                    @csrf
                                    <div class="form-group">
                                        <label for="addCode">Code</label>
                                        <input type="text" class="form-control" id="addCode" name="code">
                                    </div>
                                    <div class="form-group">
                                        <label for="addName">Name</label>
                                        <input type="text" class="form-control" id="addName" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="addSatuan">Satuan</label>
                                        <input type="text" class="form-control" id="addSatuan" name="satuan">
                                    </div>
                                    <div class="form-group">
                                        <label for="addAccount_1">Account_1</label>
                                        <input type="text" class="form-control" id="addAccount_1" name="account_1">
                                    </div>
                                    <div class="form-group">
                                        <label for="addAccount_2">Account_2</label>
                                        <input type="text" class="form-control" id="addAccount_2" name="account_2">
                                    </div>
                                    <div class="form-group">
                                        <label for="addAccount_3">Account_3</label>
                                        <input type="text" class="form-control" id="addAccount_3" name="account_3">
                                    </div>
                                    <div class="form-group">
                                        <label for="addAccount_4">Account_4</label>
                                        <input type="text" class="form-control" id="addAccount_4" name="account_4">
                                    </div>
                                    <div class="form-group">
                                        <label for="addAccount_5">Account_5</label>
                                        <input type="text" class="form-control" id="addAccount_5" name="account_5">
                                    </div>
                                    <div class="form-group">
                                        <label for="addAccount_6">Account_6</label>
                                        <input type="text" class="form-control" id="addAccount_6" name="account_6">
                                    </div>
                                    <div class="form-group">
                                        <label for="addAccount_7">Account_7</label>
                                        <input type="text" class="form-control" id="addAccount_7" name="account_7">
                                    </div>
                                    <div class="form-group">
                                        <label for="addAccount_8">Account_8</label>
                                        <input type="text" class="form-control" id="addAccount_8" name="account_8">
                                    </div>
                                    <div class="form-group">
                                        <label for="addAccount_9">Account_9</label>
                                        <input type="text" class="form-control" id="addAccount_9" name="account_9">
                                    </div>
                                    <div class="form-group">
                                        <label for="addAccount_10">Account_10</label>
                                        <input type="text" class="form-control" id="addAccount_10" name="account_10">
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
                {{-- <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog"
                    aria-labelledby="uploadModalLabel" aria-hidden="true">
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
                                    action="{{ route('import-excel-mb') }}" method="POST">
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
                </div> --}}
                <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form id="fileUploadForm" enctype="multipart/form-data"
                                action="{{ route('import-excel-mb') }}" method="POST">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="uploadModalLabel">Unggah Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {{-- <form id="fileUploadForm" enctype="multipart/form-data" --}} {{--
                                        action="{{ route('import-excel-home') }}" method="POST"> --}}
                                        @csrf

                                        <input type="file" id="fileInput" name="file"
                                            accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                                        {{--
                                    </form> --}}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Unggah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <button id="reset-mb-button" class="btn btn-danger mt-3">Reset</button>

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

                <!-- Tombol Hapus -->
                <button type="button" class="btn btn-danger mt-3" id="deleteButton" onclick="handleDeleteClick()"
                    disabled>Hapus</button>

                <!-- Modal Edit-->
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Master Barang</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form for editing data -->
                                <form id="editForm">
                                    <div class="form-group">
                                        <label for="editCode">Code</label>
                                        <input type="text" class="form-control" id="editCode" name="code">
                                    </div>
                                    <div class="form-group">
                                        <label for="editName">Name</label>
                                        <input type="text" class="form-control" id="editName" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="editSatuan">Satuan</label>
                                        <input type="text" class="form-control" id="editSatuan" name="satuan">
                                    </div>
                                    <div class="form-group">
                                        <label for="editAccount_1">Account_1</label>
                                        <input type="text" class="form-control" id="editAccount_1" name="account_1">
                                    </div>
                                    <div class="form-group">
                                        <label for="editAccount_2">Account_2</label>
                                        <input type="text" class="form-control" id="editAccount_2" name="account_2">
                                    </div>
                                    <div class="form-group">
                                        <label for="editAccount_3">Account_3</label>
                                        <input type="text" class="form-control" id="editAccount_3" name="account_3">
                                    </div>
                                    <div class="form-group">
                                        <label for="editAccount_4">Account_4</label>
                                        <input type="text" class="form-control" id="editAccount_4" name="account_4">
                                    </div>
                                    <div class="form-group">
                                        <label for="editAccount_5">Account_5</label>
                                        <input type="text" class="form-control" id="editAccount_5" name="account_5">
                                    </div>
                                    <div class="form-group">
                                        <label for="editAccount_6">Account_6</label>
                                        <input type="text" class="form-control" id="editAccount_6" name="account_6">
                                    </div>
                                    <div class="form-group">
                                        <label for="editAccount_7">Account_7</label>
                                        <input type="text" class="form-control" id="editAccount_7" name="account_7">
                                    </div>
                                    <div class="form-group">
                                        <label for="editAccount_8">Account_8</label>
                                        <input type="text" class="form-control" id="editAccount_8" name="account_8">
                                    </div>
                                    <div class="form-group">
                                        <label for="editAccount_9">Account_9</label>
                                        <input type="text" class="form-control" id="editAccount_9" name="account_9">
                                    </div>
                                    <div class="form-group">
                                        <label for="editAccount_10">Account_10</label>
                                        <input type="text" class="form-control" id="editAccount_10" name="account_10">
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
                @endif
                <a href="{{ url('export_excel_mb') }}" class="btn btn-info mt-3" style="height: 40px;">Download</a>

            </div>
            <div class="input-group col-md-3 mr-4">
                <input type="text" name="search" style="height: 2.4rem; font-size: 12pt; margin-top: 0.10rem;"
                    id="searchp" class="form-control input-text" placeholder="Cari disini ..."
                    aria-label="Recipient's username" aria-describedby="basic-addon2">

            </div>
        </div>

        <div class="card-body pt-0">
            <div class="table-responsive">
                <table class="table table-striped" id="mbTableBody">
                    <thead style="background-color: #263a74; color:white; position: sticky; top: 0;">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">No</th>
                            <th scope="col">Code</th>
                            <th scope="col">Name</th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Account_1</th>
                            <th scope="col">Account_2</th>
                            <th scope="col">Account_3</th>
                            <th scope="col">Account_4</th>
                            <th scope="col">Account_5</th>
                            <th scope="col">Account_6</th>
                            <th scope="col">Account_7</th>
                            <th scope="col">Account_8</th>
                            <th scope="col">Account_9</th>
                            <th scope="col">Account_10</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1 ?>
                        @foreach ($master_barang as $mb)
                        <tr id="tr_{{ $mb->id }}">
                            <td><input type="checkbox" class="sub_chk" data-id="{{$mb->id}}"
                                    onclick="handleCheckboxChange({{ $mb->id }})"></td>
                            <td>{{$no++}}</td>
                            <td>{{ $mb->code }}</td>
                            <td>{{ $mb->name }}</td>
                            <td>{{ $mb->satuan }}</td>
                            <td>{{ $mb->account_1 }}</td>
                            <td>{{ $mb->account_2 }}</td>
                            <td>{{ $mb->account_3 }}</td>
                            <td>{{ $mb->account_4 }}</td>
                            <td>{{ $mb->account_5 }}</td>
                            <td>{{ $mb->account_6 }}</td>
                            <td>{{ $mb->account_7 }}</td>
                            <td>{{ $mb->account_8 }}</td>
                            <td>{{ $mb->account_9 }}</td>
                            <td>{{ $mb->account_10 }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <br>{!! $master_barang->links() !!}
        </div>
    </div>
</body>

<script>
    $(document).ready(function () {
        // Click event for the Save button
        $('#addSaveButton').click(function () {
            // Assuming you are using jQuery
            $.ajax({
                type: 'POST',
                url: '{{ url('add-mb') }}', // Replace with your actual route
                data: $('#addForm').serialize(),
                success: function (response) {
                    console.log(response);

                    // Display a SweetAlert after successful submission
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

                    // Display a SweetAlert after successful submission
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
    function searchMB() {
        const selected = document.getElementById('searchp').value;
    
        fetch(`{{ route('search.master_barang') }}?master_barang=${selected}`)
            .then(response => response.text())
            .then(data => {
                document.getElementById('mbTableBody').innerHTML = data;
            });
    }

    // Menambahkan event listener untuk input pencarian
document.getElementById('searchp').addEventListener('input', function() {
    searchMB();
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
                url: '{{ url('delete-mb') }}',
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
                    window.location.href = '{{ url('master_barang') }}';
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
        const code = document.querySelector(`#tr_${selectedId} td:nth-child(3)`).textContent;
        const name = document.querySelector(`#tr_${selectedId} td:nth-child(4)`).textContent;
        const satuan = document.querySelector(`#tr_${selectedId} td:nth-child(5)`).textContent;
        const account_1 = document.querySelector(`#tr_${selectedId} td:nth-child(6)`).textContent;
        const account_2 = document.querySelector(`#tr_${selectedId} td:nth-child(7)`).textContent;
        const account_3 = document.querySelector(`#tr_${selectedId} td:nth-child(8)`).textContent;
        const account_4 = document.querySelector(`#tr_${selectedId} td:nth-child(9)`).textContent;
        const account_5 = document.querySelector(`#tr_${selectedId} td:nth-child(10)`).textContent;
        const account_6 = document.querySelector(`#tr_${selectedId} td:nth-child(11)`).textContent;
        const account_7 = document.querySelector(`#tr_${selectedId} td:nth-child(12)`).textContent;
        const account_8 = document.querySelector(`#tr_${selectedId} td:nth-child(13)`).textContent;
        const account_9 = document.querySelector(`#tr_${selectedId} td:nth-child(14)`).textContent;
        const account_10 = document.querySelector(`#tr_${selectedId} td:nth-child(15)`).textContent;

        document.querySelector('#editCode').value = code;
        document.querySelector('#editName').value = name;
        document.querySelector('#editSatuan').value = satuan;
        document.querySelector('#editAccount_1').value = account_1;
        document.querySelector('#editAccount_2').value = account_2;
        document.querySelector('#editAccount_3').value = account_3;
        document.querySelector('#editAccount_4').value = account_4;
        document.querySelector('#editAccount_5').value = account_5;
        document.querySelector('#editAccount_6').value = account_6;
        document.querySelector('#editAccount_7').value = account_7;
        document.querySelector('#editAccount_8').value = account_8;
        document.querySelector('#editAccount_9').value = account_9;
        document.querySelector('#editAccount_10').value = account_10;

        $(editModal).modal('show');
      }
    }
    function saveChanges() {
        const code = document.querySelector('#editCode').value;
        const name = document.querySelector('#editName').value;
        const satuan = document.querySelector('#editSatuan').value;
        const account_1 = document.querySelector('#editAccount_1').value;
        const account_2 = document.querySelector('#editAccount_2').value;
        const account_3 = document.querySelector('#editAccount_3').value;
        const account_4 = document.querySelector('#editAccount_4').value;
        const account_5 = document.querySelector('#editAccount_5').value;
        const account_6 = document.querySelector('#editAccount_6').value;
        const account_7 = document.querySelector('#editAccount_7').value;
        const account_8 = document.querySelector('#editAccount_8').value;
        const account_9 = document.querySelector('#editAccount_9').value;
        const account_10 = document.querySelector('#editAccount_10').value;

        const selectedCheckboxes = document.querySelectorAll('.sub_chk:checked');
    
        if (selectedCheckboxes.length === 1) {
            const selectedId = selectedCheckboxes[0].getAttribute('data-id');
    
            $.ajax({
                url: '{{ url('update-mb') }}/' + selectedId,
                method: 'POST',
                data: {
                    code: code,
                    name: name,
                    satuan: satuan,
                    account_1: account_1,
                    account_2: account_2,
                    account_3: account_3,
                    account_4: account_4,
                    account_5: account_5,
                    account_6: account_6,
                    account_7: account_7,
                    account_8: account_8,
                    account_9: account_9,
                    account_10: account_10,
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
                        window.location.href = '{{ url('master_barang') }}'; 
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
    document.getElementById('reset-mb-button').addEventListener('click', function () {
        $('#confirmResetModal').modal('show');
    });

    document.getElementById('confirmResetButton').addEventListener('click', function () {
        // Tutup modal konfirmasi
        $('#confirmResetModal').modal('hide');

        // Kirim permintaan ke rute 'reset_mb' menggunakan fetch
        fetch('{{ route('reset_mb') }}', {
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
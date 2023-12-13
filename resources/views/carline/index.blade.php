@extends('layouts.master')
@section('judul')
@endsection
@section('judul_sub')
Carline
@endsection
@section('content')

<body>
    <div class="card shadow mb-4">
        <div class="card-header py-3" style="display: flex; justify-content: space-between; align-items: center;">
            <h6 class="m-0 font-weight-bold text-primary">Carline</h6>
        </div>
        <div class="row justify-content-between" style="align-items: center;">
            <div class="form-group col-md-8" style="margin-left: 12px">
                <a href="{{ url('carline') }}" class="btn btn-success mt-3 ml-2" style="height: 40px;"><i class="bi bi-arrow-clockwise" style="font-size: 20px;"></i></a>

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
                                <h5 class="modal-title" id="addModalLabel">Tambah UMH</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form for adding data -->
                                <form id="addForm">
                                    @csrf
                                    <div class="form-group">
                                        <label for="addPPC">Destination PPC</label>
                                        <input type="text" class="form-control" id="addPPC" name="destination_ppc">
                                    </div>
                                    <div class="form-group">
                                        <label for="addHFM">HFM Carline</label>
                                        <input type="text" class="form-control" id="addHFM" name="hfm_carline">
                                    </div>
                                    <div class="form-group">
                                        <label for="addModel">Model Year</label>
                                        <input type="text" class="form-control" id="addModel" name="model_year">
                                    </div>
                                    <div class="form-group">
                                        <label for="addKode">Kode</label>
                                        <input type="text" class="form-control" id="addKode" name="kode">
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
                {{--  <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel"
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
                                    action="{{ route('import-excel-carline') }}" method="POST">
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
                </div>  --}}
                <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="fileUploadForm" enctype="multipart/form-data"
                            action="{{ route('import-excel-carline') }}" method="POST">
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
                <button id="reset-c-button" class="btn btn-danger mt-3">Reset</button>

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
                                <h5 class="modal-title" id="editModalLabel">Edit Carline</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form for editing data -->
                                <form id="editForm">
                                    <div class="form-group">
                                        <label for="editDestination">Destination PPC</label>
                                        <input type="text" class="form-control" id="editDestination"
                                            name="destination_ppc">
                                    </div>
                                    <div class="form-group">
                                        <label for="editHFM">HFM Carline</label>
                                        <input type="text" class="form-control" id="editHFM" name="hfm_carline">
                                    </div>
                                    <div class="form-group">
                                        <label for="editModel">Model Year</label>
                                        <input type="text" class="form-control" id="editModel" name="model_year">
                                    </div>
                                    <div class="form-group">
                                        <label for="editKode">Kode</label>
                                        <input type="text" class="form-control" id="editKode" name="kode">
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
                <a href="{{ url('export_excel_carline') }}" class="btn btn-info mt-3" style="height: 40px;">Downlad</a>

            </div>
            <div class="input-group col-md-3 mr-4">
                <input type="text" name="search" style="height: 2.4rem; font-size: 12pt; margin-top: 0.10rem;"
                    id="searchp" class="form-control input-text" placeholder="Cari disini ..."
                    aria-label="Recipient's username" aria-describedby="basic-addon2">
                
            </div>
        </div>

        <div class="card-body pt-0">
            <div class="table-responsive">
                <table class="table table-striped" id="carTableBody">
                    <thead style="background-color: #263a74; color:white; position: sticky; top: 0;">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">No</th>
                            <th scope="col">Destination PPC</th>
                            <th scope="col">HFM Carline</th>
                            <th scope="col">Model Year</th>
                            <th scope="col">Kode</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1 ?>
                        @foreach ($carline as $c)
                        <tr id="tr_{{ $c->id }}">
                            <td><input type="checkbox" class="sub_chk" data-id="{{$c->id}}"
                                    onclick="handleCheckboxChange({{ $c->id }})"></td>
                            <td>{{$no++}}</td>
                            <td>{{ $c->destination_ppc }}</td>
                            <td>{{ $c->hfm_carline }}</td>
                            <td>{{ $c->model_year }}</td>
                            <td>{{ $c->kode }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
                url: '{{ url('add-carline') }}', // Replace with your actual route
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
    function searchCarline() {
        const selected = document.getElementById('searchp').value;
    
        fetch(`{{ route('search.carline') }}?carline=${selected}`)
            .then(response => response.text())
            .then(data => {
                document.getElementById('carTableBody').innerHTML = data;
            });
    }

    // Menambahkan event listener untuk input pencarian
document.getElementById('searchp').addEventListener('input', function() {
    searchCarline();
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
                url: '{{ url('delete-carline') }}',
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
                    window.location.href = '{{ url('carline') }}';
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
        const destination_ppc = document.querySelector(`#tr_${selectedId} td:nth-child(3)`).textContent;
        const hfm_carline = document.querySelector(`#tr_${selectedId} td:nth-child(4)`).textContent;
        const model_year = document.querySelector(`#tr_${selectedId} td:nth-child(5)`).textContent;
        const kode = document.querySelector(`#tr_${selectedId} td:nth-child(6)`).textContent;

        document.querySelector('#editDestination').value = destination_ppc;
        document.querySelector('#editHFM').value = hfm_carline;
        document.querySelector('#editModel').value = model_year;
        document.querySelector('#editKode').value = kode;

        $(editModal).modal('show');
      }
    }
    function saveChanges() {
        const destination_ppc = document.querySelector('#editDestination').value;
        const hfm_carline = document.querySelector('#editHFM').value;
        const model_year = document.querySelector('#editModel').value;
        const kode = document.querySelector('#editKode').value;
        const selectedCheckboxes = document.querySelectorAll('.sub_chk:checked');
    
        if (selectedCheckboxes.length === 1) {
            const selectedId = selectedCheckboxes[0].getAttribute('data-id');
    
            $.ajax({
                url: '{{ url('update-carline') }}/' + selectedId,
                method: 'POST',
                data: {
                    destination_ppc: destination_ppc,
                    hfm_carline: hfm_carline,
                    model_year: model_year,
                    kode: kode,
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
                        window.location.href = '{{ url('carline') }}'; 
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
{{-- <script>
    const checkboxes = document.querySelectorAll('.sub_chk');
  
    const editButton = document.getElementById('editButton');
    const editModal = new bootstrap.Modal(document.getElementById('editModal'));
  
    function handleCheckboxChange(id) {
      const checkedCheckboxes = document.querySelectorAll('.sub_chk:checked');
  
      if (checkedCheckboxes.length === 1) {
        editButton.disabled = false;
      } else {
        editButton.disabled = true;
      }
    }
  
    editButton.addEventListener('click', () => {
      const checkedCheckbox = document.querySelector('.sub_chk:checked');
  
      if (checkedCheckbox) {
        const costCenterId = checkedCheckbox.getAttribute('data-id');
          editModal.show();
      }
    });
  
    document.getElementById('saveChangesButton').addEventListener('click', () => {
      editModal.hide();
    });
</script> --}}

<script>
    document.getElementById('reset-c-button').addEventListener('click', function () {
        $('#confirmResetModal').modal('show');
    });

    document.getElementById('confirmResetButton').addEventListener('click', function () {
        // Tutup modal konfirmasi
        $('#confirmResetModal').modal('hide');

        // Kirim permintaan ke rute 'reset_carline' menggunakan fetch
        fetch('{{ route('reset_carline') }}', {
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
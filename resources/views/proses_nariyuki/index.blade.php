@extends('layouts.master')
@section('judul')
@endsection
@section('judul_sub')
Summary
@endsection
@section('content')

<body>
    <div class="card shadow mb-4">
        <div class="card-header py-3" style="display: flex; justify-content: space-between; align-items: center;">
            <h6 class="m-0 font-weight-bold text-primary">Proses Nariyuki</h6>
        </div>
        <div class="row justify-content-between" style="align-items: center;">
            <div class="form-group col-md-6" style="margin-left: 12px">
                <a href="{{ url('proses_nariyuki') }}" class="btn btn-success mt-3 ml-2" style="height: 40px;"><i
                        class="bi bi-arrow-clockwise" style="font-size: 20px;"></i></a>

                <a href="{{ url('export_pn') }}" class="btn btn-info mt-3" style="height: 40px;">Download</a>

                <button id="reset-pn-button" class="btn btn-danger mt-3">Reset</button>

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
                                <h5 class="modal-title" id="editModalLabel">Edit Proses Nariyuki</h5>
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
                                        <label for="editSection">Section</label>
                                        <input type="text" class="form-control" id="editSection" name="section">
                                    </div>
                                    <div class="form-group">
                                        <label for="editKodeBudget">Kode Budget</label>
                                        <input type="text" class="form-control" id="editKodeBudget" name="kode_budget">
                                    </div>
                                    <div class="form-group">
                                        <label for="editFixed">Fixed/Variabel</label>
                                        <input type="text" class="form-control" id="editFixed" name="fixed">
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

            </div>
            <div class="input-group col-md-4 mr-4">

                <input type="text" name="search" style="height: 2.4rem; font-size: 12pt; margin-top: 0.10rem;"
                    id="searchp" class="form-control input-text" placeholder="Cari disini ..."
                    aria-label="Recipient's username" aria-describedby="basic-addon2">

            </div>
        </div>

        <div class="card-body pt-0">
            <div class="table-responsive">
                <table class="table table-striped" id="pnTableBody">
                    <thead style="background-color: #263a74; color:white; position: sticky; top: 0;">
                        <tr>
                            <td colspan="0" rowspan="3" style="vertical-align: middle;"></td>
                            <td colspan="0" rowspan="3" style="vertical-align: middle;">No</td>
                            <td colspan="0" rowspan="3" style="vertical-align: middle;">Month</td>
                            <td colspan="0" rowspan="3" style="vertical-align: middle;">Section</td>
                            <td colspan="0" rowspan="3" style="vertical-align: middle;">Kode Budget</td>
                            <td colspan="0" rowspan="3" style="vertical-align: middle;">Fixed/Variabel</td>
                            <td colspan="0" rowspan="3" style="vertical-align: middle;">Umh</td>
                            <td colspan="0" rowspan="3" style="vertical-align: middle;">Amount</td>
                            <td colspan="0" rowspan="3" style="vertical-align: middle;">New Umh</td>
                            <td colspan="0" rowspan="3" style="vertical-align: middle;">New Amount</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1 ?>
                        @foreach ($prosesNariyuki as $u)
                        <tr id="tr_{{ $u->id }}">
                            <td><input type="checkbox" class="sub_chk" data-id="{{$u->id}}"
                                    onclick="handleCheckboxChange({{ $u->id }})"></td>
                            <td>{{$no++}}</td>
                            <td>{{ $u->month }}</td>
                            <td>{{ $u->section }}</td>
                            <td>{{ $u->kode_budget }}</td>
                            <td>{{ $u->fixed }}</td>
                            <td>{{ number_format($u->umh, 4) }}</td>
                            <td>{{ number_format($u->amount, 4) }}</td>
                            <td>{{ number_format($u->new_umh, 4) }}</td>
                            <td>{{ number_format($u->new_amount, 4) }}</td>
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
        function calculateNewAmount() {
            var newUMH = parseFloat($('#addNewUMH').val());
            var amount = parseFloat($('#addAmount').val());
            var UMH = parseFloat($('#addUMH').val());
    
            if (!isNaN(newUMH) && !isNaN(amount) && !isNaN(UMH)) {
                var newAmount = (newUMH * amount) / UMH;
                $('#addNewAmount').val(newAmount);
            }
        }
    
        $('#addNewUMH, #addAmount, #addUMH').on('input', calculateNewAmount);
    
        $('#addSaveButton').click(function () {
            $.ajax({
                type: 'POST',
                url: '{{ url('add-pn') }}',
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
    function searchPN() {
        const selected = document.getElementById('searchp').value;
    
        fetch(`{{ route('search.proses_nariyuki') }}?proses_nariyuki=${selected}`)
            .then(response => response.text())
            .then(data => {
                document.getElementById('pnTableBody').innerHTML = data;
            });
    }

document.getElementById('searchp').addEventListener('input', function() {
    searchUMH();
});

    function handleCheckboxChange(id) {
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
                url: '{{ url('delete-pn') }}',
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
                    window.location.href = '{{ url('proses_nariyuki') }}';
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
        const section = document.querySelector(`#tr_${selectedId} td:nth-child(4)`).textContent;
        const kode_budget = document.querySelector(`#tr_${selectedId} td:nth-child(5)`).textContent;
        const fixed = document.querySelector(`#tr_${selectedId} td:nth-child(6)`).textContent;
        const umh = document.querySelector(`#tr_${selectedId} td:nth-child(7)`).textContent;
        const amount = document.querySelector(`#tr_${selectedId} td:nth-child(8)`).textContent;
        const new_umh = document.querySelector(`#tr_${selectedId} td:nth-child(9)`).textContent;
        const new_amount = document.querySelector(`#tr_${selectedId} td:nth-child(10)`).textContent;

        document.querySelector('#editMonth').value = month;
        document.querySelector('#editSection').value = month;
        document.querySelector('#editKodeBudget').value = month;
        document.querySelector('#editFixed').value = month;
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
        const section = document.querySelector('#editSection').value;
        const kode_budget = document.querySelector('#editKodeBudget').value;
        const fixed = document.querySelector('#editFixed').value;
        const umh = document.querySelector('#editUMH').value;
        const amount = document.querySelector('#editAmount').value;
        const new_umh = document.querySelector('#editNewUMH').value;
        const new_amount = document.querySelector('#editNewAmount').value;

        const selectedCheckboxes = document.querySelectorAll('.sub_chk:checked');
    
        if (selectedCheckboxes.length === 1) {
            const selectedId = selectedCheckboxes[0].getAttribute('data-id');
    
            $.ajax({
                url: '{{ url('update-pn') }}/' + selectedId,
                method: 'POST',
                data: {
                    month: month,
                    section: section,
                    kode_budget: kode_budget,
                    fixed: fixed,
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
                        window.location.href = '{{ url('proses_nariyuki') }}/';
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
    document.getElementById('reset-pn-button').addEventListener('click', function () {
        $('#confirmResetModal').modal('show');
    });

    document.getElementById('confirmResetButton').addEventListener('click', function () {
        // Tutup modal konfirmasi
        $('#confirmResetModal').modal('hide');

        // Kirim permintaan ke rute 'reset_pn' menggunakan fetch
        fetch('{{ route('reset_pn') }}', {
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
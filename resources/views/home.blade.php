@extends('layouts.master')
@section('judul')
{{-- Aplikasi | Project 2 Laravel JCC --}}
@endsection
@section('judul_sub')
Halaman Utama
@endsection
@section('content')

<body>
    <div class="card shadow mb-4">
        <div class="card-header py-3" style="display: flex; justify-content: space-between; align-items: center;">
            <h6 class="m-0 font-weight-bold text-primary">Note</h6>
        </div>
        <div class="row justify-content-between" style="align-items: center;">
            <div class="form-group col-md-6" style="margin-left: 12px">
                <a href="{{ url('home') }}" class="btn btn-success ml-2 mt-3" style="height: 40px;"><i
                        class="bi bi-arrow-clockwise" style="font-size: 20px;"></i></a>

                <button type="button" class="btn btn-primary mb-0 mt-3" data-toggle="modal"
                    data-target="#uploadModal">Upload File</button>

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
                                    action="{{ route('import-excel-home') }}" method="POST">
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

                <!-- Export Excel -->
                <a href="{{ url('export_excel') }}" class="btn btn-secondary mt-3" style="height: 40px;">Download</a>


                {{-- <a href="{{ url('home') }}" class="btn btn-success mt-3">Refresh</a> --}}

                <button id="reset-home-button" class="btn btn-danger mt-3">Reset</button>

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
                                <h5 class="modal-title" id="editModalLabel">Edit</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form for editing data -->
                                <form id="editForm">
                                    {{-- <div class="form-group">
                                        <label for="editSection">Section</label>
                                        <input type="text" class="form-control" id="editSection" name="section">
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="editSection">Section</label>
                                        <select class="form-control" id="editSection" name="section">
                                            <option value="">Pilih Section</option>
                                            @foreach($cost as $cost_center)
                                            <option value="{{ $cost_center->cost_center }}">{{ $cost_center->cost_center
                                                }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="editCode">Code</label>
                                        <input type="text" class="form-control" id="editCode" name="code">
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="editCode">Code</label>
                                        <select class="form-control" id="editCode" name="code">
                                            <option value="">Pilih Code</option>
                                            @foreach($master_barang as $code)
                                            <option value="{{ $code->code }}">{{ $code->code }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="editNama">Nama</label>
                                        <input type="text" class="form-control" id="editNama" name="nama">
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="editNama">Nama</label>
                                        <select class="form-control" id="editNama" name="nama">
                                            <option value="">Pilih Nama</option>
                                            @foreach($master_barang->unique('name') as $name)
                                            <option value="{{ $name->name }}">{{ $name->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="editKodeBudget">Kode Budget</label>
                                        <input type="text" class="form-control" id="editKodeBudget" name="kode_budget">
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="editKodeBudget">Kode Budget</label>
                                        <select class="form-control" id="editKodeBudget" name="kode_budget">
                                            <option value="">Pilih Kode Budget</option>
                                            @foreach($kode_budget->unique('kode_budget') as $kode_budget)
                                            <option value="{{ $kode_budget->kode_budget }}">{{ $kode_budget->kode_budget
                                                }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="editCur">Cur</label>
                                        <input type="text" class="form-control" id="editCur" name="cur">
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="editCur">CUR</label>
                                        <select class="form-control" id="editCur" name="cur">
                                            <option value="USD">USD</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="editQTY">QTY</label>
                                        <input type="text" class="form-control" id="editQTY" name="qty">
                                    </div>
                                    <div class="form-group">
                                        <label for="editPrice">Price</label>
                                        <input type="text" class="form-control" id="editPrice" name="price">
                                    </div>

                                    {{-- <div class="form-group">
                                        <label for="editOrderPlan">Order Plan</label>
                                        <input type="text" class="form-control" id="editOrderPlan" name="order_plan">
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="editOrderPlan">Order Plan</label>
                                        <input type="date" class="form-control" id="editOrderPlan" name="order_plan">
                                    </div>

                                    <div class="form-group">
                                        <label for="editDeliveryPlan">Delivery Plan</label>
                                        <input type="date" class="form-control" id="editDeliveryPlan"
                                            name="delivery_plan">
                                    </div>
                                    <div class="form-group">
                                        <label for="editFixed">Fixed/Variable</label>
                                        <select class="form-control" id="editFixed" name="fixed">
                                            <option value="Fixed">Fixed</option>
                                            <option value="Variabel">Variabel</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="editPrep">Prep/Maspro</label>
                                        <select class="form-control" id="editPrep" name="prep">
                                            <option value="Prep">Prep</option>
                                            <option value="Maspro">Maspro</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="editKodeCarline">Kode Carline</label>
                                        <select class="form-control" id="editKodeCarline" name="kode_carline">
                                            @foreach($carline->unique('kode') as $kode)
                                            <option value="{{ $kode->kode }}">{{ $kode->kode}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="editRemark">Remark</label>
                                        <input type="text" class="form-control" id="editRemark" name="remark">
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

                {{-- <input type="text" class="form-control" aria-label="Text input with dropdown button">
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <select class="form-select" id="dropdown-select">
                            @foreach($kode_budget->unique('name') as $item)
                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </ul>
                </div> --}}
            </div>
        </div>

        <div class="card-body pt-0">
            <div class="table-responsive">
                <table class="table table-striped" id="homeTableBody">
                    <thead style="background-color: #263a74; color:white; position: sticky; top: 0;">
                        <tr>
                            <td colspan="0" rowspan="3" style="vertical-align: middle;"></td>
                            <td colspan="0" rowspan="3" style="vertical-align: middle;">No</td>
                            <td colspan="0" rowspan="3" style="vertical-align: middle;">Section</td>
                            <td colspan="0" rowspan="3" style="vertical-align: middle;">Code</td>
                            <td colspan="0" rowspan="3" style="vertical-align: middle;">Nama</td>
                            <td colspan="0" rowspan="3" style="vertical-align: middle;">Kode Budget</td>
                            <td colspan="0" rowspan="3" style="vertical-align: middle;">CUR</td>
                            <td colspan="0" rowspan="3" style="vertical-align: middle;">Qty</td>
                            <td colspan="0" rowspan="3" style="vertical-align: middle;">Price</td>
                            <td colspan="0" rowspan="3" style="vertical-align: middle;">Oder Plan</td>
                            <td colspan="0" rowspan="3" style="vertical-align: middle;">Delivery Plan</td>
                            <td colspan="0" rowspan="3" style="vertical-align: middle;">Fixed/Variabel</td>
                            <td colspan="0" rowspan="3" style="vertical-align: middle;">Prep/Masspro</td>
                            <td colspan="0" rowspan="3" style="vertical-align: middle;">Kode Carline</td>
                            <td colspan="0" rowspan="3" style="vertical-align: middle;">Remark</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1 ?>
                        @foreach ($home as $h)
                        <tr id="tr_{{ $h->id }}">
                            <td><input type="checkbox" class="sub_chk" data-id="{{$h->id}}"
                                    onclick="handleCheckboxChange({{ $h->id }})"></td>
                            <td>{{$no++}}</td>
                            {{--  <td>{{ Auth::user()->role }}</td>  --}}
                            <td>{{ $h->section }}</td>
                            <td>{{ $h->code }}</td>
                            <td>{{ $h->nama }}</td>
                            <td>{{ $h->kode_budget }}</td>
                            <td>{{ $h->cur }}</td>
                            <td>{{ $h->qty }}</td>
                            <td>{{ $h->price }}</td>
                            @if ($h->order_plan)
                            <td>{{ \Carbon\Carbon::parse($h->order_plan)->format('d-m-Y') }}</td>
                            @else
                            <td> </td>
                            @endif
                            @if ($h->delivery_plan)
                            <td>{{ \Carbon\Carbon::parse($h->delivery_plan)->format('d-m-Y') }}</td>
                            @else
                            <td> </td>
                            @endif
                            <td>{{ $h->fixed }}</td>
                            <td>{{ $h->prep }}</td>
                            <td>{{ $h->kode_carline }}</td>
                            <td>{{ $h->remark }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

<script>
    // Fungsi untuk mengubah format tanggal dari yyyy-mm-dd ke dd-mm-yyyy
    function formatDate(inputDate) {
        if (inputDate) {
            const dateParts = inputDate.split("-");
            if (dateParts.length === 3) {
                return dateParts[2] + "-" + dateParts[1] + "-" + dateParts[0];
            }
        }
        return "";
    }

    // Fungsi untuk mengisi input dengan format tanggal yang benar saat data ditampilkan
    function populateDateInput(inputId) {
        const inputElement = document.querySelector(inputId);
        if (inputElement) {
            const originalValue = inputElement.value;
            const formattedValue = formatDate(originalValue);
            inputElement.value = formattedValue;
        }
    }

    // Fungsi untuk mengubah format tanggal sebelum mengirimkan data ke server
    function prepareDateInput(inputId) {
        const inputElement = document.querySelector(inputId);
        if (inputElement) {
            const originalValue = inputElement.value;
            const formattedValue = formatDate(originalValue);
            inputElement.value = formattedValue;
        }
    }

    // Panggil fungsi populateDateInput dan prepareDateInput sesuai dengan id input yang sesuai
    populateDateInput('#editOrderPlan');
    prepareDateInput('#editOrderPlan');
    populateDateInput('#editDeliveryPlan');
    prepareDateInput('#editDeliveryPlan');
</script>

<script>
    // Fungsi untuk mengirim permintaan pencarian ke server dan mengganti konten tabel
    function searchHome() {
        const selected = document.getElementById('searchp').value;
    
        fetch(`{{ route('search.home') }}?home=${selected}`)
            .then(response => response.text())
            .then(data => {
                document.getElementById('homeTableBody').innerHTML = data;
            });
    }

    // Menambahkan event listener untuk input pencarian
document.getElementById('searchp').addEventListener('input', function() {
    searchHome();
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
                url: '/delete-home',
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
                    window.location.href = '/home';
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
        const section = document.querySelector(`#tr_${selectedId} td:nth-child(3)`).textContent;
        const code = document.querySelector(`#tr_${selectedId} td:nth-child(4)`).textContent;
        const nama = document.querySelector(`#tr_${selectedId} td:nth-child(5)`).textContent;
        const kode_budget = document.querySelector(`#tr_${selectedId} td:nth-child(6)`).textContent;
        const cur = document.querySelector(`#tr_${selectedId} td:nth-child(7)`).textContent;
        const qty = document.querySelector(`#tr_${selectedId} td:nth-child(8)`).textContent;
        const price = document.querySelector(`#tr_${selectedId} td:nth-child(9)`).textContent;
        const order_plan = document.querySelector(`#tr_${selectedId} td:nth-child(10)`).textContent;
        const delivery_plan = document.querySelector(`#tr_${selectedId} td:nth-child(11)`).textContent;
        const fixed = document.querySelector(`#tr_${selectedId} td:nth-child(12)`).textContent;
        const prep = document.querySelector(`#tr_${selectedId} td:nth-child(13)`).textContent;
        const kode_carline = document.querySelector(`#tr_${selectedId} td:nth-child(14)`).textContent;
        const remark = document.querySelector(`#tr_${selectedId} td:nth-child(15)`).textContent;

        document.querySelector('#editSection').value = section;
        document.querySelector('#editCode').value = code;
        document.querySelector('#editNama').value = nama;
        document.querySelector('#editKodeBudget').value = kode_budget;
        document.querySelector('#editCur').value = cur;
        document.querySelector('#editQTY').value = qty;
        document.querySelector('#editPrice').value = price;
        document.querySelector('#editOrderPlan').value = order_plan;
        document.querySelector('#editDeliveryPlan').value = delivery_plan;
        document.querySelector('#editFixed').value = fixed;
        document.querySelector('#editPrep').value = prep;
        document.querySelector('#editKodeCarline').value = kode_carline;
        document.querySelector('#editRemark').value = remark;

        $(editModal).modal('show');
      }
    }
    function saveChanges() {
        const section = document.querySelector('#editSection').value;
        const code = document.querySelector('#editCode').value;
        const nama = document.querySelector('#editNama').value;
        const kode_budget = document.querySelector('#editKodeBudget').value;
        const cur = document.querySelector('#editCur').value;
        const qty = document.querySelector('#editQTY').value;
        const price = document.querySelector('#editPrice').value;
        const order_plan = document.querySelector('#editOrderPlan').value;
        const delivery_plan = document.querySelector('#editDeliveryPlan').value;
        const fixed = document.querySelector('#editFixed').value;
        const prep = document.querySelector('#editPrep').value;
        const kode_carline = document.querySelector('#editKodeCarline').value;
        const remark = document.querySelector('#editRemark').value;

        const selectedCheckboxes = document.querySelectorAll('.sub_chk:checked');
    
        if (selectedCheckboxes.length === 1) {
            const selectedId = selectedCheckboxes[0].getAttribute('data-id');
    
            $.ajax({
                url: '/update-home/' + selectedId,
                method: 'POST',
                data: {
                    section: section,
                    code: code,
                    nama: nama,
                    kode_budget: kode_budget,
                    cur: cur,
                    qty: qty,
                    price: price,
                    order_plan: order_plan,
                    delivery_plan: delivery_plan,
                    fixed: fixed,
                    prep: prep,
                    kode_carline: kode_carline,
                    remark: remark,
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
                        window.location.href = '/home';
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
    document.getElementById('reset-home-button').addEventListener('click', function () {
        $('#confirmResetModal').modal('show');
    });

    document.getElementById('confirmResetButton').addEventListener('click', function () {
        // Tutup modal konfirmasi
        $('#confirmResetModal').modal('hide');

        // Kirim permintaan ke rute 'reset_home' menggunakan fetch
        fetch('{{ route('reset_home') }}', {
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
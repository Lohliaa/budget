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

                <a href="{{ url('export_pn') }}" class="btn btn-primary mt-3" style="height: 40px;">Download</a>

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

            </div>
            <div class="input-group col-md-3 mr-4">
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
    
    function searchProses() {
        console.log('Search function called'); // Tambahkan pesan ini
        const selected = document.getElementById('searchp').value;
    
        fetch(`{{ route('search.proses_nariyuki') }}?proses_nariyuki=${selected}`)
            .then(response => response.text())
            .then(data => {
                document.getElementById('pnTableBody').innerHTML = data;
            });
    }
    

document.getElementById('searchp').addEventListener('input', function() {
    searchProses();
});

    function handleCheckboxChange(id) {
        console.log('Checkbox with ID ' + id + ' changed.');
    }
</script>

@endsection
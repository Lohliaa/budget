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

                {{-- <a href="{{ url('export_pn') }}" class="btn btn-primary mt-3" style="height: 40px;">Download</a>
                --}}

                <!-- Export Excel -->
                <button onclick="exportData()" type="button" class="btn btn-info mt-3">
                    <span>Download</span>
                </button>
                <form id="exportForm" action="{{ route('downloadFiltered') }}" method="GET" style="display: none;">
                    @csrf
                    <input type="hidden" id="sectionExport" name="section">
                </form>

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

                <form method="post" action="{{ route('filterSection') }}" id="filterForm">
                    @csrf
                    <div class="dropdown mr-2 custom-dropdown-width">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Report
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            @foreach($section as $sectionItem)
                            <li>
                                <div class="form-check" style="width:250px;">
                                    <input class="form-check-input" type="checkbox" style="width:20px;"
                                        value="{{ $sectionItem->section }}" id="sectionCheckbox{{ $loop->index }}"
                                        name="sections[]">
                                    <label class="form-check-label" for="sectionCheckbox{{ $loop->index }}">
                                        {{ $sectionItem->section }}
                                    </label>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </form>

                <input type="text" name="search" style="height: 2.4rem; font-size: 12pt; margin-top: 0.10rem;"
                    id="searchp" class="form-control input-text" placeholder="Cari disini ..."
                    aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div>
        </div>
        <div id="filtered-data-container">
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table table-striped" id="pnTableBody">
                        <thead style="background-color: #263a74; color:white; position: sticky; top: 0;">
                            <tr>
                                <td colspan="0" rowspan="3" style="vertical-align: middle;"></td>
                                <td colspan="0" rowspan="3" style="vertical-align: middle;">No</td>
                                <td colspan="0" rowspan="3" style="vertical-align: middle;">Tahun</td>
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
                                <td>{{ $u->tahun }}</td>
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
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        // Handle checkbox change event
        $('input[name="sections[]"]').change(function() {
            // Collect selected sections
            var selectedSections = $('input[name="sections[]"]:checked').map(function() {
                return this.value;
            }).get();
    
            // Send AJAX request to server only if there are selected sections
            if (selectedSections.length > 0) {
                $.ajax({
                    type: 'POST',
                    url: '{{ route("filterSection") }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "sections": selectedSections
                    },
                    success: function(data) {
                        // Update the content of your view with the filtered data
                        $('#filtered-data-container').html(data);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                // If no checkbox is selected, reset to the original state (load all data)
                $.ajax({
                    type: 'GET',
                    url: '{{ route("loadOriginal") }}',
                    success: function(data) {
                        $('#filtered-data-container').html(data);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    
    });
    function exportData() {
        const selectedSections = $('input[name="sections[]"]:checked').map(function() {
            return this.value;
        }).get();
    
        var exportForm = $('<form action="{{ route("downloadFiltered") }}" method="post"></form>');
        exportForm.append('<input type="hidden" name="_token" value="{{ csrf_token() }}" />');
        for (var i = 0; i < selectedSections.length; i++) {
            exportForm.append('<input type="hidden" name="sections[]" value="' + selectedSections[i] + '" />');
        }
    
        $('body').append(exportForm);
        exportForm.submit();
    }    
</script>

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
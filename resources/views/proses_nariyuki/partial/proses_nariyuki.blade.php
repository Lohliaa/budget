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
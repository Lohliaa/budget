<table class="table table-striped">
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

            <th scope="col">STP JUL</th>
            <th scope="col">STP AUG</th>
            <th scope="col">STP SEP</th>
            <th scope="col">STP OKT</th>
            <th scope="col">STP NOV</th>
            <th scope="col">STP DEC</th>
            <th scope="col">STP JAN</th>
            <th scope="col">STP FEB</th>
            <th scope="col">STP MAR</th>
            <th scope="col">STP APR</th>
            <th scope="col">STP MAY</th>
            <th scope="col">STP JUN</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1 ?>
        @foreach ($umh as $u)
        <tr id="tr_{{ $u->id }}">
            <td><input type="checkbox" class="sub_chk" data-id="{{$u->id}}"
                    onclick="handleCheckboxChange({{ $u->id }})"></td>
            <td>{{$no++}}</td>
            <td>{{ $u->ltp_jul }}</td>
            <td>{{ $u->ltp_aug }}</td>
            <td>{{ $u->ltp_sep }}</td>
            <td>{{ $u->ltp_okt }}</td>
            <td>{{ $u->ltp_nov }}</td>
            <td>{{ $u->ltp_dec }}</td>
            <td>{{ $u->ltp_jan }}</td>
            <td>{{ $u->ltp_feb }}</td>
            <td>{{ $u->ltp_mar }}</td>
            <td>{{ $u->ltp_apr }}</td>
            <td>{{ $u->ltp_may }}</td>
            <td>{{ $u->ltp_jun }}</td>

            <td>{{ $u->stp_jul }}</td>
            <td>{{ $u->stp_aug }}</td>
            <td>{{ $u->stp_sep }}</td>
            <td>{{ $u->stp_okt }}</td>
            <td>{{ $u->stp_nov }}</td>
            <td>{{ $u->stp_dec }}</td>
            <td>{{ $u->stp_jan }}</td>
            <td>{{ $u->stp_feb }}</td>
            <td>{{ $u->stp_mar }}</td>
            <td>{{ $u->stp_apr }}</td>
            <td>{{ $u->stp_may }}</td>
            <td>{{ $u->stp_jun }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<table class="table table-striped">
    <thead style="background-color: #263a74; color:white; position: sticky; top: 0;">
        <tr>
            <th scope="col"></th>
            <th scope="col">No</th>
            <th scope="col">Month</th>
            <th scope="col">Section</th>
            <th scope="col">Kode Budget</th>
            <th scope="col">Fixed/Variabel</th>
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
            <td>{{ $u->section }}</td>
            <td>{{ $u->kode_budget }}</td>
            <td>{{ $u->fixed }}</td>
            <td>{{ $u->umh }}</td>
            <td>{{ $u->amount }}</td>
            <td>{{ $u->new_umh }}</td>
            <td>{{ $u->new_amount }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
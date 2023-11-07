<table class="table table-striped">
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

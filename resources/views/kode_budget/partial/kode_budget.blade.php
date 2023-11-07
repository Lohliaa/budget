<table class="table table-striped">
    <thead style="background-color: #263a74; color:white; position: sticky; top: 0;">
        <tr>
            <th scope="col"></th>
            <th scope="col">No</th>
            <th scope="col">Kode Budget</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1 ?>
        @foreach ($kode_budget as $kb)
        <tr id="tr_{{ $kb->id }}">
            <td><input type="checkbox" class="sub_chk" data-id="{{$kb->id}}"
                    onclick="handleCheckboxChange({{ $kb->id }})"></td>
            <td>{{$no++}}</td>
            <td>{{ $kb->kode_budget }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

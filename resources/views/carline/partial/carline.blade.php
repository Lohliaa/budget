<table class="table table-striped">
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

<table class="table table-striped">
    <thead style="background-color: #263a74; color:white; position: sticky; top: 0;">
        <tr>
            <th style="width: 50px; text-align:center" scope="col"></th>
            <th scope="col">No</th>
            <th scope="col">Cost Center</th>
            <th scope="col">Detaill Cost Center</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1 ?>
        @foreach ($cost as $c)
        <tr id="tr_{{ $c->id }}">
            <td><input type="checkbox" class="sub_chk" data-id="{{$c->id}}"
                    onclick="handleCheckboxChange({{ $c->id }})"></td>
            <td>{{$no++}}</td>
            <td>{{ $c->cost_center }}</td>
            <td>{{ $c->detail_cost_center }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

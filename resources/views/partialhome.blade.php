<table class="table table-striped">
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
            <td colspan="0" rowspan="3" style="vertical-align: middle;">Amount</td>
            <td colspan="0" rowspan="3" style="vertical-align: middle;">Oder Plan</td>
            <td colspan="0" rowspan="3" style="vertical-align: middle;">Delivery Plan</td>
            <td colspan="0" rowspan="3" style="vertical-align: middle;">Fixed</td>
            <td colspan="0" rowspan="3" style="vertical-align: middle;">Prep</td>
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
            <td>{{ $h->section }}</td>
            <td>{{ $h->code }}</td>
            <td>{{ $h->nama }}</td>
            <td>{{ $h->kode_budget }}</td>
            <td>{{ $h->cur }}</td>
            <td>{{ $h->qty }}</td>
            <td>{{ $h->price }}</td>
            <td>{{ $h->amount }}</td>
            <td>{{ $h->order_plan }}</td>
            <td>{{ $h->delivery_plan }}</td>
            <td>{{ $h->fixed }}</td>
            <td>{{ $h->prep }}</td>
            <td>{{ $h->kode_carline }}</td>
            <td>{{ $h->remark }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
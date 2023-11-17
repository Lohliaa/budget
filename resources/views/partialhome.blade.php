<div id="filtered-data-container">
    <div class="card-body pt-0">
        <div class="table-responsive">
            <table class="table table-striped" id="homeTableBody">
                <thead style="background-color: #263a74; color:white; position: sticky; top: 0;">
                    <tr>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;"></td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">No</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Section</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Code</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Name</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Kode Budget</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">CUR</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Fixed/Variabel</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Prep/Masspro</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Kode Carline</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Remark</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Qty Jul</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Price Jul</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Amount Jul</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Qty Aug</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Price Aug</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Amount Aug</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Qty Sep</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Price Sep</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Amount Sep</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Qty Okt</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Price Okt</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Amount Okt</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Qty Nov</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Price Nov</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Amount Nov</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Qty Dec</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Price Dec</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Amount Dec</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Qty Jan</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Price Jan</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Amount Jan</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Qty Feb</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Price Feb</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Amount Feb</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Qty Mar</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Price Mar</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Amount Mar</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Qty Apr</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Price Apr</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Amount Apr</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Qty May</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Price May</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Amount May</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Qty Jun</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Price Jun</td>
                        <td colspan="0" rowspan="3" style="vertical-align: middle;">Amount Jun</td>
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
                        <td>{{ $h->fixed }}</td>
                        <td>{{ $h->prep }}</td>
                        <td>{{ $h->kode_carline }}</td>
                        <td>{{ $h->remark }}</td>
                        <td>{{ $h->qty_jul }}</td>
                        <td>{{ $h->price_jul }}</td>
                        <td>{{ $h->amount_jul }}</td>
                        <td>{{ $h->qty_aug }}</td>
                        <td>{{ $h->price_aug }}</td>
                        <td>{{ $h->amount_aug }}</td>
                        <td>{{ $h->qty_sep }}</td>
                        <td>{{ $h->price_sep }}</td>
                        <td>{{ $h->amount_sep }}</td>
                        <td>{{ $h->qty_okt }}</td>
                        <td>{{ $h->price_okt }}</td>
                        <td>{{ $h->amount_okt }}</td>
                        <td>{{ $h->qty_nov }}</td>
                        <td>{{ $h->price_nov }}</td>
                        <td>{{ $h->amount_nov }}</td>
                        <td>{{ $h->qty_dec }}</td>
                        <td>{{ $h->price_dec }}</td>
                        <td>{{ $h->amount_dec }}</td>
                        <td>{{ $h->qty_jan }}</td>
                        <td>{{ $h->price_jan }}</td>
                        <td>{{ $h->amount_jan }}</td>
                        <td>{{ $h->qty_feb }}</td>
                        <td>{{ $h->price_feb }}</td>
                        <td>{{ $h->amount_feb }}</td>
                        <td>{{ $h->qty_mar }}</td>
                        <td>{{ $h->price_mar }}</td>
                        <td>{{ $h->amount_mar }}</td>
                        <td>{{ $h->qty_apr }}</td>
                        <td>{{ $h->price_apr }}</td>
                        <td>{{ $h->amount_apr }}</td>
                        <td>{{ $h->qty_may }}</td>
                        <td>{{ $h->price_may }}</td>
                        <td>{{ $h->amount_may }}</td>
                        <td>{{ $h->qty_jun }}</td>
                        <td>{{ $h->price_jun }}</td>
                        <td>{{ $h->amount_jun }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
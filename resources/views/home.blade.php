@extends('layouts.master')
@section('judul')
{{-- Aplikasi | Project 2 Laravel JCC --}}
@endsection
@section('judul_sub')
Halaman Utama
@endsection
@section('content')

<body>
    <div class="card shadow mb-4">
        <div class="card-header py-3" style="display: flex; justify-content: space-between; align-items: center;">
            <h6 class="m-0 font-weight-bold text-primary">Note</h6>
        </div>
        <div class="row justify-content-between" style="align-items: center;">
            <div class="form-group col-md-8" style="margin-left: 12px">
                <a href="{{ url('home') }}" class="btn btn-success ml-2 mt-3" style="height: 40px;"><i
                        class="bi bi-arrow-clockwise" style="font-size: 20px;"></i></a>

                <!-- Button modal -->
                <button style="height: 38px; width: 45px; position: relative;" type="button"
                    class="btn btn-secondary p-0 mt-3" data-toggle="modal" data-target="#addModal">
                    <i class="bi bi-plus" style="margin-top:3px; font-size: 2rem; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"></i>
                </button>

                <!-- Modal adding data -->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addModalLabel">Tambah Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form for adding data -->
                                <form id="addForm">
                                    @csrf
                                    <div class="form-group">
                                        <label for="addSection">Section</label>
                                        <input type="text" class="form-control" id="addSection" name="section">
                                    </div>
                                    <div class="form-group">
                                        <label for="addCode">Code</label>
                                        <input type="text" class="form-control" id="addCode" name="code">
                                    </div>
                                    <div class="form-group">
                                        <label for="addName">Name</label>
                                        <input type="text" class="form-control" id="addName" name="nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="addKodeBudget">Kode Budget</label>
                                        <input type="text" class="form-control" id="addKodeBudget" name="kode_budget">
                                    </div>
                                    <div class="form-group">
                                        <label for="addCur">CUR</label>
                                        <input type="text" class="form-control" id="addCur" name="cur">
                                    </div>
                                    <div class="form-group">
                                        <label for="addFixed">Fixed/Variabel</label>
                                        <input type="text" class="form-control" id="addFixed" name="fixed">
                                    </div>
                                    <div class="form-group">
                                        <label for="addPrep">Prep/Masspro</label>
                                        <input type="text" class="form-control" id="addPrep" name="prep">
                                    </div>
                                    <div class="form-group">
                                        <label for="addCodeCarline">Kode Carline</label>
                                        <input type="text" class="form-control" id="addCodeCarline" name="kode_carline">
                                    </div>
                                    <div class="form-group">
                                        <label for="addRemark">Remark</label>
                                        <input type="text" class="form-control" id="addRemark" name="remark">
                                    </div>
                                    <div class="form-group">
                                        <label for="addQTY_jul">QTY Jul</label>
                                        <input type="text" class="form-control" id="addQTY_jul" name="qty_jul">
                                    </div>
                                    <div class="form-group">
                                        <label for="addPrice_jul">Price Jul</label>
                                        <input type="text" class="form-control" id="addPrice_jul" name="price_jul">
                                    </div>
                                    <div class="form-group">
                                        <label for="addAmount_jul">Amount Jul</label>
                                        <input type="text" class="form-control" id="addAmount_jul" name="amount_jul">
                                    </div>
                                    <div class="form-group">
                                        <label for="addQTY_aug">QTY Aug</label>
                                        <input type="text" class="form-control" id="addQTY_aug" name="qty_aug">
                                    </div>
                                    <div class="form-group">
                                        <label for="addPrice_aug">Price Aug</label>
                                        <input type="text" class="form-control" id="addPrice_aug" name="price_aug">
                                    </div>
                                    <div class="form-group">
                                        <label for="addAmount_aug">Amount Aug</label>
                                        <input type="text" class="form-control" id="addAmount_aug" name="amount_aug">
                                    </div>
                                    <div class="form-group">
                                        <label for="addQTY_sep">QTY sep</label>
                                        <input type="text" class="form-control" id="addQTY_sep" name="qty_sep">
                                    </div>
                                    <div class="form-group">
                                        <label for="addPrice_sep">Price sep</label>
                                        <input type="text" class="form-control" id="addPrice_sep" name="price_sep">
                                    </div>
                                    <div class="form-group">
                                        <label for="addAmount_sep">Amount sep</label>
                                        <input type="text" class="form-control" id="addAmount_sep" name="amount_sep">
                                    </div>
                                    <div class="form-group">
                                        <label for="addQTY_okt">QTY okt</label>
                                        <input type="text" class="form-control" id="addQTY_okt" name="qty_okt">
                                    </div>
                                    <div class="form-group">
                                        <label for="addPrice_okt">Price okt</label>
                                        <input type="text" class="form-control" id="addPrice_okt" name="price_okt">
                                    </div>
                                    <div class="form-group">
                                        <label for="addAmount_okt">Amount okt</label>
                                        <input type="text" class="form-control" id="addAmount_okt" name="amount_okt">
                                    </div>
                                    <div class="form-group">
                                        <label for="addQTY_nov">QTY nov</label>
                                        <input type="text" class="form-control" id="addQTY_nov" name="qty_nov">
                                    </div>
                                    <div class="form-group">
                                        <label for="addPrice_nov">Price nov</label>
                                        <input type="text" class="form-control" id="addPrice_nov" name="price_nov">
                                    </div>
                                    <div class="form-group">
                                        <label for="addAmount_nov">Amount nov</label>
                                        <input type="text" class="form-control" id="addAmount_nov" name="amount_nov">
                                    </div>
                                    <div class="form-group">
                                        <label for="addQTY_dec">QTY dec</label>
                                        <input type="text" class="form-control" id="addQTY_dec" name="qty_dec">
                                    </div>
                                    <div class="form-group">
                                        <label for="addPrice_dec">Price dec</label>
                                        <input type="text" class="form-control" id="addPrice_dec" name="price_dec">
                                    </div>
                                    <div class="form-group">
                                        <label for="addAmount_dec">Amount dec</label>
                                        <input type="text" class="form-control" id="addAmount_dec" name="amount_dec">
                                    </div>
                                    <div class="form-group">
                                        <label for="addQTY_jan">QTY jan</label>
                                        <input type="text" class="form-control" id="addQTY_jan" name="qty_jan">
                                    </div>
                                    <div class="form-group">
                                        <label for="addPrice_jan">Price jan</label>
                                        <input type="text" class="form-control" id="addPrice_jan" name="price_jan">
                                    </div>
                                    <div class="form-group">
                                        <label for="addAmount_jan">Amount jan</label>
                                        <input type="text" class="form-control" id="addAmount_jan" name="amount_jan">
                                    </div>
                                    <div class="form-group">
                                        <label for="addQTY_feb">QTY feb</label>
                                        <input type="text" class="form-control" id="addQTY_feb" name="qty_feb">
                                    </div>
                                    <div class="form-group">
                                        <label for="addPrice_feb">Price feb</label>
                                        <input type="text" class="form-control" id="addPrice_feb" name="price_feb">
                                    </div>
                                    <div class="form-group">
                                        <label for="addAmount_feb">Amount feb</label>
                                        <input type="text" class="form-control" id="addAmount_feb" name="amount_feb">
                                    </div>
                                    <div class="form-group">
                                        <label for="addQTY_mar">QTY mar</label>
                                        <input type="text" class="form-control" id="addQTY_mar" name="qty_mar">
                                    </div>
                                    <div class="form-group">
                                        <label for="addPrice_mar">Price mar</label>
                                        <input type="text" class="form-control" id="addPrice_mar" name="price_mar">
                                    </div>
                                    <div class="form-group">
                                        <label for="addAmount_mar">Amount mar</label>
                                        <input type="text" class="form-control" id="addAmount_mar" name="amount_mar">
                                    </div>
                                    <div class="form-group">
                                        <label for="addQTY_apr">QTY apr</label>
                                        <input type="text" class="form-control" id="addQTY_apr" name="qty_apr">
                                    </div>
                                    <div class="form-group">
                                        <label for="addPrice_apr">Price apr</label>
                                        <input type="text" class="form-control" id="addPrice_apr" name="price_apr">
                                    </div>
                                    <div class="form-group">
                                        <label for="addAmount_apr">Amount apr</label>
                                        <input type="text" class="form-control" id="addAmount_apr" name="amount_apr">
                                    </div>
                                    <div class="form-group">
                                        <label for="addQTY_may">QTY may</label>
                                        <input type="text" class="form-control" id="addQTY_may" name="qty_may">
                                    </div>
                                    <div class="form-group">
                                        <label for="addPrice_may">Price may</label>
                                        <input type="text" class="form-control" id="addPrice_may" name="price_may">
                                    </div>
                                    <div class="form-group">
                                        <label for="addAmount_may">Amount may</label>
                                        <input type="text" class="form-control" id="addAmount_may" name="amount_may">
                                    </div>
                                    <div class="form-group">
                                        <label for="addQTY_jun">QTY jun</label>
                                        <input type="text" class="form-control" id="addQTY_jun" name="qty_jun">
                                    </div>
                                    <div class="form-group">
                                        <label for="addPrice_jun">Price jun</label>
                                        <input type="text" class="form-control" id="addPrice_jun" name="price_jun">
                                    </div>
                                    <div class="form-group">
                                        <label for="addAmount_jun">Amount jun</label>
                                        <input type="text" class="form-control" id="addAmount_jun" name="amount_jun">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="addSaveButton">Save</button>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-primary mb-0 mt-3" data-toggle="modal"
                    data-target="#uploadModal">Upload File</button>

                <!-- Modal untuk mengunggah data -->
                <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="uploadModalLabel">Unggah Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="fileUploadForm" enctype="multipart/form-data"
                                    action="{{ route('import-excel-home') }}" method="POST">
                                    @csrf
                                    <input type="file" id="fileInput" name="file"
                                        accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary"
                                    onclick="document.getElementById('fileUploadForm').submit()">Unggah</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Export Excel -->
                <a href="{{ url('export_excel') }}" class="btn btn-info mt-3" style="height: 40px;">Download</a>


                {{-- <a href="{{ url('home') }}" class="btn btn-success mt-3">Refresh</a> --}}

                <button id="reset-home-button" class="btn btn-danger mt-3">Reset</button>

                <!-- Modal konfirmasi reset -->
                <div class="modal fade" id="confirmResetModal" tabindex="-1" role="dialog"
                    aria-labelledby="confirmResetModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmResetModalLabel">Reset Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah Anda yakin ingin reset seluruh data?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button id="confirmResetButton" type="button" class="btn btn-danger">Reset</button>
                            </div>
                        </div>
                    </div>
                </div>

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

                <!-- Tombol Edit -->
                <button type="button" class="btn btn-warning mt-3" id="editButton" onclick="handleEditClick()"
                    disabled>Edit</button>

                <!-- Modal Edit-->
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form for editing data -->
                                <form id="editForm">

                                    <div class="form-group">
                                        <label for="editSection">Section</label>
                                        <select class="form-control" id="editSection" name="section">
                                            <option value="">Pilih Section</option>
                                            @foreach($cost as $cost_center)
                                            <option value="{{ $cost_center->cost_center }}">{{
                                                $cost_center->cost_center
                                                }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="editCode">Code</label>
                                        <select class="form-control" id="editCode" name="code">
                                            <option value="">Pilih Code</option>
                                            @foreach($master_barang as $code)
                                            <option value="{{ $code->code }}">{{ $code->code }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="editNama">Nama</label>
                                        <select class="form-control" id="editNama" name="nama">
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="editKodeBudget">Kode Budget</label>
                                        <select class="form-control" id="editKodeBudget" name="kode_budget">
                                            <option value="">Pilih Kode Budget</option>
                                            @foreach($kode_budget->unique('kode_budget') as $kode_budget)
                                            <option value="{{ $kode_budget->kode_budget }}">{{
                                                $kode_budget->kode_budget
                                                }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="editCur">CUR</label>
                                        <select class="form-control" id="editCur" name="cur">
                                            <option value="USD" selected>USD</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="editFixed">Fixed/Variable</label>
                                        <select class="form-control" id="editFixed" name="fixed">
                                            <option value="Fixed">Fixed</option>
                                            <option value="Variabel">Variabel</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="editPrep">Prep/Maspro</label>
                                        <select class="form-control" id="editPrep" name="prep">
                                            <option value="Prep">Prep</option>
                                            <option value="Maspro">Maspro</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="editKodeCarline">Kode Carline</label>
                                        <select class="form-control" id="editKodeCarline" name="kode_carline">
                                            @foreach($carline->unique('kode') as $kode)
                                            <option value="{{ $kode->kode }}">{{ $kode->kode}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="editRemark">Remark</label>
                                        <input type="text" class="form-control" id="editRemark" name="remark">
                                    </div>
                                    <div class="form-group">
                                        <label for="editQTY_jul">QTY Jul</label>
                                        <input type="text" class="form-control" id="editQTY_jul" name="qty_jul">
                                    </div>
                                    <div class="form-group">
                                        <label for="editPrice_jul">Price Jul</label>
                                        <input type="text" class="form-control" id="editPrice_jul" name="price_jul">
                                    </div>
                                    <div class="form-group">
                                        <label for="editAmount_jul">Amount Jul</label>
                                        <input type="text" class="form-control" id="editAmount_jul" name="amount_jul"
                                            disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="editQTY_aug">QTY Aug</label>
                                        <input type="text" class="form-control" id="editQTY_aug" name="qty_aug">
                                    </div>
                                    <div class="form-group">
                                        <label for="editPrice_aug">Price Aug</label>
                                        <input type="text" class="form-control" id="editPrice_aug" name="price_aug">
                                    </div>
                                    <div class="form-group">
                                        <label for="editAmount_aug">Amount Aug</label>
                                        <input type="text" class="form-control" id="editAmount_aug" name="amount_aug"
                                            disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="editQTY_sep">QTY Sep</label>
                                        <input type="text" class="form-control" id="editQTY_sep" name="qty_sep">
                                    </div>
                                    <div class="form-group">
                                        <label for="editPrice_sep">Price Sep</label>
                                        <input type="text" class="form-control" id="editPrice_sep" name="price_sep">
                                    </div>
                                    <div class="form-group">
                                        <label for="editAmount_sep">Amount Sep</label>
                                        <input type="text" class="form-control" id="editAmount_sep" name="amount_sep"
                                            disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="editQTY_okt">QTY Okt</label>
                                        <input type="text" class="form-control" id="editQTY_okt" name="qty_okt">
                                    </div>
                                    <div class="form-group">
                                        <label for="editPrice_okt">Price Okt</label>
                                        <input type="text" class="form-control" id="editPrice_okt" name="price_okt">
                                    </div>
                                    <div class="form-group">
                                        <label for="editAmount_okt">Amount Okt</label>
                                        <input type="text" class="form-control" id="editAmount_okt" name="amount_okt"
                                            disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="editQTY_nov">QTY Nov</label>
                                        <input type="text" class="form-control" id="editQTY_nov" name="qty_nov">
                                    </div>
                                    <div class="form-group">
                                        <label for="editPrice_nov">Price Nov</label>
                                        <input type="text" class="form-control" id="editPrice_nov" name="price_nov">
                                    </div>
                                    <div class="form-group">
                                        <label for="editAmount_nov">Amount Nov</label>
                                        <input type="text" class="form-control" id="editAmount_nov" name="amount_nov"
                                            disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="editQTY_dec">QTY Dec</label>
                                        <input type="text" class="form-control" id="editQTY_dec" name="qty_dec">
                                    </div>
                                    <div class="form-group">
                                        <label for="editPrice_dec">Price Dec</label>
                                        <input type="text" class="form-control" id="editPrice_dec" name="price_dec">
                                    </div>
                                    <div class="form-group">
                                        <label for="editAmount_dec">Amount Dec</label>
                                        <input type="text" class="form-control" id="editAmount_dec" name="amount_dec"
                                            disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="editQTY_jan">QTY Jan</label>
                                        <input type="text" class="form-control" id="editQTY_jan" name="qty_jan">
                                    </div>
                                    <div class="form-group">
                                        <label for="editPrice_jan">Price Jan</label>
                                        <input type="text" class="form-control" id="editPrice_jan" name="price_jan">
                                    </div>
                                    <div class="form-group">
                                        <label for="editAmount_jan">Amount Jan</label>
                                        <input type="text" class="form-control" id="editAmount_jan" name="amount_jan"
                                            disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="editQTY_feb">QTY Feb</label>
                                        <input type="text" class="form-control" id="editQTY_feb" name="qty_feb">
                                    </div>
                                    <div class="form-group">
                                        <label for="editPrice_feb">Price Feb</label>
                                        <input type="text" class="form-control" id="editPrice_feb" name="price_feb">
                                    </div>
                                    <div class="form-group">
                                        <label for="editAmount_feb">Amount Feb</label>
                                        <input type="text" class="form-control" id="editAmount_feb" name="amount_feb"
                                            disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="editQTY_mar">QTY Mar</label>
                                        <input type="text" class="form-control" id="editQTY_mar" name="qty_mar">
                                    </div>
                                    <div class="form-group">
                                        <label for="editPrice_mar">Price Mar</label>
                                        <input type="text" class="form-control" id="editPrice_mar" name="price_mar">
                                    </div>
                                    <div class="form-group">
                                        <label for="editAmount_mar">Amount Mar</label>
                                        <input type="text" class="form-control" id="editAmount_mar" name="amount_mar"
                                            disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="editQTY_apr">QTY Apr</label>
                                        <input type="text" class="form-control" id="editQTY_apr" name="qty_apr">
                                    </div>
                                    <div class="form-group">
                                        <label for="editPrice_apr">Price Apr</label>
                                        <input type="text" class="form-control" id="editPrice_apr" name="price_apr">
                                    </div>
                                    <div class="form-group">
                                        <label for="editAmount_apr">Amount Apr</label>
                                        <input type="text" class="form-control" id="editAmount_apr" name="amount_apr"
                                            disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="editQTY_may">QTY May</label>
                                        <input type="text" class="form-control" id="editQTY_may" name="qty_may">
                                    </div>
                                    <div class="form-group">
                                        <label for="editPrice_may">Price May</label>
                                        <input type="text" class="form-control" id="editPrice_may" name="price_may">
                                    </div>
                                    <div class="form-group">
                                        <label for="editAmount_may">Amount May</label>
                                        <input type="text" class="form-control" id="editAmount_may" name="amount_may"
                                            disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="editQTY_jun">QTY Jun</label>
                                        <input type="text" class="form-control" id="editQTY_jun" name="qty_jun">
                                    </div>
                                    <div class="form-group">
                                        <label for="editPrice_jun">Price Jun</label>
                                        <input type="text" class="form-control" id="editPrice_jun" name="price_jun">
                                    </div>
                                    <div class="form-group">
                                        <label for="editAmount_jun">Amount Jun</label>
                                        <input type="text" class="form-control" id="editAmount_jun" name="amount_jun"
                                            disabled>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="saveChanges()">Save
                                    Changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tombol Hapus -->
                <button type="button" class="btn btn-danger mt-3" id="deleteButton" onclick="handleDeleteClick()"
                    disabled>Hapus</button>

            </div>

            <div class="input-group col-md-3 mr-4">
                <input type="text" name="search" style="height: 2.4rem; font-size: 12pt; margin-top: 0.10rem;"
                    id="searchp" class="form-control input-text" placeholder="Cari disini ..."
                    aria-label="Recipient's username" aria-describedby="basic-addon2">

                {{-- <input type="text" class="form-control" aria-label="Text input with dropdown button">
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <select class="form-select" id="dropdown-select">
                            @foreach($kode_budget->unique('name') as $item)
                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </ul>
                </div> --}}
            </div>
        </div>

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
                            {{--  <td>
                                @if(Auth::user()->role === 'Admin')
                                {{ $h->section }}
                                @else
                                {{ Auth::user()->role }}
                                @endif
                            </td>  --}}
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
</body>

<script>
    $(document).ready(function () {
        // Click event for the Save button
        $('#addSaveButton').click(function () {
            // Assuming you are using jQuery
            $.ajax({
                type: 'POST',
                url: '{{ url('add-home') }}', // Replace with your actual route
                data: $('#addForm').serialize(),
                success: function (response) {
                    console.log(response);

                    // Display a SweetAlert after successful submission
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Berhasil Menambahkan Data',
                    }).then(function () {
                        location.reload();
                    });
                },
                error: function (error) {
                    console.log(error);

                    // Display a SweetAlert after successful submission
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Tidak Berhasil Menambahkan Data',
                    });
                }
            });
        });
    });
</script>

<script>
    // Fungsi untuk mengirim permintaan pencarian ke server dan mengganti konten tabel
    function searchHome() {
        const selected = document.getElementById('searchp').value;
    
        fetch(`{{ route('search.home') }}?home=${selected}`)
            .then(response => response.text())
            .then(data => {
                document.getElementById('homeTableBody').innerHTML = data;
            });
    }

    // Menambahkan event listener untuk input pencarian
document.getElementById('searchp').addEventListener('input', function() {
    searchHome();
});

    // Fungsi yang akan dipanggil ketika checkbox berubah
    function handleCheckboxChange(id) {
        // Tambahkan logika yang sesuai untuk menangani perubahan checkbox di sini
        console.log('Checkbox with ID ' + id + ' changed.');
    }
</script>

<script>
    // Mendapatkan elemen-elemen select
    var codeSelect = document.getElementById('editCode');
    var namaSelect = document.getElementById('editNama');

    codeSelect.addEventListener('change', function() {
        var selectedCode = codeSelect.value;
    
       // Menghapus semua opsi dalam dropdown "Nama"
        namaSelect.innerHTML = '';
  
        // Mengambil opsi nama yang cocok dengan kode yang dipilih
        @foreach($master_barang as $code)
            if ("{{ $code->code }}" === selectedCode) {
                var option = document.createElement('option');
                option.value = "{{ $code->name }}";
                option.text = "{{ $code->name }}";
                namaSelect.add(option);
            }
        @endforeach
    });
    // Inisialisasi dengan kode pertama (jika ada kode yang terpilih secara default)
    if (codeSelect.value !== '') {
        codeSelect.dispatchEvent(new Event('change'));
    }
</script>

<script>
    // JavaScript to handle checkbox change
    function handleCheckboxChange() {
      const selectedCheckboxes = document.querySelectorAll('.sub_chk:checked');
      const editButton = document.querySelector('#editButton');
      const deleteButton = document.querySelector('#deleteButton'); // Tambahkan tombol Hapus

      if (selectedCheckboxes.length === 1) {
        editButton.removeAttribute('disabled');
      } else if (selectedCheckboxes.length > 0){
          deleteButton.removeAttribute('disabled'); // Aktifkan tombol Hapus jika satu checkbox terpilih
      }else if (selectedCheckboxes.length === 0) {
        editButton.setAttribute('disabled', 'true');
        deleteButton.setAttribute('disabled', 'true'); // Nonaktifkan tombol Hapus jika tidak ada checkbox terpilih
      } else {
        editButton.setAttribute('disabled', 'true');
        deleteButton.setAttribute('disabled', 'true'); // Nonaktifkan tombol Hapus jika lebih dari satu checkbox terpilih
      }
    }
    
    function handleDeleteClick() {
        const selectedCheckboxes = document.querySelectorAll('.sub_chk:checked');
        const selectedIds = Array.from(selectedCheckboxes).map(checkbox => checkbox.getAttribute('data-id'));
      
        if (selectedIds.length > 0) {
          Swal.fire({
            title: 'Konfirmasi Hapus',
            text: 'Apakah Anda yakin ingin menghapus data yang dipilih?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal'
          }).then((result) => {
            if (result.isConfirmed) {
              // Lakukan penghapusan data dengan AJAX
              $.ajax({
                url: '{{ url('delete-home') }}',
                method: 'POST',
                data: {
                  _token: '{{ csrf_token() }}',
                  ids: selectedIds, // Kirim array ID yang akan dihapus
                  _method: 'DELETE' // Tambahkan _method dengan nilai 'DELETE' untuk metode DELETE
                },
                success: function (response) {
                  console.log(response);
      
                  Swal.fire({
                    icon: 'success',
                    title: 'Data berhasil dihapus!',
                    showConfirmButton: false,
                    timer: 1500
                  });
      
                  setTimeout(function () {
                    window.location.href = '{{ url('home') }}';
                  }, 2000);
                },
                error: function (error) {
                  console.log(error);
                  Swal.fire({
                    icon: 'error',
                    title: 'Terjadi kesalahan!',
                    text: 'Data tidak dapat dihapus.'
                  });
                }
              });
            }
          });
        }
      }

function calculateAmount(bulan) {
    const editQtyInput = document.querySelector(`#editQTY_${bulan}`);
    const editPriceInput = document.querySelector(`#editPrice_${bulan}`);
    const editAmountInput = document.querySelector(`#editAmount_${bulan}`);
    
    function updateAmount() {
      const qty = parseFloat(editQtyInput.value) || 0;
      const price = parseFloat(editPriceInput.value) || 0;
      const amount = qty * price;
      editAmountInput.value = amount;
    }
    
    editQtyInput.addEventListener('input', updateAmount);
    editPriceInput.addEventListener('input', updateAmount);
}
  
  
    // JavaScript to open the modal and populate data for editing
    function handleEditClick() {
      const selectedCheckboxes = document.querySelectorAll('.sub_chk:checked');
      const editModal = document.querySelector('#editModal');
      const editForm = document.querySelector('#editForm');
    
      if (selectedCheckboxes.length === 1) {
        const selectedId = selectedCheckboxes[0].getAttribute('data-id');
        const section = document.querySelector(`#tr_${selectedId} td:nth-child(3)`).textContent;
        const code = document.querySelector(`#tr_${selectedId} td:nth-child(4)`).textContent;
        const nama = document.querySelector(`#tr_${selectedId} td:nth-child(5)`).textContent;
        const kode_budget = document.querySelector(`#tr_${selectedId} td:nth-child(6)`).textContent;
        const cur = document.querySelector(`#tr_${selectedId} td:nth-child(7)`).textContent;
        const fixed = document.querySelector(`#tr_${selectedId} td:nth-child(8)`).textContent;
        const prep = document.querySelector(`#tr_${selectedId} td:nth-child(9)`).textContent;
        const kode_carline = document.querySelector(`#tr_${selectedId} td:nth-child(10)`).textContent;
        const remark = document.querySelector(`#tr_${selectedId} td:nth-child(11)`).textContent;
        const qty_jul = document.querySelector(`#tr_${selectedId} td:nth-child(12)`).textContent;
        const price_jul = document.querySelector(`#tr_${selectedId} td:nth-child(13)`).textContent;
        const amount_jul = document.querySelector(`#tr_${selectedId} td:nth-child(14)`).textContent;
        const qty_aug = document.querySelector(`#tr_${selectedId} td:nth-child(15)`).textContent;
        const price_aug = document.querySelector(`#tr_${selectedId} td:nth-child(16)`).textContent;
        const amount_aug = document.querySelector(`#tr_${selectedId} td:nth-child(17)`).textContent;
        const qty_sep = document.querySelector(`#tr_${selectedId} td:nth-child(18)`).textContent;
        const price_sep = document.querySelector(`#tr_${selectedId} td:nth-child(19)`).textContent;
        const amount_sep = document.querySelector(`#tr_${selectedId} td:nth-child(20)`).textContent;
        const qty_okt = document.querySelector(`#tr_${selectedId} td:nth-child(21)`).textContent;
        const price_okt = document.querySelector(`#tr_${selectedId} td:nth-child(22)`).textContent;
        const amount_okt = document.querySelector(`#tr_${selectedId} td:nth-child(23)`).textContent;
        const qty_nov = document.querySelector(`#tr_${selectedId} td:nth-child(24)`).textContent;
        const price_nov = document.querySelector(`#tr_${selectedId} td:nth-child(25)`).textContent;
        const amount_nov = document.querySelector(`#tr_${selectedId} td:nth-child(26)`).textContent;
        const qty_dec = document.querySelector(`#tr_${selectedId} td:nth-child(27)`).textContent;
        const price_dec = document.querySelector(`#tr_${selectedId} td:nth-child(28)`).textContent;
        const amount_dec = document.querySelector(`#tr_${selectedId} td:nth-child(29)`).textContent;
        const qty_jan = document.querySelector(`#tr_${selectedId} td:nth-child(30)`).textContent;
        const price_jan = document.querySelector(`#tr_${selectedId} td:nth-child(31)`).textContent;
        const amount_jan = document.querySelector(`#tr_${selectedId} td:nth-child(32)`).textContent;
        const qty_feb = document.querySelector(`#tr_${selectedId} td:nth-child(33)`).textContent;
        const price_feb = document.querySelector(`#tr_${selectedId} td:nth-child(34)`).textContent;
        const amount_feb = document.querySelector(`#tr_${selectedId} td:nth-child(35)`).textContent;
        const qty_mar = document.querySelector(`#tr_${selectedId} td:nth-child(36)`).textContent;
        const price_mar = document.querySelector(`#tr_${selectedId} td:nth-child(37)`).textContent;
        const amount_mar = document.querySelector(`#tr_${selectedId} td:nth-child(38)`).textContent;
        const qty_apr = document.querySelector(`#tr_${selectedId} td:nth-child(39)`).textContent;
        const price_apr = document.querySelector(`#tr_${selectedId} td:nth-child(40)`).textContent;
        const amount_apr = document.querySelector(`#tr_${selectedId} td:nth-child(41)`).textContent;
        const qty_may = document.querySelector(`#tr_${selectedId} td:nth-child(42)`).textContent;
        const price_may = document.querySelector(`#tr_${selectedId} td:nth-child(43)`).textContent;
        const amount_may = document.querySelector(`#tr_${selectedId} td:nth-child(44)`).textContent;
        const qty_jun = document.querySelector(`#tr_${selectedId} td:nth-child(45)`).textContent;
        const price_jun = document.querySelector(`#tr_${selectedId} td:nth-child(46)`).textContent;
        const amount_jun = document.querySelector(`#tr_${selectedId} td:nth-child(47)`).textContent;

        document.querySelector('#editSection').value = section;
        document.querySelector('#editCode').value = code;
        document.querySelector('#editNama').value = nama;
        document.querySelector('#editKodeBudget').value = kode_budget;
        document.querySelector('#editCur').value = cur;
        document.querySelector('#editFixed').value = fixed;
        document.querySelector('#editPrep').value = prep;
        document.querySelector('#editKodeCarline').value = kode_carline;
        document.querySelector('#editRemark').value = remark;
        document.querySelector('#editQTY_jul').value = qty_jul;
        document.querySelector('#editPrice_jul').value = price_jul;
        document.querySelector('#editAmount_jul').value = amount_jul;
        document.querySelector('#editQTY_aug').value = qty_aug;
        document.querySelector('#editPrice_aug').value = price_aug;
        document.querySelector('#editAmount_aug').value = amount_aug;
        document.querySelector('#editQTY_sep').value = qty_sep;
        document.querySelector('#editPrice_sep').value = price_sep;
        document.querySelector('#editAmount_sep').value = amount_sep;
        document.querySelector('#editQTY_okt').value = qty_okt;
        document.querySelector('#editPrice_okt').value = price_okt;
        document.querySelector('#editAmount_okt').value = amount_okt;
        document.querySelector('#editQTY_nov').value = qty_nov;
        document.querySelector('#editPrice_nov').value = price_nov;
        document.querySelector('#editAmount_nov').value = amount_nov;
        document.querySelector('#editQTY_dec').value = qty_dec;
        document.querySelector('#editPrice_dec').value = price_dec;
        document.querySelector('#editAmount_dec').value = amount_dec;
        document.querySelector('#editQTY_jan').value = qty_jan;
        document.querySelector('#editPrice_jan').value = price_jan;
        document.querySelector('#editAmount_jan').value = amount_jan;
        document.querySelector('#editQTY_feb').value = qty_feb;
        document.querySelector('#editPrice_feb').value = price_feb;
        document.querySelector('#editAmount_feb').value = amount_feb;
        document.querySelector('#editQTY_mar').value = qty_mar;
        document.querySelector('#editPrice_mar').value = price_mar;
        document.querySelector('#editAmount_mar').value = amount_mar;
        document.querySelector('#editQTY_apr').value = qty_apr;
        document.querySelector('#editPrice_apr').value = price_apr;
        document.querySelector('#editAmount_apr').value = amount_apr;
        document.querySelector('#editQTY_may').value = qty_may;
        document.querySelector('#editPrice_may').value = price_may;
        document.querySelector('#editAmount_may').value = amount_may;
        document.querySelector('#editQTY_jun').value = qty_jun;
        document.querySelector('#editPrice_jun').value = price_jun;
        document.querySelector('#editAmount_jun').value = amount_jun;

        const bulanList = ['jul', 'aug', 'sep', 'okt', 'nov', 'dec', 'jan', 'feb', 'mar', 'apr', 'may', 'jun'];

        for (const bulan of bulanList) {
          calculateAmount(bulan);
        }

        $(editModal).modal('show');
      }
    }
    function saveChanges() {
        const section = document.querySelector('#editSection').value;
        const code = document.querySelector('#editCode').value;
        const nama = document.querySelector('#editNama').value;
        const kode_budget = document.querySelector('#editKodeBudget').value;
        const cur = document.querySelector('#editCur').value;
        const fixed = document.querySelector('#editFixed').value;
        const prep = document.querySelector('#editPrep').value;
        const kode_carline = document.querySelector('#editKodeCarline').value;
        const remark = document.querySelector('#editRemark').value;
        const qty_jul = document.querySelector('#editQTY_jul').value;
        const price_jul = document.querySelector('#editPrice_jul').value;
        const amount_jul = document.querySelector('#editAmount_jul').value;
        const qty_aug = document.querySelector('#editQTY_aug').value;
        const price_aug = document.querySelector('#editPrice_aug').value;
        const amount_aug = document.querySelector('#editAmount_aug').value;
        const qty_sep = document.querySelector('#editQTY_sep').value;
        const price_sep = document.querySelector('#editPrice_sep').value;
        const amount_sep = document.querySelector('#editAmount_sep').value;
        const qty_okt = document.querySelector('#editQTY_okt').value;
        const price_okt = document.querySelector('#editPrice_okt').value;
        const amount_okt = document.querySelector('#editAmount_okt').value;
        const qty_nov = document.querySelector('#editQTY_nov').value;
        const price_nov = document.querySelector('#editPrice_nov').value;
        const amount_nov = document.querySelector('#editAmount_nov').value;
        const qty_dec = document.querySelector('#editQTY_dec').value;
        const price_dec = document.querySelector('#editPrice_dec').value;
        const amount_dec = document.querySelector('#editAmount_dec').value;
        const qty_jan = document.querySelector('#editQTY_jan').value;
        const price_jan = document.querySelector('#editPrice_jan').value;
        const amount_jan = document.querySelector('#editAmount_jan').value;
        const qty_feb = document.querySelector('#editQTY_feb').value;
        const price_feb = document.querySelector('#editPrice_feb').value;
        const amount_feb = document.querySelector('#editAmount_feb').value;
        const qty_mar = document.querySelector('#editQTY_mar').value;
        const price_mar = document.querySelector('#editPrice_mar').value;
        const amount_mar = document.querySelector('#editAmount_mar').value;
        const qty_apr = document.querySelector('#editQTY_apr').value;
        const price_apr = document.querySelector('#editPrice_apr').value;
        const amount_apr = document.querySelector('#editAmount_apr').value;
        const qty_may = document.querySelector('#editQTY_may').value;
        const price_may = document.querySelector('#editPrice_may').value;
        const amount_may = document.querySelector('#editAmount_may').value;
        const qty_jun = document.querySelector('#editQTY_jun').value;
        const price_jun = document.querySelector('#editPrice_jun').value;
        const amount_jun = document.querySelector('#editAmount_jun').value;

        const selectedCheckboxes = document.querySelectorAll('.sub_chk:checked');
    
        if (selectedCheckboxes.length === 1) {
            const selectedId = selectedCheckboxes[0].getAttribute('data-id');
    
            $.ajax({
                url: '{{ url('update-home') }}/' + selectedId,
                method: 'POST',
                data: {
                    section: section,
                    code: code,
                    nama: nama,
                    kode_budget: kode_budget,
                    cur: cur,
                    fixed: fixed,
                    prep: prep,
                    kode_carline: kode_carline,
                    remark: remark,
                    qty_jul: qty_jul,
                    price_jul:price_jul,
                    amount_jul:amount_jul,
                    qty_aug: qty_aug,
                    price_aug:price_aug,
                    amount_aug:amount_aug,
                    qty_sep: qty_sep,
                    price_sep:price_sep,
                    amount_sep:amount_sep,
                    qty_okt: qty_okt,
                    price_okt:price_okt,
                    amount_okt:amount_okt,
                    qty_nov: qty_nov,
                    price_nov:price_nov,
                    amount_nov:amount_nov,
                    qty_dec: qty_dec,
                    price_dec:price_dec,
                    amount_dec:amount_dec,
                    qty_jan: qty_jan,
                    price_jan:price_jan,
                    amount_jan:amount_jan,
                    qty_feb: qty_feb,
                    price_feb:price_feb,
                    amount_feb:amount_feb,
                    qty_mar: qty_mar,
                    price_mar:price_mar,
                    amount_mar:amount_mar,
                    qty_apr: qty_apr,
                    price_apr:price_apr,
                    amount_apr:amount_apr,
                    qty_may: qty_may,
                    price_may:price_may,
                    amount_may:amount_may,
                    qty_jun: qty_jun,
                    price_jun:price_jun,
                    amount_jun:amount_jun,
                    _token: '{{ csrf_token() }}',
                },
                success: function (response) {
                    console.log(response);
    
                    Swal.fire({
                        icon: 'success',
                        title: 'Data berhasil diperbarui!',
                        showConfirmButton: false,
                        timer: 1500
                    });
    
                    setTimeout(function () {
                        window.location.href = '{{ url('home') }}';
                    }, 2000);
                },
                error: function (error) {
                    console.log(error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi kesalahan!',
                        text: 'Data tidak dapat diperbarui.'
                    });
                }
            });
        }
    }
</script>

<script>
    document.getElementById('reset-home-button').addEventListener('click', function () {
        $('#confirmResetModal').modal('show');
    });

    document.getElementById('confirmResetButton').addEventListener('click', function () {
        // Tutup modal konfirmasi
        $('#confirmResetModal').modal('hide');

        // Kirim permintaan ke rute 'reset_home' menggunakan fetch
        fetch('{{ route('reset_home') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Tampilkan modal pesan sukses
                $('#successModal').modal('show');
                location.reload();
            } else {
                alert('Terjadi kesalahan.'); // Menampilkan pesan kesalahan jika ada
            }
        })
        .catch(error => {
            console.error(error);
        });
    });
</script>

@endsection
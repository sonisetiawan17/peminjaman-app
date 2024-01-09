@extends('layouts.super')

@section('title', 'Data Users')

@push('css')
    <link href="/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
    <link href="/assets/plugins/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" />
@endpush

@section('content')
    @php
        $totalUser = App\Models\User::whereNotIn('name', ['Admin', 'Super Admin'])->count();
    @endphp

    <!-- begin breadcrumb -->
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item font-semibold"><a href="{{ route('superadmin.index') }}">Beranda</a></li>
        <li class="breadcrumb-item font-normal cursor-default">Data Users</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Data Users<small></small></h1>
    <!-- end page-header -->
    <!-- begin row -->
    <div class="row">
        <!-- begin col-112 -->
        <div class="col-xl-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                    <h4 class="panel-title">Users</h4>
                </div>

                <!-- end panel-heading -->
                <!-- begin panel-body -->
                <div class="panel-body">

                    @if (session('sukses'))
                        <div class="alert alert-success fade show">
                            <span class="close" data-dismiss="alert">×</span>

                            {{ session('sukses') }}
                        </div>
                    @endif
                    <table id="data-table-select" class="table table-striped table-bordered table-td-valign-middle"
                        width="100%">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th class="text-nowrap">Nama</th>
                                <th class="text-nowrap">Instansi</th>
                                <th class="text-nowrap">Email</th>
                                <th class="text-nowrap">No Telp</th>
                                <th class="text-nowrap">Nama Organisasi</th>
                                <th class="text-nowrap" width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach ($users as $i)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $i->name }}</td>
                                    <td>{{ $i->instansi->nama_instansi }}</td>
                                    <td>{{ $i->email }}</td>
                                    <td>{{ $i->no_telp }}</td>
                                    <td>{{ $i->nama_organisasi }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a id="modal_show" href="#" type="button" data-toggle="modal"
                                                data-target="#isimodal" 
                                                data-name="{{ $i->name }}"
                                                data-email="{{ $i->email }}"
                                                data-instansi_id="{{ $i->instansi_id }}"
                                                data-nik="{{ $i->nik }}"
                                                data-no_telp="{{ $i->no_telp }}"
                                                data-alamat="{{ $i->alamat }}"
                                                data-nama_organisasi="{{ $i->nama_organisasi }}" 
                                                class="btn btn-white"><i
                                                    class="fa fa-edit text-blue"></i></a>

                                            <form action="{{ route('superadmin.hapus_users', $i->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-white title="Hapus Data"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                                        class="fa fa-trash text-red"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end panel-body -->
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-10 -->
    </div>
    <!-- end row -->

    <!-- #modal-dialog edit -->
    <div class="modal fade" id="isimodal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data Users</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body mx-3" id="tampil_modal">
                    <form method="post" action="{{ route('superadmin.ubah_users') }}">
                        @csrf
                        <div class="form-group row m-b-15">
                            <input type="hidden" id="id" name="id">
                            <label class="col-md-5 col-form-label">Nama</label>
                            <div class="col-md-7">
                                <input required id="name" name="name" type="text" class="form-control border-gray-300 border-2 focus:border-primary focus:ring-primary focus:ring-opacity-50 rounded-md" />
                            </div>

                            <label class="col-md-5 col-form-label mt-3">Instansi</label>
                            <div class="col-md-7 mt-3">
                                <select class="border-gray-300 border-2 focus:border-primary focus:ring-primary focus:ring-opacity-50 rounded-md w-full" id="instansi_id" name="instansi_id">
                                    <option value="1">Instansi 1</option>
                                    <option value="2">Instansi 2</option>
                                    <option value="3">Instansi 3</option>
                                </select>
                            </div>

                            <label class="col-md-5 col-form-label mt-3">Email</label>
                            <div class="col-md-7 mt-3">
                                <input required id="email" name="email" type="text" class="form-control border-gray-300 border-2 focus:border-primary focus:ring-primary focus:ring-opacity-50 rounded-md" />
                            </div>

                            <label class="col-md-5 col-form-label mt-3">Password</label>
                            <div class="col-md-7 mt-3">
                                <input required name="password" type="password" class="form-control border-gray-300 border-2 focus:border-primary focus:ring-primary focus:ring-opacity-50 rounded-md" />
                            </div>

                            <label class="col-md-5 col-form-label mt-3">NIK</label>
                            <div class="col-md-7 mt-3">
                                <input required id="nik" name="nik" type="text" class="form-control border-gray-300 border-2 focus:border-primary focus:ring-primary focus:ring-opacity-50 rounded-md" />
                            </div>

                            <label class="col-md-5 col-form-label mt-3">No Telp</label>
                            <div class="col-md-7 mt-3">
                                <input required id="no_telp" name="no_telp" type="text" class="form-control border-gray-300 border-2 focus:border-primary focus:ring-primary focus:ring-opacity-50 rounded-md" />
                            </div>

                            <label class="col-md-5 col-form-label mt-3">Alamat</label>
                            <div class="col-md-7 mt-3">
                                <input required id="alamat" name="alamat" type="text" class="form-control border-gray-300 border-2 focus:border-primary focus:ring-primary focus:ring-opacity-50 rounded-md" />
                            </div>

                            <label class="col-md-5 col-form-label mt-3">Nama Organisasi</label>
                            <div class="col-md-7 mt-3">
                                <input required id="nama_organisasi" name="nama_organisasi" type="text" class="form-control border-gray-300 border-2 focus:border-primary focus:ring-primary focus:ring-opacity-50 rounded-md" />
                            </div>
                        </div>
                </div>
                <div class="modal-footer font-semibold text-sm">
                    <a href="javascript:;" class="button-ghost" data-dismiss="modal">Tutup</a>
                    <button type="submit" class="button-primary">Ubah Data</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal -->

@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).on("click", "#modal_show", function() {
            var name = $(this).data('name');
            var email = $(this).data('email');
            var instansi_id = $(this).data('instansi_id');
            var nik = $(this).data('nik');
            var no_telp = $(this).data('no_telp');
            var alamat = $(this).data('alamat');
            var nama_organisasi = $(this).data('nama_organisasi');

            $("#tampil_modal #name").val(name);
            $("#tampil_modal #email").val(email);
            $("#tampil_modal #instansi_id").val(instansi_id);
            $("#tampil_modal #nik").val(nik);
            $("#tampil_modal #no_telp").val(no_telp);
            $("#tampil_modal #alamat").val(alamat);
            $("#tampil_modal #nama_organisasi").val(nama_organisasi);
        })
    </script>
    <script src="/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="/assets/plugins/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>
    <script src="/assets/js/demo/table-manage-select.demo.js"></script>
    <script src="/assets/js/demo/ui-modal-notification.demo.js"></script>
    <script src="/assets/plugins/sweetalert/dist/sweetalert.min.js"></script>
@endpush

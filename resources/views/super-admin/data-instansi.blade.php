@extends('layouts.super')

@section('title', 'Data Jadwal')

@push('css')
    <link href="/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
    <link href="/assets/plugins/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" />
@endpush

@section('content')

    <!-- begin breadcrumb -->
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item font-semibold"><a href="{{ route('superadmin.index') }}">Beranda</a></li>
        <li class="breadcrumb-item font-normal cursor-default">Data Instansi</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Data Instansi <small></small></h1>
    <!-- end page-header -->
    <!-- begin row -->
    <div class="row">
        <!-- begin col-112 -->
        <div class="col-xl-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                    <h4 class="panel-title">Instansi</h4>
                    <div class="panel-heading-btn">
                        <a href="#modal-dialog" class="btn btn-sm btn-primary" data-toggle="modal"><i
                                class="fa fa-plus"></i> Tambah Data</a>
                    </div>
                </div>

                <!-- end panel-heading -->
                <!-- begin panel-body -->
                <div class="panel-body">
                    <table id="data-table-select" class="table table-striped table-bordered table-td-valign-middle"
                        width="100%">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th class="text-nowrap">Nama Instansi</th>
                                <th class="text-nowrap" width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach ($instansi as $i)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $i->nama_instansi }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a id="modal_show" href="#" type="button" data-toggle="modal"
                                                data-target="#isimodal" data-id_instansi="{{ $i->id_instansi }}"
                                                data-nama_instansi="{{ $i->nama_instansi }}" class="btn btn-white"><i
                                                    class="fa fa-edit text-blue"></i></a>

                                            <form action="{{ route('superadmin.hapus_instansi', $i->id_instansi) }}"
                                                method="POST" id="delete">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-white title="Hapus Data" id="delete">
                                                    <i class="fa fa-trash text-red"></i>
                                                </button>
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
    <!-- #modal-dialog -->
    <div class="modal fade" id="modal-dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Instansi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('superadmin.simpan_instansi') }}">
                        @csrf
                        <div class="form-group row m-b-15">
                            <label class="col-md-5 col-form-label">Nama Instansi</label>
                            <div class="col-md-7">
                                <input required name="nama_instansi" type="text"
                                    class="form-control border-gray-300 border-2 focus:border-primary focus:ring-primary focus:ring-opacity-50 rounded-md" />
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="button-ghost" data-dismiss="modal">Tutup</a>
                    <button type="submit" class="button-primary">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal -->


    <!-- #modal-dialog edit -->
    <div class="modal fade" id="isimodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data Instansi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body" id="tampil_modal">
                    <form method="post" action="{{ route('superadmin.ubah_instansi') }}">
                        @csrf
                        <div class="form-group row m-b-15">
                            <label class="col-md-5 col-form-label">Nama Instansi</label>
                            <div class="col-md-7">
                                <input type="hidden" id="id_instansi" name="id_instansi">
                                <input required name="nama_instansi" id="nama_instansi" type="text"
                                    class="form-control border-gray-300 border-2 focus:border-primary focus:ring-primary focus:ring-opacity-50 rounded-md" />
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
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
            var id_instansi = $(this).data('id_instansi');
            var nama_instansi = $(this).data('nama_instansi');

            $("#tampil_modal #id_instansi").val(id_instansi);
            $("#tampil_modal #nama_instansi").val(nama_instansi);

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

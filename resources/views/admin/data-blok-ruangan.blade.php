@extends('layouts.default')

@section('title', 'Data Jadwal')

@push('css')
    <link href="/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
    <link href="/assets/plugins/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" />
@endpush

@section('content')

    <!-- begin breadcrumb -->
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="javascript:;">Beranda</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Blok Ruangan</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Blok Ruangan <small></small></h1>
    <!-- end page-header -->
    <!-- begin row -->
    <div class="row">
        <!-- begin col-112 -->
        <div class="col-xl-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                    <h4 class="panel-title">Blok Ruangan</h4>
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
                                <th class="text-nowrap">Fasilitas</th>
                                <th class="text-nowrap">Tanggal Mulai</th>
                                <th class="text-nowrap">Tanggal Selesai</th>
                                <th class="text-nowrap">Keterangan</th>
                                <th class="text-nowrap" width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach ($ruangan as $i)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $i->fasilitas->nama_fasilitas }}</td>
                                    <td>{{ \Carbon\Carbon::parse($i->tgl_mulai)->format('d F Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($i->tgl_selesai)->format('d F Y') }}</td>
                                    <td>{{ $i->keterangan }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a id="modal_show" href="#" type="button" data-toggle="modal"
                                                data-target="#isimodal" 
                                                data-fasilitas_id="{{ $i->fasilitas_id }}"
                                                data-tgl_mulai="{{ $i->tgl_mulai }}"
                                                data-tgl_selesai="{{ $i->tgl_selesai }}" 
                                                data-keterangan="{{ $i->keterangan }}" 
                                                class="btn btn-white"><i
                                                    class="fa fa-edit text-blue"></i></a>

                                            <form action="{{ route('admin.hapus_blok_ruangan', $i->id_blok_ruangan) }}"
                                                method="POST">
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
    <!-- #modal-dialog -->
    <div class="modal fade" id="modal-dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Blok Ruangan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.simpan_blok_ruangan') }}">
                        @csrf
                        <div class="form-group row m-b-15">
                            <label class="col-md-5 col-form-label mt-3">Fasilitas</label>
                            <div class="col-md-7 mt-3">
                                <select class="border-gray-300 border-2 focus:border-primary focus:ring-primary focus:ring-opacity-50 rounded-md w-full" id="fasilitas_id" name="fasilitas_id">
                                    <option>--- Pilih Fasilitas ---</option>
                                    <option value="1">Fasilitas 1</option>
                                    <option value="2">Fasilitas 2</option>
                                    <option value="3">Fasilitas 3</option>
                                </select>
                            </div>

                            <label class="col-md-5 col-form-label mt-3">Tanggal Mulai</label>
                            <div class="col-md-7 mt-3">
                                <input required name="tgl_mulai" type="date" class="form-control border-gray-300 border-2 focus:border-primary focus:ring-primary focus:ring-opacity-50 rounded-md" />
                            </div>

                            <label class="col-md-5 col-form-label mt-3">Tanggal Selesai</label>
                            <div class="col-md-7 mt-3">
                                <input required name="tgl_selesai" type="date" class="form-control border-gray-300 border-2 focus:border-primary focus:ring-primary focus:ring-opacity-50 rounded-md" />
                            </div>

                            <label class="col-md-5 col-form-label mt-3">Keterangan</label>
                            <div class="col-md-7 mt-3">
                                <input required name="keterangan" type="text" class="form-control border-gray-300 border-2 focus:border-primary focus:ring-primary focus:ring-opacity-50 rounded-md" />
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
                    <h4 class="modal-title">Ubah Data Blok Ruangan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body" id="tampil_modal">
                    <form method="post" action="{{ route('admin.ubah_blok_ruangan') }}">
                        @csrf
                        <div class="form-group row m-b-15">
                            <input type="hidden" id="id_blok_ruangan" name="id_blok_ruangan">
                            <label class="col-md-5 col-form-label mt-3">Fasilitas</label>
                            <div class="col-md-7 mt-3">
                                <select class="border-gray-300 border-2 focus:border-primary focus:ring-primary focus:ring-opacity-50 rounded-md w-full" id="fasilitas_id" name="fasilitas_id">
                                    <option>--- Pilih Fasilitas ---</option>
                                    <option value="1">Fasilitas 1</option>
                                    <option value="2">Fasilitas 2</option>
                                    <option value="3">Fasilitas 3</option>
                                </select>
                            </div>

                            <label class="col-md-5 col-form-label mt-3">Tanggal Mulai</label>
                            <div class="col-md-7 mt-3">
                                <input required id="tgl_mulai" name="tgl_mulai" type="date" class="form-control border-gray-300 border-2 focus:border-primary focus:ring-primary focus:ring-opacity-50 rounded-md" />
                            </div>

                            <label class="col-md-5 col-form-label mt-3">Tanggal Selesai</label>
                            <div class="col-md-7 mt-3">
                                <input required id="tgl_selesai" name="tgl_selesai" type="date" class="form-control border-gray-300 border-2 focus:border-primary focus:ring-primary focus:ring-opacity-50 rounded-md" />
                            </div>

                            <label class="col-md-5 col-form-label mt-3">Keterangan</label>
                            <div class="col-md-7 mt-3">
                                <input required id="keterangan" name="keterangan" type="text" class="form-control border-gray-300 border-2 focus:border-primary focus:ring-primary focus:ring-opacity-50 rounded-md" />
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
            var id_blok_ruangan = $(this).data('id_blok_ruangan');
            var tgl_mulai = $(this).data('tgl_mulai');
            var tgl_selesai = $(this).data('tgl_selesai');
            var fasilitas_id = $(this).data('fasilitas_id');
            var keterangan = $(this).data('keterangan');

            $("#tampil_modal #id_blok_ruangan").val(id_blok_ruangan);
            $("#tampil_modal #tgl_mulai").val(tgl_mulai);
            $("#tampil_modal #tgl_selesai").val(tgl_selesai);
            $("#tampil_modal #fasilitas_id").val(fasilitas_id);
            $("#tampil_modal #keterangan").val(keterangan);

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

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
		<li class="breadcrumb-item"><a href="javascript:;">Beranda</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Data Jadwal</a></li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Data Jadwal <small></small></h1>
	<!-- end page-header -->
	<!-- begin row -->
	<div class="row">
		<!-- begin col-112 -->
		<div class="col-xl-12">
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<!-- begin panel-heading -->
				<div class="panel-heading">
					<h4 class="panel-title">DataTable</h4>
					<div class="panel-heading-btn">
                        <a href="#modal-dialog" class="btn btn-sm btn-primary" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Data</a>
						</div>
				</div>
				<!-- end panel-heading -->
				<!-- begin panel-body -->
				<div class="panel-body">
					<table id="data-table-select" class="table table-striped table-bordered table-td-valign-middle" width="100%">
						<thead>
							<tr>
								<th width="1%">No</th>
								<th class="text-nowrap">Nama Pemohon</th>
								<th class="text-nowrap">Kegiatan</th>
								<th class="text-nowrap">Status</th>
								<th class="text-nowrap">File</th>
								<th class="text-nowrap" width="10%">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<tr>
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td>
                                </td>
                                <td></td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-white"><i class="fa fa-search-plus text-black"></i></button>
                                        <button class="btn btn-white"><i class="fa fa-edit text-blue"></i></button>
                                        <button class="btn btn-white"><i class="fa fa-trash text-red"></i></button>
                                    </div>
                                </td>
							</tr>
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
									<h4 class="modal-title">Modal Dialog</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								</div>
								<div class="modal-body">
									<p>
										Modal body content here...
									</p>
								</div>
								<div class="modal-footer">
									<a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
									<a href="javascript:;" class="btn btn-success">Action</a>
								</div>
							</div>
						</div>
					</div>
    <!-- end modal -->
@endsection

@push('scripts')
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
@extends('layouts.default')

@section('title', 'Data Permohonan')

@push('css')
	<link href="/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" />
@endpush

@section('content')
	<!-- begin breadcrumb -->
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="javascript:;">Beranda</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Detail Data Permohonan</a></li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Detail Data Permohonan <small></small></h1>
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
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<!-- end panel-heading -->
				<!-- begin panel-body -->
				<div class="panel-body">
			<!-- begin nav-tabs -->
			<ul class="nav nav-tabs bg-light">
				<li class="nav-item">
					<a href="#default-tab-1" data-toggle="tab" class="nav-link active">
						<span class="d-sm-none">Tab 1</span>
						<span class="d-sm-block d-none">Identitas Pemohon</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="#default-tab-2" data-toggle="tab" class="nav-link">
						<span class="d-sm-none">Tab 2</span>
						<span class="d-sm-block d-none">Kegiatan</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="#default-tab-3" data-toggle="tab" class="nav-link">
						<span class="d-sm-none">Tab 3</span>
						<span class="d-sm-block d-none">Peminjaman</span>
					</a>
				</li>
			</ul>
			<!-- end nav-tabs -->
			<!-- begin tab-content -->
			<div class="tab-content pb-1">
				<!-- begin tab-pane -->
				<div class="tab-pane fade active show" id="default-tab-1">
					<!-- <h3 class="m-t-10"><i class="fa fa-cog"></i> Lorem ipsum dolor sit amet</h3> -->
					@method('PUT')
					
                    <table class="table">
                    <tr>
						<td class="bg-light">KTP</td>
						<td width="1px">:</td>
						<td></td>
					</tr>
					<tr>
						<td class="bg-light">Nama Pemohon</td>
						<td width="1px">:</td>
						<td>{{$permohonan->name}}</td>
					</tr>
					<tr>
						<td class="bg-light">No Telp</td>
						<td width="1px">:</td>
						<td></td>
					</tr>
					<tr>
						<td class="bg-light">Instansi</td>
						<td width="1px">:</td>
						<td>{{$permohonan->nama_instansi }}</td>
					</tr>
					<tr>
						<td class="bg-light">Nama Organisasi/Pribadi</td>
						<td width="1px">:</td>
						<td></td>
					</tr>
					<tr>
						<td class="bg-light">Email</td>
						<td width="1px">:</td>
						<td>{{$permohonan->email }}</td>
					</tr>
					<tr>
						<td class="bg-light">Alamat</td>
						<td width="1px">:</td>
						<td></td>
					</tr>
					</table>
				</div>
				<!-- end tab-pane -->
				<!-- begin tab-pane -->
				<div class="tab-pane fade" id="default-tab-2">
                <table class="table">
                    <tr>
						<td class="bg-light">Nama Kegiatan</td>
						<td width="1px">:</td>
						<td>{{$permohonan->nama_kegiatan}}</td>
					</tr>
					<tr>
						<td class="bg-light">Jumlah Peserta</td>
						<td width="1px">:</td>
						<td>{{$permohonan->jumlah_peserta}}</td>
					</tr>
					<tr>
						<td class="bg-light">Narasumber</td>
						<td width="1px">:</td>
						<td>{{$permohonan->narasumber}}</td>
					</tr>
					<tr>
						<td class="bg-light">Ringkasan</td>
						<td width="1px">:</td>
						<td>{{$permohonan->ringkasan }}</td>
					</tr>
					<tr>
						<td class="bg-light">Surat Permohonan</td>
						<td width="1px">:</td>
						<td>{{$permohonan->surat_permohonan}}</td>
					</tr>
					<tr>
						<td class="bg-light">Rundown Acara</td>
						<td width="1px">:</td>
						<td>{{$permohonan->rundown_acara}}</td>
					</tr>
					<tr>
						<td class="bg-light">Output (optional)</td>
						<td width="1px">:</td>
						<td>{{$permohonan->output}}</td>
					</tr>
					<tr>
						<td class="bg-light">Outcome (optional)</td>
						<td width="1px">:</td>
						<td>{{$permohonan->outcome}}</td>
					</tr>
					</table>
				</div>
				<!-- end tab-pane -->
				<!-- begin tab-pane -->
				<div class="tab-pane fade" id="default-tab-3">
                <table class="table">
                    <tr>
						<td class="bg-light">Tanggal Peminjaman</td>
						<td width="1px">:</td>
						<td></td>
					</tr>
					<tr>
						<td class="bg-light">Fasilitas di Pinjam</td>
						<td width="1px">:</td>
						<td></td>
					</tr>
					<tr>
						<td class="bg-light">Status Permohonan</td>
						<td width="1px">:</td>
						<td></td>
					</tr>
					</table>
				</div>
				<!-- end tab-pane -->
			</div>
			<!-- end tab-content -->
								<div class="modal-footer">
									<a href="javascript:;" class="btn btn-danger" data-dismiss="modal">Tolak</a>
									<a href="javascript:;" class="btn btn-success">Terima</a>
								</div>
				</div>
				<!-- end panel-body -->
			</div>
			<!-- end panel -->
		</div>
		<!-- end col-10 -->
	</div>
	<!-- end row -->
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
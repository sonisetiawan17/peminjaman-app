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
		<li class="breadcrumb-item"><a href="javascript:;">Tabel Permohonan</a></li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Tabel Permohonan <small></small></h1>
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
					<table id="data-table-select" class="table table-striped table-bordered table-td-valign-middle" width="100%">
						<thead>
							<tr>
								<th width="1%">No</th>
								<th class="text-nowrap">Nama Pemohon</th>
								<th class="text-nowrap">Instansi</th>
								<th class="text-nowrap">Kegiatan</th>
								<th class="text-nowrap">Jumlah Peserta</th>
								<th class="text-nowrap">Narasumber</th>
								<th class="text-nowrap">Status</th>
								<th class="text-nowrap">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<tr>
							@foreach($permohonan as $p)
							@php $no=1; @endphp
								<td width="1%">{{$no++}}</td>
								<td width="1%">{{ $p->name }}</td>
								<td>{{ $p->nama_instansi }}</td>
								<td>{{ $p->nama_kegiatan }}</td>
								<td>{{ $p->jumlah_peserta }}</td>
								<td>{{ $p->narasumber }}</td>
								<td>
									@if ($p->status_permohonan == NULL)
									<span class="text-primary">Menunggu</span>
									@else
									$p->status_permohonan
									@endif
								</td>
									<td class="with-btn" nowrap>
										<a href="{{route('admin.show',$p->id_permohonan)}}" class="btn btn-sm btn-primary width-60 m-r-2">Lihat</a>
										<a href="javascript:;" data-click="swal-danger" class="btn btn-sm btn-danger width-60">Delete</a>
									</td>
							@endforeach
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
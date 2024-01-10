@extends('layouts.default')

@section('title', 'Data Fasilitas')

@push('css')
    <link href="/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
    <link href="/assets/plugins/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" />

    <link href="/assets/plugins/blueimp-gallery/css/blueimp-gallery.min.css" rel="stylesheet" />
    <link href="/assets/plugins/blueimp-file-upload/css/jquery.fileupload.css" rel="stylesheet" />
    <link href="/assets/plugins/blueimp-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" />

    <link href="/assets/plugins/lightbox2/dist/css/lightbox.css" rel="stylesheet" />
@endpush

@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item font-semibold"><a href="{{ route('admin.index') }}">Beranda</a></li>
        <li class="breadcrumb-item font-normal cursor-default">Data Fasilitas</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Data Fasilitas <small></small></h1>
    <!-- end page-header -->
    <!-- begin row -->
    <div class="row shadow-sm w-100" style="margin-left: 1px;">
        <!-- begin col-112 -->
        <div class="col-xl-12">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                    <h4 class="panel-title">Fasilitas</h4>
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
                                <th class="text-nowrap">Nama Fasilitas</th>
                                <th class="text-nowrap">Foto</th>
                                <th class="text-nowrap">Keterangan</th>
                                <th class="text-nowrap" width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach ($fasilitas as $f)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $f->nama_fasilitas }}</td>
                                    <td>
                                        <div class="gallery ml-2">
                                            <a href="/foto_fasilitas/{{ $f->file }}" data-lightbox="gallery-group-1">
                                                <i class="fa fa-file-image"></i> <small> Lihat Gambar</small>
                                            </a>
                                        </div>
                                        <!-- <img src=""> -->
                                    </td>
                                    <td>
                                        <small>
                                            Nama : {{ $f->nama }}<br>
                                            Format : {{ $f->extension }}<br>
                                            Size : {{ $f->size }} KB<br>
                                        </small>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <!-- <button class="btn btn-white"><i class="fa fa-search-plus text-black"></i></button> -->
                                            <button class="btn btn-white"><i class="fa fa-edit text-blue"></i></button>

                                            <form action="{{ route('admin.hapus_fasilitas', $f->id_fasilitas) }}"
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
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Fasilitas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body mx-3">
                    <form action="{{ route('admin.simpan_fasilitas') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row m-b-15">
                            <label class="col-md-5 col-form-label">Nama Fasilitas/Ruangan</label>
                            <div class="col-md-7">
                                <input type="text" name="nama_fasilitas" class="form-control border-gray-300 border-2 focus:border-primary focus:ring-primary focus:ring-opacity-50 rounded-md" />
                            </div>
                            <label class="col-md-5 col-form-label mt-3">Foto</label>
                            <div class="col-md-7">
                                <!-- <span class="btn btn-primary fileinput-button m-r-3">
                   <i class="fa fa-fw fa-plus"></i>
                   <span>Add files...</span> -->
                                <input class="form-control ml-0 pl-0 mt-3" style="border:0" type="file" id="file"
                                    name="file" required>
                                <!--

                                    </span> -->
                            </div>
                        </div>

                        <!-- <div class="table-responsive">
                                <table class="table table-striped table-condensed text-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th width="10%">PREVIEW</th>
                                            <th>FILE INFO</th>
                                            <th width="1%"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="files">
                                        <tr data-id="empty">
                                            <td colspan="4" class="text-center text-muted p-t-30 p-b-30">
                                                <div class="m-b-10"><i class="fa fa-file fa-3x"></i></div>
                                                <div>No file selected</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> -->

                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="button-ghost" data-dismiss="modal">Batal</a>
                    <button type="submit" class="button-primary">Tambah</button>
                </div>
            </div>
        </div>
    </div>
    </form>
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

    <!-- The template to display files available for upload -->
    <script id="template-upload" type="text/x-tmpl">
		{% for (var i=0, file; file=o.files[i]; i++) { %}
		<tr class="template-upload fade show">
			<td>
				<span class="preview"></span>
			</td>
			<td>
				<div class="bg-light rounded p-10 mb-2">
					<dl class="m-b-0">
						<dt class="text-inverse">File Name:</dt>
						<dd class="name">{%=file.name%}</dd>
						<dt class="text-inverse m-t-10">File Size:</dt>
						<dd class="size">Processing...</dd>
					</dl>
				</div>
				<strong class="error text-danger h-auto d-block text-left"></strong>
			</td>
			<td nowrap>
				{% if (!i) { %}
					<button class="btn btn-default cancel width-100 p-r-20">
						<i class="fa fa-trash fa-fw text-muted"></i>
						<span>Hapus</span>
					</button>
				{% } %}
			</td>
		</tr>
		{% } %}
	</script>

    <!-- The template to display files available for download -->
    <script id="template-download" type="text/x-tmpl">
		{% for (var i=0, file; file=o.files[i]; i++) { %}
			<tr class="template-download fade show">
				<td width="1%">
					<span class="preview">
						{% if (file.thumbnailUrl) { %}
							<a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}" class="rounded"></a>
						{% } else { %}
							<div class="bg-light text-center f-s-20" style="width: 80px; height: 80px; line-height: 80px; border-radius: 6px;">
								<i class="fa fa-file-image fa-lg text-muted"></i>
							</div>
						{% } %}
					</span>
				</td>
				<td>
					<div class="bg-light p-10 mb-2">
						<dl class="m-b-0">
							<dt class="text-inverse">File Name:</dt>
							<dd class="name">
								{% if (file.url) { %}
									<a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
								{% } else { %}
									<span>{%=file.name%}</span>
								{% } %}
							</dd>
							<dt class="text-inverse m-t-10">File Size:</dt>
							<dd class="size">{%=o.formatFileSize(file.size)%}</dd>
						</dl>
						{% if (file.error) { %}
							<div><span class="label label-danger">ERROR</span> {%=file.error%}</div>
						{% } %}
					</div>
				</td>
				<td></td>
				<td>
					{% if (file.deleteUrl) { %}
						<button class="btn btn-danger delete width-100 m-r-3 p-r-20" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
							<i class="fa fa-trash pull-left fa-fw text-inverse m-t-2"></i>
							<span>Delete</span>
						</button>
						<input type="checkbox" name="delete" value="1" class="toggle">
					{% } else { %}
						<button class="btn btn-default cancel width-100 m-r-3 p-r-20">
							<i class="fa fa-trash pull-left fa-fw text-muted m-t-2"></i>
							<span>Cancel</span>
						</button>
					{% } %}
				</td>
			</tr>
		{% } %}
	</script>

    <script src="/assets/plugins/blueimp-file-upload/js/vendor/jquery.ui.widget.js"></script>
    <script src="/assets/plugins/blueimp-tmpl/js/tmpl.js"></script>
    <script src="/assets/plugins/blueimp-load-image/js/load-image.all.min.js"></script>
    <script src="/assets/plugins/blueimp-canvas-to-blob/js/canvas-to-blob.js"></script>
    <script src="/assets/plugins/blueimp-gallery/js/jquery.blueimp-gallery.min.js"></script>
    <script src="/assets/plugins/blueimp-file-upload/js/jquery.iframe-transport.js"></script>
    <script src="/assets/plugins/blueimp-file-upload/js/jquery.fileupload.js"></script>
    <script src="/assets/plugins/blueimp-file-upload/js/jquery.fileupload-process.js"></script>
    <script src="/assets/plugins/blueimp-file-upload/js/jquery.fileupload-image.js"></script>
    <script src="/assets/plugins/blueimp-file-upload/js/jquery.fileupload-audio.js"></script>
    <script src="/assets/plugins/blueimp-file-upload/js/jquery.fileupload-video.js"></script>
    <script src="/assets/plugins/blueimp-file-upload/js/jquery.fileupload-validate.js"></script>
    <script src="/assets/plugins/blueimp-file-upload/js/jquery.fileupload-ui.js"></script>
    <script src="/assets/js/demo/form-multiple-upload.demo.js"></script>

    <script src="/assets/plugins/lightbox2/dist/js/lightbox.min.js"></script>
    <script src="/assets/js/demo/gallery.demo.js"></script>
@endpush

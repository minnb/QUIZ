@extends('admin.app')
@section('title', 'Chỉnh sửa Môn học')
@section('stylesheet')
	<link href="{{ asset('public/assets/plugins/jquery.filer/css/jquery.filer.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{  asset('public/assets/plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@include('admin.layouts.flash_message')
<div class="container-fluid card">
	<br>
	<form name="create-question" action="{{ route('post.admin.subject.edit', ['id'=>fencrypt($subject_id)])}}" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
		<div class="row backgroud_white">
			<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
				<div class="form-group">
					<label>Tên môn học</label>
					<input type="text" name="name" class="form-control" placeholder="Tên môn học" required="" value="{{ old('status', isset($data) ? $data['name'] : 1) }}" />
				</div>
				<div class="form-group">
					<label>Trạng thái</label>
					<select class="form-control" name="status">
						{{ selectedOption(getStatus(),old('status', isset($data) ? $data['status'] : 1)) }}
					</select>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
				<div class="form-group">
					<label>Hình ảnh</label>
					<input class="form-control" type="file" name="fileImage[]" id="filer_example2" multiple="multiple">
					@if($data['image'] != '')
						<img src="{{ asset($data['image']) }}" class="thumbnail">
					@endif
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-xs-12 col-sm-12">
				<div class="form-group">
					<label>Diễn giải</label>
					<textarea  class="form-control" id="description" name="description">{{ old('description', isset($data) ? $data['description'] : '') }}</textarea>
				</div>
			</div>
		</div>
		<hr>
		<div class="row backgroud_white">
			<div class="col-md-12 col-lg-12">
				<button type="submit" class="btn btn-danger"><i class="fa fa-save bigfonts" aria-hidden="true"></i> Cập nhật</button>
				<a class="btn btn-info" href="{{ route('get.admin.subject.add') }}"><i class="fa fa-refresh bigfonts" aria-hidden="true"></i> Thực hiện lại</a>
				<a class="btn btn-primary" href="{{ route('get.admin.subject.list') }}"><i class="fa fa-list bigfonts" aria-hidden="true"></i> Danh sách Môn học</a>
			</div>
		</div>
	</form>
	<br>
</div>
@endsection
@section('javascript')
<script src="<?php echo asset('public/assets/plugins/func_ckfinder.js'); ?>"></script>
<script src="<?php echo asset('public/assets/plugins/ckeditor/ckeditor.js'); ?>"></script>
<script src="<?php echo asset('public/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
<script src="<?php echo asset('public/assets/plugins/waypoints/lib/jquery.waypoints.min.js') ; ?>"></script>
<script src="<?php echo asset('public/assets/plugins/counterup/jquery.counterup.min.js') ; ?>"></script>	
<script src="<?php echo asset('public/assets/plugins/jquery.filer/js/jquery.filer.min.js') ; ?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
	'use-strict';
	    $('#filer_example2').filer({
	        limit: 3,
	        maxSize: 3,
	        extensions: ['jpg', 'jpeg', 'png', 'gif', 'psd'],
	        changeInput: true,
	        showThumbs: true,
	        addMore: true
	    });
	});
	$(document).ready(function(){
        ckeditor('description')
        $('.textarea').wysihtml5();
      });
</script>
@endsection
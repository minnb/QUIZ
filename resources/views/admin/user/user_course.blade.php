@extends('admin.app')
@section('title', 'Học viên - Khóa học')
@section('content')
@include('admin.layouts.flash_message')
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
		<div class="card mb-3">
			<div class="card-body">
				<div class="table-responsive">
					<table id="data_table" class="table table-bordered table-hover display">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Email</th>
								<th>Khóa học</th>
								<th>Từ ngày</th>
								<th>Trạng thái</th>
								<th>
									<a href="#" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-fw fa-plus"></i> Thêm mới</a>
								</th>
							</tr>
						</thead>										
						<tbody>
							<?php foreach($data as $key=>$item) { ?>
							<tr>
								<td><?php echo $key + 1; $userInfo = App\Models\User::find($item->id); ?></td>
								<td>
									<a href="{{ route('get.admin.course.register', ['id'=>fencrypt($item->course_id)] )}}">{{ $userInfo->name }}</a>
								</td>
								<td>{{ $userInfo->email }}</td>
								<td>{{ App\Models\Course::getFullNameCourse($item->course) }}</td>
								<td>{{ substr($item->begin_date,0,10) }}</td>
								<td>
									@if($item->blocked == 0)
										<span>Học thử</span>
									@else
										<span style="color:blue">Học viên</span>
									@endif
								</td>
								<td>
									<a href="{{ route('get.admin.course.register', ['id'=>fencrypt($item->course_id)] )}}"><i class="fa fa-fw fa-edit"></i> Khóa học </a>
									<a href="{{ route('get.admin.course.delete', ['id'=>fencrypt($item->course_id)])}}" style="color:red" onclick="return alertDelete();"><i class="fa fa-fw fa-trash"></i> Delete</a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>														
		</div>
	</div>				
</div>
<!-- Large modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title">Chọn học viên</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div class="modal-body">
			<table id="data_table" class="table table-bordered table-hover display">
				<thead>
					<tr>
						<th>#</th>
						<th>Họ tên</th>
						<th>Email</th>
					</tr>
				</thead>										
				<tbody>
					<?php $lst = App\Models\User_Course::getListEmploye();
						foreach($lst as $key=>$item) { ?>
					<tr>
						<td><?php echo $key + 1; ?></td>
						<td>
							<a href="{{ route('get.admin.user.add.course', ['id'=>fencrypt($item->id)]) }}">
								{{ $item->name }}</td>
							</a>
						<td>
							<a href="{{ route('get.admin.user.add.course', ['id'=>fencrypt($item->id)]) }}">
								{{ $item->email }}
							</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	  </div>
	</div>
  </div>
</div>

@endsection
@section('javascript')
	<script src="{{ asset('public/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('public/assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
	<script type="text/javascript">
		$(function() {
			$('#data_table').DataTable();
		});
	</script>
@endsection
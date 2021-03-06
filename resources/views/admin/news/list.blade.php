@extends('admin.app')
@section('title', 'Danh sách Tin tức')
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
								<th>Hình đại diện</th>
								<th>Tiêu đề</th>
								<th>Danh mục</th>
								<th>Trạng thái</th>
								<th>
									<a href="{{ route('get.admin.news.add') }}" style="color:red"> <i class="fa fa-fw fa-plus"></i> Thêm mới</a>
								</th>
							</tr>
						</thead>										
						<tbody>
							<?php foreach($data as $key=>$item) { ?>
							<tr>
								<td><?php echo $key + 1; ?></td>
								<td><img src="{{ asset($item->image)}}" style="max-height: 50px;"></td>
								<td>{{ $item->name }}</td>
								<td>{{ $item->cate_id }}</td>
								<td>{{ $item->status }}</td>
								<td>
									<a href="{{ route('get.admin.news.edit',['id'=>fencrypt($item->id)])}} "><i class="fa fa-fw fa-edit"></i> Edit </a>
									<a href="{{ route('get.admin.news.delete',['id'=>fencrypt($item->id)])}}" style="color:red" onclick="return alertDelete();"><i class="fa fa-fw fa-trash"></i> Delete</a>
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
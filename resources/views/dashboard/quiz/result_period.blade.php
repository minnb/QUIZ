@extends('dashboard.app')
@section('title', 'Kết quả luyện thi')
@section('stylesheet')
    <link href="{{ asset('public/dashboard/quiz/css/quiz.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
	<div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dasboard</a></li>
                    <li class="breadcrumb-item active">Kết quả luyện thi</li>
                </ol>
                <div class="card">
                    <div class="card-header">
                        <h2 style="font-family: Arial">{{$period_name}}</h2>
                        <p class="text-muted">Khóa học: {{ App\Models\Course::getFullNameCourse($data_result['course'])}}</p>
                    </div>
                    <div class="card-body media align-items-center">
                        <div class="media-body">
                            <h4 class="mb-0"><span style="color:blue; font-size:180%;">{{ number_format($point, 1, '.', '') }}</span> điểm</h4>
                            <span class="text-muted-light">{{ App\Models\XepLoai::getXepLoai($point) }}</span>
                        </div>
                        <div class="media-right">
                            <a href="{{ route('get.dashboard.take.again', ['quiz_id'=>fencrypt($quiz_id)])}}" class="btn btn-primary">Luyện tập lại <i class="material-icons btn__icon--right">refresh</i></a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Câu hỏi</h4>
                    </div>
                    <ul class="list-group list-group-fit mb-0">
                        @foreach($answer_result as $key=>$item)
                        <li class="list-group-item">
                            <div class="media">
                                <div class="media-left">
                                    <div class="text-muted-light">{{$key+1}}.</div>
                                </div>
                                <div class="media-body">{!! App\Models\Quesstion::find($item->question_id)->name !!}</div>
                                <div class="media-right">
                                    @if($item->result == 1)
                                        <span class="badge badge-success ">Đúng </span>
                                    @ELSE
                                        <span class="badge badge-danger  ">Sai </span>
                                    @endif
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
@endsection
@section('javascript')
<script type="text/javascript" src="{{ asset('public/dashboard/quiz/js/math.js')}}"></script>
@endsection
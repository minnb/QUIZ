@extends('dashboard.app')
@section('title', 'Kết quả')
@section('content')
	<div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dasboard</a></li>
                    <li class="breadcrumb-item active">Kết quả luyện tập</li>
                </ol>
                <div class="media mb-headings align-items-center">
                    <div class="media-left">
                        <img src="assets/images/vuejs.png" alt="" width="80" class="rounded">
                    </div>
                    <div class="media-body">
                        <h1 class="h2">{{ App\Models\Thematic::find($data_result['thematic'])->name}}</h1>
                        <p class="text-muted">Khóa học: {{ App\Models\Course::getFullNameCourse($data_result['course'])}}</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Kết quả</h4>
                    </div>
                    <div class="card-body media align-items-center">
                        <div class="media-body">
                            <h4 class="mb-0">5.8</h4>
                            <span class="text-muted-light">Good</span>
                        </div>
                        <div class="media-right">
                            <a href="student-take-quiz.html" class="btn btn-primary">Luyện tập lại <i class="material-icons btn__icon--right">refresh</i></a>
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
                                    @if($item->answer == $item->result)
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
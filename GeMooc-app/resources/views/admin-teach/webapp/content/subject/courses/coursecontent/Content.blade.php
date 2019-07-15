@extends('admin-teach.webapp.content.Index')

@section('main-content')
<div class="main-content-header">
    <p id="your_course">{{$course->name}}</p>
    <div class="underline-title"></div>
</div>
<div class="container">
    <div class="row m-3">
        <div class="col-md-4">
            <button class="btn-add">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
            </button>
        </div>
        <div class="col-md-4 offset-md-4 text-right">
            <button class="btn-add"><i class="fas fa-folder-plus"></i></button>
            <button class="btn-edit"><i class="fas fa-cog    "></i></button>
        </div>
    </div>
    <div class="accordion" id="accordionExample">
        @foreach ($lessons as $key=>$lesson)
        <div class="course-content shadow" id="heading{{$lesson->id}}">
            <div class="content">
                <div class="content-header" data-toggle="collapse" data-target="#collapse{{$lesson->id}}" aria-expanded="true"
                aria-controls="collapse{{$lesson->id}}">
                    <p>บทที่ {{$key.' '.$lesson->name}} </p>
                </div>
                <div class="content-tail">
                    <div class="row">
                        <div class="col-md-6 row">
                            <div class="col-md-4 icon-status">
                                <label>
                                    <i class="fas fa-video"></i>
                                    {{$lesson->contents->where('type','1')->count()}}
                                </label>
                            </div>
                            <div class="col-md-4 icon-status">
                                <label>
                                    <i class="fas fa-clipboard-list"></i>
                                    {{$lesson->contents->where('type','2')->count()}}
                                </label>
                            </div>
                            <div class="col-md-4 icon-status">
                                <label>
                                    <i class="fa fa-question" aria-hidden="true"></i>
                                    {{$lesson->contents->where('type','3')->count()}}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 row">
                            <div class="col-md-6 icon-status">
                                <button id="edit-btn">
                                    <i class="fas fa-pencil-alt    "></i>
                                </button>
                            </div>
                            <div class="col-md-6 icon-status">
                                <button id="trash-btn">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="collapse{{$lesson->id}}" class="container collapse border rounded-lg p-5" aria-labelledby="heading{{$lesson->id}}"
            data-parent="#accordionExample">
            <div class="course-content-collapse shadow">
                <div class="course-collapse-body">
                    <div class="collapse-1">
                        <label>
                            <i class="fas fa-video"></i>
                            -
                        </label>
                    </div>
                    <div class="collapse-2">
                        <p>การลบล้างความคิดเดิม</p>
                    </div>
                    <div class="collapse-3">
                        <button>
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="course-content-collapse shadow">
                <div class="course-collapse-body">
                    <div class="collapse-1">
                        <label>
                            <i class="fas fa-clipboard-list"></i>
                            5
                        </label>
                    </div>
                    <div class="collapse-2">
                        <p>การลบล้างความคิดเดิม</p>
                    </div>
                    <div class="collapse-3">
                        <button>
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="course-content-collapse shadow">
                <div class="course-collapse-body">
                    <div class="collapse-1">
                        <label>
                            <i class="fa fa-question" aria-hidden="true"></i>
                            1
                        </label>
                    </div>
                    <div class="collapse-2">
                        <p>การลบล้างความคิดเดิม</p>
                    </div>
                    <div class="collapse-3">
                        <button>
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
            <button class="add-content" ><i class="fa fa-plus" aria-hidden="true"></i></button>
        </div>
        @endforeach
    </div>
</div>
@endsection

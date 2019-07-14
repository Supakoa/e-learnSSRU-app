@extends('admin-teach.webapp.content.Index')

@section('main-content')
<div class="main-content-header">
    <p id="your_course">Your content</p>
    <div class="underline-title"></div>
</div>
<div class="container">
    <div class="row">
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
        <div class="course-content shadow" id="headingOne">
            <div class="content">
                <div class="content-header" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                aria-controls="collapseOne">
                    <p>บทที่ 1 การลบล้างความคิดเดิม</p>
                </div>
                <div class="content-tail">
                    <div class="row">
                        <div class="col-md-6 row">
                            <div class="col-md-4 icon-status">
                                <label>
                                    <i class="fas fa-video"></i>
                                    -
                                </label>
                            </div>
                            <div class="col-md-4 icon-status">
                                <label>
                                    <i class="fas fa-clipboard-list"></i>
                                    5
                                </label>
                            </div>
                            <div class="col-md-4 icon-status">
                                <label>
                                    <i class="fa fa-question" aria-hidden="true"></i>
                                    1
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
        <div id="collapseOne" class="container collapse " aria-labelledby="headingOne"
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
                <a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a>
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
                <a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a>
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
                <a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection

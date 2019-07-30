@extends('admin-teach.webapp.content.Index')

@section('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssBackdoor/ceQuiz.css')}}">
@endsection

@section('main-content')
<div class="col-md-4 offset-md-4">
    <div class="text-center">
        <h2 style="border-bottom:2px solid gray;padding:10px;">ผู้สอน</h2>
    </div>
</div>
<div class="card">
    <div class="col-md-4 offset-md-8">
        <div class="text-right">
            <button class="btn-add-people">
                Add
            </button>
        </div>
    </div>
    <div class="card-body table-responsive">
        <table class="display table table-hover" id="tableTeach">
            <thead class="text-center">
                <tr>
                    <th scope="col">ลำดับ</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr>

                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')

@endsection

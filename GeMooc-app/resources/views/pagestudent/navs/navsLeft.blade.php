@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssStudent/navsLeft.css')}}">
@endpush
@section('background')
{{url('storage/'.$course->image)}}\
@endsection
<div class="navsLeft">
    <ul>
        <li>
            <h3 class="course_header">
                {{$lessons->first()->course->name}}
            </h3>
        </li>
        @foreach ($lessons as $lesson)
        <li>
        <a class="btn-block" data-toggle="collapse" href="#lesson_{{$lesson->id}}" role="button" aria-expanded="false"
                    aria-controls="lesson_{{$lesson->id}}" id="main_lesson_{{$lesson->id}}">
                   {{ $lesson->name}} <i class="fas fa-chevron-down"></i>
                </a>
                <div class="collapse" id="lesson_{{$lesson->id}}">
                    <ul>
                        @foreach ($lesson->contents as $content)
                            <li id="content_{{$content->id}}">
                                @if ($content->type == 1)
                                        <a href="{{url('std_view/course/content/'.$content->id)}}" class="btn-block">{{$content->name}} <i class="fas fa-video"></i></a>
                                @elseif ($content->type == 2)
                                        <a class="btn-block" href="{{url('std_view/course/content/'.$content->id)}}">{{$content->name}} <i class="far fa-file-alt"></i></a>
                                @else
                                        <a class="btn-block" href="{{url('std_view/course/content/'.$content->id)}}">{{$content->name}} <i class="fas fa-question"></i></a>
                                @endif
                            </li>
                        @endforeach

                    </ul>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@if (auth()->user()->course($course)->count())
        @else
        <div class="card mt-5 p-3" id="formsRegiscourse">
                <div class="text-center m-auto">
                    <h4>
                        ต้องการเรียนวิชานี้ !!
                    </h4>
                    <a href="{{url('std_view/course/'.$course->id.'/enroll')}}" class="btn ">
                        ลงทะเบียน
                    </a>
                </div>
            </div>

        @endif


@push('js')
<script>
    @if(isset($now_content))
    $(document).ready(function () {
        $('#main_lesson_{{$now_content->lesson->id}}').trigger("click");
        $('#content_{{$now_content->id}}').addClass('now_content');
    });
    @endif
</script>
@endpush

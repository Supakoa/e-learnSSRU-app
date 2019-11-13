@push('links')
<link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/cssStudent/navsLeft.css')}}">
@endpush
@section('background')
{{url('storage/'.$course->image)}}\
@endsection
@if ($course->open<=date('Y-m-d')&&$course->close>=date('Y-m-d'))
    @if (auth()->user()->course($course)->count())
    @else
    <div class="card  mb-5 p-3" id="formsRegiscourse">
        <div class="text-center m-auto">
            <h4>
                กรุณาลงทะเบียนก่อน.
            </h4>
            <a href="{{url('std_view/course/'.$course->id.'/enroll')}}" class="btn ">
                ลงทะเบียน
            </a>
        </div>
    </div>

    @endif
@endif

<div class="navsLeft">
    <ul>
        <li class="p-0">
            <p class="course_header text-justify">
                {{$lessons->first()->course->name}}
            </p>
        </li>
        @foreach ($lessons as $lesson)
        @php
        $user = auth()->user();
        $sum_progress = 0;
        $n_contents = $lesson->contents->count();
        $n_contents==0 ? $n_contents=1 : $n_contents= $n_contents ;
        $sum_lesson = 0;
        @endphp
        <li>
            <a class="btn-block" data-toggle="collapse" href="#lesson_{{$lesson->id}}" role="button"
                aria-expanded="false" aria-controls="lesson_{{$lesson->id}}" id="main_lesson_{{$lesson->id}}">
                {{ $lesson->name}} <i class="fas fa-chevron-down"></i>
                <div class="progress" style="height: 15px">
                    <div class="progress-bar" id="lesson_bar_{{$lesson->id}}" role="progressbar"
                        style="width: 25%;height:15px;font-size: 5px" aria-valuenow="25" aria-valuemin="0"
                        aria-valuemax="100">100%</div>
                </div>
            </a>

            <div class="collapse" id="lesson_{{$lesson->id}}">
                <ul class="border rounded">
                    @foreach ($lesson->contents as $content)
                    @php

                        $progress = $content->progress_user($user->id)->orderBy('progresses.created_at', 'desc');
                        if($pro = $progress->first()){
                            if($pro = $pro->pivot->percent){
                                $sum_progress += $pro;
                            }else{
                                $sum_progress += 0;
                            }
                        }else{
                            $sum_progress += 0;
                        }
                    @endphp
                    <li id="content_{{$content->id}}" class="border-0">
                        @if ($content->type == 1)
                        <a href="{{url('std_view/course/content/'.$content->id)}}" class="btn-block">{{$content->name}}
                            <i class="fas fa-video"></i></a>
                        @elseif ($content->type == 2)
                        <a class="btn-block" href="{{url('std_view/course/content/'.$content->id)}}">{{$content->name}}
                            <i class="far fa-file-alt"></i></a>
                        @else
                        <a class="btn-block" href="{{url('std_view/course/content/'.$content->id)}}">{{$content->name}}
                            <i class="fas fa-question"></i></a>
                        @endif
                        <div class="progress" style="height: 10px">
                            <div class="progress-bar" id="content_bar_{{$lesson->id}}" role="progressbar"
                                style="width: {{$pro!=0 ? ''.$pro :'0'}}%;height:10px;font-size: 50%"
                                aria-valuenow="{{$pro!=0 ? ''.$pro :'0'}}" aria-valuemin="0" aria-valuemax="100">
                                {{$pro!=0 ? ''.$pro :'0'}}%</div>
                        </div>
                    </li>
                    @endforeach
                    @php
                    $sum_lesson += $sum_progress/$n_contents ;

                    @endphp
                    @if ($n_contents)
                    @else
                        @php
                            $sum_lesson +=100;
                        @endphp
                    @endif
                    <script>
                        $("#lesson_bar_{{$lesson->id}}").css('width', '{{$sum_lesson}}' + '%');
                        per = ({{$sum_lesson}}).toFixed(2)
                        $("#lesson_bar_{{$lesson->id}}").text(per + '%');
                        per = 0;
                        //  percents = {"lesson":{{$lesson->id}},"percent":{{$sum_lesson}}}
                    </script>
                </ul>
            </div>
        </li>
        @endforeach
    </ul>
</div>



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

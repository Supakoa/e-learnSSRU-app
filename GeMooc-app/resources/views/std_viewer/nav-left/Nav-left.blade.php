<section id="ce-navleft fixed-top">
    <ul class="ce-accordion-menu">
        @foreach ($lessons as $key => $lesson)
        @if (isset($now_content))
        @if ($now_content->lesson->id == $lesson->id)
        <li class="open">
            @else
        <li>
            @endif
            @else
        <li>
            @endif
            <div class="ce-dropdownlink">Chapter {{($key+1)." ".$lesson->name}}
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
            </div>
            <ul class="ce-submenuItems" @if (isset($now_content)) @if ($now_content->lesson->id == $lesson->id)
                style="display: block;"
                @endif
                @endif
                >
                @foreach ($lesson->contents as $content)
                <li @if (isset($now_content)) @if ($content->id == $now_content->id)
                    style = "background-color: rgb(189, 227, 252);";
                    @endif
                    @endif
                    ><a class="less" href="{{url('std_view/course/content/'.$content->id)}}">{{$content->name}}</a></li>

                @endforeach
            </ul>
        </li>
        @endforeach
    </ul>
</section>
    @if (auth()->user()->course($course)->count())



    @else

    <div class="card mt-5 ml-3" style="width: 11em; position:fixed">
            <div class="card-body">
                <img src="{{url('/storage/'.$course->sm_banner)}}" class="card-img-top" width="80%">
                <hr>
                <small>กรุณาลงทะเบียน</small>
                <h5 class="card-title">{{$course->name}}</h5>
                {{-- <p class="card-text">Detail this</p> --}}
                <a href="{{url()->current().'/enroll'}}" class="btn btn-primary btn-sm">ลงทะเบียน </a>
                <a href="#" class="btn btn-outline-info btn-sm" hidden> เริ่มเรียน</a>
            </div>
        </div>
    @endif




<section id="ce-navleft fixed-top">
    {{-- {{ dd($now_content->get()) }} --}}
    <ul class="ce-accordion-menu">
        @foreach ($lessons as $key => $lesson)
        @php
        $user = auth()->user();
        $sum_progress = 0;
        $n_contents = $lesson->contents->count();
        @endphp
        @if ($n_contents)
        @if (isset($now_content))
        @if ($now_content->lesson->id == $lesson->id)
        <li class="open">
            @else
        <li>
            @endif
            @else
        <li>
            @endif
            <div class="ce-dropdownlink">Chapter {{($key+1)." ".$lesson->name}} <div id='lesson_{{$lesson->id}}'></div>
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
            </div>
            <ul class="ce-submenuItems" @if (isset($now_content)) @if ($now_content->lesson->id == $lesson->id)
                style="display: block;"
                @endif
                @endif
                >
                @foreach ($lesson->contents as $content)
                @php
                $sum_lesson = 0;
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
                <li @if (isset($now_content)) @if ($content->id == $now_content->id)
                    style = "background-color: rgb(189, 227, 252);";
                    @endif
                    @endif
                    ><a class="less"
                        href="{{url('std_view/course/content/'.$content->id)}}">{{$content->name."   ".$pro."% "}}</a>
                </li>

                @endforeach

            </ul>
        </li>
        @php
        $sum_lesson += $sum_progress/$n_contents ;

        @endphp
        @else
        @php
        $sum_lesson +=100;
        @endphp
        @endif
        <script>
            $("#lesson_{{$lesson->id}}").text('{{$sum_lesson}}');
            //  percents = {"lesson":{{$lesson->id}},"percent":{{$sum_lesson}}}

        </script>
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

@section('js')
<script>
    $(function () {
        var Accordion = function (el, multiple) {
            this.el = el || {};
            // more then one submenu open?
            this.multiple = multiple || false;

            var dropdownlink = this.el.find('.ce-dropdownlink');
            dropdownlink.on('click', {
                    el: this.el,
                    multiple: this.multiple
                },
                this.dropdown);
        };

        Accordion.prototype.dropdown = function (e) {
            var $el = e.data.el,
                $this = $(this),
                //this is the ul.ce-submenuItems
                $next = $this.next();

            $next.slideToggle();
            $this.parent().toggleClass('open');

            if (!e.data.multiple) {
                //show only one menu at the same time
                $el.find('.ce-submenuItems').not($next).slideUp().parent().removeClass('open');
            }
        }

        var accordion = new Accordion($('.ce-accordion-menu'), false);
    })
    @if(auth() - > user() - > course($course) - > count())
    @else
    $('.less').prop('href', '#');
    @endif
    // alert(JSON.stringify(percents));

</script>
@endsection

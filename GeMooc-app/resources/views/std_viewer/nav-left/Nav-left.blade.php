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
                    ><a href="{{url('std_view/course/content/'.$content->id)}}">{{$content->name}}</a></li>

                @endforeach
            </ul>
        </li>
        @endforeach
    </ul>
</section>
<div class="card mt-5" style="width: auto;">
        <div class="card-body">
    <img src="" class="card-img-top" width="80%" >
            <hr>
            <h5 class="card-title">.</h5>
            <p class="card-text"></p>
        <a href="#" class="btn btn-primary btn-sm" >ลงทะเบียน </a>
        <a href="#" class="btn btn-outline-info btn-sm" hidden> เริ่มเรียน</a>
        </div>
    </div>

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

</script>
@endsection

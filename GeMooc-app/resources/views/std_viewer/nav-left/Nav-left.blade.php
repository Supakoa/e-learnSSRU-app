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
                <ul class="ce-submenuItems"
                @if (isset($now_content))
                    @if ($now_content->lesson->id == $lesson->id)
                    style="display: block;"
                    @endif
                 @endif
                >
                    @foreach ($lesson->contents as $content)
                        <li
                        @if (isset($now_content))
                            @if ($content->id == $now_content->id)
                                style = "background-color: rgb(189, 227, 252);";
                            @endif
                        @endif
                        ><a href="{{url('std_view/course/'.$lesson->course->id.'/content/'.$content->id)}}">{{$content->name}}</a></li>

                    @endforeach
                </ul>
            </li>
        @endforeach

        {{-- <li>
            <div class="ce-dropdownlink">Chapter 2
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
            </div>
            <ul class="ce-submenuItems">
                <li><a href="#">Fiction book 1</a></li>
                <li><a href="#">Fiction book 2</a></li>
                <li><a href="#">Fiction book 3</a></li>
            </ul>
        </li>
        <li>
            <div class="ce-dropdownlink">Chapter 3
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
            </div>
            <ul class="ce-submenuItems">
                <li><a href="#">Fantasy book 1</a></li>
                <li><a href="#">Fantasy book 2</a></li>
                <li><a href="#">Fantasy book 3</a></li>
            </ul>
        </li>
        <li>
            <div class="ce-dropdownlink">Chapter 4
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
            </div>
            <ul class="ce-submenuItems">
                <li><a href="#">Action book 1</a></li>
                <li><a href="#">Action book 2</a></li>
                <li><a href="#">Action book 3</a></li>
            </ul>
        </li> --}}
    </ul>
</section>

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
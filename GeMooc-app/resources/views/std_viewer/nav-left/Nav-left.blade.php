<section id="ce-navleft fixed-top">
    <ul class="ce-accordion-menu">
        <li>
            <div class="ce-dropdownlink">Chapter 1
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
            </div>
            <ul class="ce-submenuItems">
                <li><a href="#">History book 1</a></li>
                <li><a href="#">History book 2</a></li>
                <li><a href="#">History book 3</a></li>
            </ul>
        </li>
        <li>
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
        </li>
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

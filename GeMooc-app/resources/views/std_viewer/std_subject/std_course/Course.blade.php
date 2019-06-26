@extends('layouts.appViewer')

@section('content')

<div class="row">
    <div class="col-md-2 p-0">
        @include('std_viewer.nav-left.Nav-left',$lessons)
    </div>
    <div class="col-md-10">
        <div class="card ce-card">
            <div class="justify-content-center p-0">
                <div class="ce-conainer">
                    <h1 class="ce-name">{{$course->name}}</h1>
                    <div class="row justify-content-center mb-5">
                        <div class="col">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item"
                                    src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    @if ($lessons->count()>0)
                    <div class="container">
                        <div class="accordion" id="accordionExample">
                            @foreach ($lessons as $lesson)
                            <div class="card">
                                <div class="card-header" id="heading_{{$lesson->id}}">
                                    <button class="btn btn-text collapsed btn-block" type="button"
                                        data-toggle="collapse" data-target="#collapse_{{$lesson->id}}"
                                        aria-expanded="true" aria-controls="collapse_{{$lesson->id}}">
                                        Chapter #1
                                    </button>
                                </div>
                                <div id="collapse_{{$lesson->id}}" class="collapse"
                                    aria-labelledby="heading_{{$lesson->id}}" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="btn-group-vertical btn-block btm-lg"
                                                    aria-label="Vertical button group" role="group">
                                                    @foreach ($lesson->contents as $content)
                                                    @if ($content->type=='1')
                                                    <button type="button" class="btn p-3 btn-light text-right">
                                                        <div class="row">
                                                            <div class="col-md-6 text-right">
                                                                {{$content->name}}
                                                            </div>
                                                            <div class="col-md-6 text-right">
                                                                <i class="fas fa-video"> </i>
                                                            </div>
                                                        </div>
                                                    </button>
                                                    @elseif($content->type=='2')
                                                    <button type="button" class="btn btn-light p-3 text-right">
                                                        <div class="row">
                                                            <div class="col-md-6 text-right">
                                                                {{$content->name}}
                                                            </div>
                                                            <div class="col-md-6 text-right">
                                                                <i class="far fa-clipboard"> </i>
                                                            </div>
                                                        </div>
                                                    </button>
                                                    @else
                                                    <button type="button" class="btn btn-light p-3 text-right">
                                                        <div class="row">
                                                            <div class="col-md-6 text-right">
                                                                {{$content->name}}
                                                            </div>
                                                            <div class="col-md-6 text-right">
                                                                <i class="fas fa-question"> </i>
                                                            </div>
                                                        </div>
                                                    </button>
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @else
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Now, this page Empty!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('modal')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                แน่นะ
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection
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
    @if (auth()->user()->course($course)->count())
    @else
        $('.less').prop('href','#');
    @endif

</script>
@endsection

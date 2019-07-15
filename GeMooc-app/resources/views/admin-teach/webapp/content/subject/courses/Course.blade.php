@extends('admin-teach.webapp.content.Index')

@section('main-content')
<div class="main-content-header">
    <p id="your_course">Your Course</p>
    <div class="underline-title"></div>
</div>
<div class="container">
    <div class="row m-3">
        <div class="offset-md-8 col-md-4 text-right">
            <button class="btn-add"><i class="fas fa-folder-plus"></i></button>
            <button class="btn-edit"><i class="fas fa-cog    "></i></button>
        </div>
    </div>
    <div class="row">
            <div class="your-class">
                    <div>your content</div>
                    <div>your content</div>
                    <div>your content</div>
                  </div>
        <div class="col-md-4">
            <div class="card-subject">
                <div class="card-subject-header">
                    <div class="status-bar" style="background: #6BB844;"></div>
                    <img src="https://www.showbusinessweekly.com/wp-content/uploads/2016/12/Break-into-show-business-777x437.jpg"
                        class="shadow" width="100%" height="100%">
                </div>
                <div class="card-subject-body">
                    <div class="card-content-header">
                        <p>subject name</p>
                    </div>
                    <div class="card-content-body">
                        <ul class="list-unstyled">
                            <li>
                                บทเรียน 4 บท
                            </li>
                            <li>
                                เปิดรับสมัคร 200/500 คน
                            </li>
                            <li>
                                เปิดรับ 15 - 30 มิ.ย. 62
                            </li>
                        </ul>
                    </div>
                    <div class="btn-subject">
                        <button>ไปที่คอร์ส</button>
                        <a><i class="fas fa-cog    "></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-subject">
                <div class="card-subject-header">
                    <div class="status-bar" style="background:red"></div>
                    <img src="https://www.showbusinessweekly.com/wp-content/uploads/2016/12/Break-into-show-business-777x437.jpg"
                        class="shadow" width="100%" height="100%">
                </div>
                <div class="card-subject-body">
                    <div class="card-content-header">
                        <p>subject name</p>
                    </div>
                    <div class="card-content-body">
                        <ul class="list-unstyled">
                            <li>
                                บทเรียน 4 บท
                            </li>
                            <li>
                                เปิดรับสมัคร 200/500 คน
                            </li>
                            <li>
                                เปิดรับ 15 - 30 มิ.ย. 62
                            </li>
                        </ul>
                    </div>
                    <div class="btn-subject">
                        <button>ไปที่คอร์ส</button>
                        <a><i class="fas fa-cog    "></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-subject">
                <div class="card-subject-header">
                    <div class="status-bar" style="background: #6BB844;"></div>
                    <img src="https://www.showbusinessweekly.com/wp-content/uploads/2016/12/Break-into-show-business-777x437.jpg"
                        class="shadow" width="100%" height="100%">
                </div>
                <div class="card-subject-body">
                    <div class="card-content-header">
                        <p>subject name</p>
                    </div>
                    <div class="card-content-body">
                        <ul class="list-unstyled">
                            <li>
                                บทเรียน 4 บท
                            </li>
                            <li>
                                เปิดรับสมัคร 200/500 คน
                            </li>
                            <li>
                                เปิดรับ 15 - 30 มิ.ย. 62
                            </li>
                        </ul>
                    </div>
                    <div class="btn-subject">
                        <button>ไปที่คอร์ส</button>
                        <a><i class="fas fa-cog    "></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

ิ
@section('js')
<script>
$('.responsive').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

</script>
@endsection

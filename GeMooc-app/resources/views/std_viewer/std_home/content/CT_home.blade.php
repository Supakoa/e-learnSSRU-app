<div class="ce-container">
    <div class="container">
        <h5 class="ce-name col-md-4 offset-md-4">
            กำลังเรียน...
        </h5>
        <div class="row mb-1 justify-content-center mb-3" style="min-height:40vh">
            @php
                $user = auth()->user();
                $courses = auth()->user()->courses;
                $percent = auth()->user()->progresses;
            @endphp
            {{-- {{ dd($percent) }} --}}
            @foreach ($courses as $course)
                @php
                    $sum_course = 0;
                    $sum_lesson = 0;
                    $n_lessons = $course->lessons->count();

                    foreach($course->lessons as $lesson){
                        $sum_progress = 0;
                        $n_contents = $lesson->contents->count();

                        foreach ($lesson->contents as $key=>$content) {
                            $progress = $content->progress_user($user->id);
                            if($pro = $progress->first()){
                                if($pro = $pro->pivot->percent){
                                    $sum_progress += $pro;
                                }else{
                                    $sum_progress += 0;
                                }
                            }else{
                                $sum_progress += 0;
                            }
                        }
                        $sum_lesson += $sum_progress/$n_contents ;
                    }
                    $sum_course = $sum_lesson/$n_lessons;
                @endphp
                <div class="col-md-3">
                    <div class="card" style="width: 11rem;">
                        <img class="card-img-top" src="https://i.ytimg.com/vi/tsjd7xdgfjA/maxresdefault.jpg"
                            alt="Card image cap">
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar progress-bar-striped bg-info" role="progressbar"
                                style="width: {{(int)($sum_course)}}%" aria-valuenow="20" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">name</h5>
                            <a href="{{ url("std_view/course/".$course->id) }}" target="_blank"
                                class="btn btn-primary btn-sm">Get started</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="ce-line"></div>
        <h5 class="ce-name col-md-4 offset-md-4">
            คอร์สที่เรียนสำเร็จ
        </h5>
        <div class="row justify-content-center mb-3" style="min-height:40vh">
            <div class="col-md-12 ">
                <div class="card" style="width: 11rem;">
                    <img class="card-img-top" src="https://i.ytimg.com/vi/tsjd7xdgfjA/maxresdefault.jpg"
                        alt="Card image cap">
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 100%"
                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <a href="#" class="btn btn-primary btn-sm">Open result</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="Edit_question_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แก้ไขคำถาม</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('question/'.$question->id)}}" method="post" id="question_edit_form"
                    enctype='multipart/form-data'>
                    @csrf
                    @method('PATCH')
                    <div class="ce-container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="edit-quiz">
                                    <div class="row mb-3">
                                        <div class="col-md-12 row">
                                            <label for="name-quiz" class="col-sm-2 col-form-label">โจทย์ :</label>
                                            <div class="col-md-8">
                                                <textarea name="name" id="name-quiz" rows="5"
                                                    class="form-control">{{$question->name}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">

                                        <img src="{{$question->image ? url('/storage/'.$question->image) :  url('/storage/cover_image_subject/no_image.jpg')}}"
                                            alt="" height="300px" width="auto" srcset="">
                                    </div>
                                    <div class="row mb-5">
                                        <div class="offset-md-3 col-md-6">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" style="padding:3px"
                                                    name="cover_image" placeholder="Image">
                                                <label class="custom-file-label" for="inputGroupFile01">แก้ไขรูป</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <ul>
                                                @php
                                                $i=1;
                                                @endphp
                                                @foreach ($question->answers as $answer)
                                                <li>
                                                    <div class="row p-2">
                                                        <div class="col-sm-12">
                                                            @php
                                                            $check = '';
                                                            if($answer->correct!=0){
                                                            $check = 'checked';
                                                            }
                                                            @endphp
                                                            <label for="answer[]">{{$i}}.</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="answer[]"
                                                                    value="{{$answer->name}}">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <input type="radio" name="correct" {{$check}}
                                                                            value="{{$i++}}" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-top-0">
                <button type="submit" class="btn btn-primary" form="question_edit_form">บันทึก</button>
            </div>
        </div>
    </div>
</div>

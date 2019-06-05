<div class="modal fade " id="Edit_question_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Question </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('question/'.$question->id)}}" method="post" id="question_edit_form" enctype='multipart/form-data'>
                    @csrf
                    @method('PATCH')
                    <div class="ce-container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="edit-quiz">
                                    <div class="row mb-3">
                                        <div class="col-md-12 row">
                                            <label for="name-quiz" class="col-sm-2 col-form-label">Question :</label>
                                            <div class="col-md-8">
                                                <textarea name="name" id="name-quiz"
                                                    class="form-control">{{$question->name}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <img src="/storage/{{$question->image}}" alt="" width="auto" height="300px" srcset="">
                                    </div>
                                    <div class="row mb-5">
                                        <div class="offset-md-3 col-md-6">
                                            <input type="file" class="form-control btn" style="padding:3px"
                                                name="cover_image" placeholder="Image">
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
                                                        <div class="row">
                                                            <label for="answer[]" class="col-sm-2 col-form-label">{{$i}}.</label>
                                                            <div class="col-sm-8">
                                                            <input name="answer[]" type="text" value="{{$answer->name}}" class="form-control">
                                                            </div>
                                                            @php
                                                                $check = '';
                                                                if($answer->correct!=0){
                                                                    $check = 'checked';
                                                                }
                                                            @endphp
                                                            <div class="col-md-2">
                                                                <div class="input-group-prepend mr-1">
                                                                    <div class="input-group-text">
                                                                        <input type="radio" name="correct" {{$check}} value="{{$i++}}"
                                                                            aria-label="Radio button for following text input"
                                                                            required>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="question_edit_form">Save changes</button>
            </div>
        </div>
    </div>
</div>

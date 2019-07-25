{{-- {{$course}} --}}
<div class="modal fade " id="Edit_Course_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="offset-md-8 col-md-2 text-right" style="margin-right:-20px">
                        <span>Online :</span>
                    </div>
                    <div class="col-md-1">
                        @php
                        $check = '';
                        if($course->status!=0){
                            $check = 'checked';
                        }
                        @endphp
                        <input class="tgl tgl-flat" id="cb4" name="status" {{$check}} form="course_form" value='1' type="checkbox" />
                        <label class="tgl-btn" for="cb4"></label>

                    </div>
                    <div class="col-md-1 text-right">
                        <button class="btn btn-outline-danger btn-sm" onclick="delete_course('{{$course->id}}')"><i class="fa fa-trash"
                                aria-hidden="true"></i></button>
                    </div>
                </div>
                <form action="{{url('course/'.$course->id)}}" method="post" enctype='multipart/form-data'
                    id="course_form">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">Course Name</label>
                        <input type="text" class="form-control" name="name" value="{{$course->name}}"
                            placeholder="Course Name">
                    </div>
                    <div class="form-group">
                        <label for="detail">Detail</label>
                        <input type="text" class="form-control" name="detail" value="{{$course->detail}}"
                            placeholder="Course Detail">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                    <label for="name">Open</label>
                                    <input type="date" class="form-control" name="open" value="{{$course->open}}">
                            </div>
                            <div class="col">
                                    <label for="name">Close</label>
                                    <input type="date" class="form-control" name="close" value="{{$course->close}}" >
                            </div>
                        </div>


                    </div>
                    {{-- <div class="form-group">

                    </div> --}}
                    <div class="form-group">
                            <div class="row">
                                <div class="col">
                                        <label for="name">Total</label>
                                        <input type="number" class="form-control" name="total" value="{{$course->total}}" placeholder="Course Name">
                                </div>
                                <div class="col">
                                        <label for="name">Cover Image</label>
                                        <input type="file" class="form-control btn" style="padding:3px" name="cover_image"
                                            placeholder="Image">
                                </div>
                            </div>
                    </div>

                    <div class="form-group text-center">
                            <img src="{{url('/storage/'.$course->image)}}" alt="" width="100%" srcset="">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="course_form">Save changes</button>
            </div>
        </div>
    </div>
</div>
<form action="{{url('course/'.$course->id)}}" method="post" id='form_del_Course'>
    @csrf
    @method('DELETE')
</form>

<script>
function delete_course(id){
        Swal.fire({
            title: 'Are you sure?',
            text: "All Course in Course will be deleted as well. (ต้องแก้คำมั้ง)",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $('#form_del_Course').submit();
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        });
    }
</script>

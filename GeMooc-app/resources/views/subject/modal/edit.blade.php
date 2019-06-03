
<div class="modal fade" id="Edit_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Subject -> {{$sub->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="offset-md-8 col-md-2 text-right" style="margin-right:-20px">
                        <span>Online :</span>
                    </div>
                    <div class="col-md-1 ">
                        {{-- <label for="cb4">Online :</label> --}}
                        @php
                        $check = '';
                        if($sub->status!=0){
                            $check = 'checked';
                        }
                        @endphp
                        <input class="tgl tgl-flat" id="cb4" {{$check}} value="1" form="sub_form"  name = 'status'type="checkbox" />
                        <label class="tgl-btn" for="cb4"></label>

                    </div>
                    <div class="col-md-1 text-right">
                    <button  class="btn btn-outline-danger btn-sm" onclick="delete_subject('{{$sub->id}}')" ><i class="fa fa-trash"
                                aria-hidden="true"></i></button>
                    </div>
                </div>
                <form action="{{url('/subject/'.$sub->id)}}" method="POST" enctype='multipart/form-data' id="sub_form">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="sub_id" value="{{$sub->id}}">

                    <div class="form-group">
                        <label for="name">Subject Name</label>
                        <input type="text" class="form-control" name="name" value="{{$sub->name}}"
                            placeholder="Subject Name">
                    </div>
                    <div class="form-group">
                        <label for="detail">Detail</label>
                        <input type="text" class="form-control" name="detail" value="{{$sub->detail}}"
                            placeholder="Subject Detail">
                    </div>
                    <div class="form-group text-center">
                        <img src="/storage/{{$sub->sm_banner}}" alt="" width="100%" srcset="">
                    </div>
                    <div class="form-group">
                        <label for="name">Cover Image (Small : 400*255) </label>
                        <input type="file" class="form-control" name="cover_image_sm" placeholder="Image">
                    </div>
                    <div class="form-group text-center">
                        <img src="/storage/{{$sub->xl_banner}}" alt="" width="100%" srcset="">
                    </div>
                    <div class="form-group">
                        <label for="name">Cover Image (Large : 1600*600) </label>
                        <input type="file" class="form-control" name="cover_image_xl" placeholder="Image">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="sub_form" id="sub_btn">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div id="div_delete">
        <form action="{{url('subject/'.$sub->id)}}" method="post" id='form_del_Subject'>
            @csrf
            @method('DELETE')
        </form>
</div>

<script>

function delete_subject(id){

        Swal.fire({
            title: 'Are you sure?',
            text: "All Course in Subject will be deleted as well. (ต้องแก้คำมั้ง)",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {

                $('#form_del_Subject').submit();
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        });
    }
</script>

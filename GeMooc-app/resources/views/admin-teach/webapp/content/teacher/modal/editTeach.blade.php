
<div class="modal fade" id="editTeach">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1>แก้ไขข้อมูลผู้สอน</h1>
            </div>
            <div class="modal-body">
                <form action="{{ url("/teach")."/". $user->id }}" id="formEditTeach" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PATCH')

                    <p>Username</p>
                    <input value="{{ $user->name }}" class="form-control mb-1" type="text" name="name"
                        id="name">

                    <p>Email</p>
                    <input value="{{ $user->email }}" type="text" class="form-control mb-1" name="email" id="email">

                    <p>Confirm Email</p>
                    <input value="{{ $user->email }}" type="text" class="form-control mb-1" name="confirmEmail"
                        id="confirmEmail">

                </form>
            </div>
            <div class="modal-footer">
                <button form="formEditTeach" type="submit" class="btn btn-warning">save</button>
            </div>
        </div>
    </div>
</div>

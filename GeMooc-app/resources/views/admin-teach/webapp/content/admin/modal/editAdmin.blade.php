
<div class="modal fade" id="editAdmin">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1>edit Admin user</h1>
            </div>
            <div class="modal-body">
                <form action="{{ url("/admin")."/".$user->id }}" id="formEditAdmin" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PATCH')

                    <p>Username</p>
                    <input value="{{ $user->name }}" class="form-control mb-1" type="text" name="name"
                        id="name" required>

                    <p>Email</p>
                    <input value="{{ $user->email }}" type="text" class="form-control mb-1" name="email" id="email" required>

                    <p>Confirm Email</p>
                    <input value="{{ $user->email }}" type="text" class="form-control mb-1" name="confirmEmail"
                        id="confirmEmail" required>

                </form>
            </div>
            <div class="modal-footer">
                <button form="formEditAdmin" type="submit" class="btn btn-warning">save</button>
            </div>
        </div>
    </div>
</div>

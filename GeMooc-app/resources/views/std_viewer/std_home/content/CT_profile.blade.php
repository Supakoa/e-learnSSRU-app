<div class="ce-container">
    <div class="row mt-3 mb-3">
        <div class="col-md-4 offset-md-4 ce-cog-body ce-bg text-center" style="overflow:hidden">
            <div class="ce-cog-btn"><i class="fas fa-upload"></i></div>
            <img src="https://placeholder.pics/svg/200x200"
                class="rounded mx-auto d-block" height="200" width="100%" class="rounded" alt="">
        </div>
    </div>
    <div class="container">
        <dl class="row">
            <dt class="col-md-4 text-right">name:</dt>
            <dd class="col-md-6 text-left">
                <input type="text" name="name" id="name" class="form-control" value="{{ auth()->user()->name }}"></dd>
        </dl>

        <dl class="row">
            <dt class="col-md-4 text-right">e-mail:</dt>
            <dd class="col-md-6 text-left">
                <input type="text" name="email" id="email" class="form-control" value="{{ auth()->user()->email }}">
            </dd>
        </dl>

        <dl class="row">
            <dt class="col-md-4 text-right">Description:</dt>
            <dd class="col-md-6 text-left">
                <textarea class="form-control" name="description" id="description"
                    aria-label="With textarea">{{ auth()->user()->profile->description }}</textarea></dd>
        </dl>

        <div class="row text-center">
            <div class="col-md-6">
                <dl class="row">
                    <dt class="col-md-4">Your Type:</dt>
                    <dd class="col-md-8">{{ auth()->user()->type_user }}</dd>
                </dl>
            </div>
            <div class="col-md-6">
                <dl class="row">
                    <dt class="col-md-4">Your Course:</dt>
                    <dd class="col-md-8">1</dd>
                </dl>
            </div>
        </div>
    </div>
    <div class="ce-line"></div>
    <div class="row text-center">
        <div class="col-md-4 offset-4">
            <button  class="btn btn-outline-info btn-md"><i class="fas fa-save"></i>
                Save</button>
        </div>
    </div>
</div>

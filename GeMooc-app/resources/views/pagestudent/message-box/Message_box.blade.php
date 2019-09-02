<button class="btn-messageBox" id="myButton" onclick="$('#myForm').show();$('#myButton').hide();$('#myBtn').hide();"><i
        class="far fa-comments" style="color:white"></i> รายงานปัญหาที่พบบ่อย</button>
<div class="messageBox-body" id="myForm">

    <div class="messageBox-header">
        <h5>รายงานปัญหา</h5>
        <div class="ce-close">
                <i onclick="$('#myForm').hide();$('#myButton').show();$('#myBtn').show()" class="fas fa-times"></i>
            </div>
    </div>
    <div class="messageBox-content">
        <form action="/report" method="post">
            @csrf
            @method('POST')
@if (isset(auth()->user()->id))
{{-- hidden item --}}
<input type="hidden" name="from_page" id="from_page" value="{{ url()->current() }}">
<input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
@else
{{-- hidden item --}}
<input type="hidden" name="from_page" id="from_page" value="{{ url()->current() }}">
<input type="hidden" name="user_id" id="user_id" value="guest">
@endif


            <section id="sec1">
                <label for="content-header">หัวข้อปัญหา</label>
                <input name="topic" class="form-control" type="text" id="content-header" required>
            </section>
            <section id="sec2">
                <label for="detail">คำอธิบายลักษณะ</label>
                <textarea name="description" style="width:100%;" name="" id="detail" cols="30" rows="6" required></textarea>
            </section>
            <section id="sec3">
                <button type="submit">
                    <i class="fas fa-paper-plane"></i>
                    รายงาน
                </button>
            </section>
        </form>
    </div>
</div>

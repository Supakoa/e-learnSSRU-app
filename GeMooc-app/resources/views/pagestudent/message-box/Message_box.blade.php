<button class="btn-messageBox" id="myButton" onclick="$('#myForm').show();$('#myButton').hide();$('#myBtn').hide();"><i
        class="far fa-comments"></i> รายงานปัญหาที่พบบ่อย</button>
<div class="messageBox-body" id="myForm">
    <div class="ce-close">
        <i onclick="$('#myForm').hide();$('#myButton').show();$('#myBtn').show()" class="fas fa-times"></i>
    </div>
    <div class="messageBox-header">
        <h5>รายงานปัญหา</h5>
        <i class="far fa-envelope"></i>
    </div>
    <div class="messageBox-content">
        <section id="sec1">
            <label for="content-header">หัวข้อปัญหา</label>
            <input class="form-control" type="text" id="content-header">
        </section>
        <section id="sec2">
            <label for="detail">คำอธิบายลักษณะ</label>
            <textarea style="width:100%;" name="" id="detail" cols="30" rows="6"></textarea>
        </section>
        <section id="sec3">
            <button type="submit">
                <i class="fas fa-paper-plane"></i>
                รายงาน
            </button>
        </section>
    </div>
</div>

{{-- <button class="btn-messageBox" id="myButton" onclick="$('#myForm').show();$('#myButton').hide();$('#myBtn').hide();"><i
        class="far fa-paper-plane"></i></button>

<div class="form-popup" id="myForm">
    <form action="/report" method="POST">

        <div class="ce-close">
            <i onclick="$('#myForm').hide();$('#myButton').show();$('#myBtn').show()" class="fas fa-times"></i>
        </div>
        <div class="messageBox-header">
            <h5>รายงานปัญหา</h5>
            <i class="far fa-envelope"></i>
        </div>
        <div class="messageBox-content">
            <section id="sec1">
                <label for="content-header">หัวข้อปัญหา</label>
                <input class="form-control" type="text" id="content-header">
            </section>
            <section id="sec2">
                <label for="detail">คำอธิบายลักษณะ</label>
                <textarea name="" id="detail" cols="30" rows="6"></textarea>
            </section>
            <section id="sec3">
                <button type="submit">
                    <i class="fas fa-paper-plane"></i>
                    รายงาน
                </button>
            </section>
        </div>
</div>
</form>
</div> --}}

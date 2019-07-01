<button class="btn-messageBox"><i class="far fa-comments"></i> รายงานปัญหาที่พบบ่อย</button>
<div class="messageBox-body">
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
            <input class="form-control" type="text">
            {{-- <textarea class="form-control" rows="5" cols="10" type="text" id="789"> --}}
        </section>
        <section id="sec3">
            <button type="submit">
                <i class="fas fa-paper-plane"></i>
                รายงาน
            </button>
        </section>
    </div>
</div>

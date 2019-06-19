<div class="modal fade" id="showReport" tabindex="-1" role="dialog" aria-labelledby="contentModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title" id="contentModal">
                <h5>ที่มา: {{ $reports->from_Page }}</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <dl class="row">
                    <dt class="col-md-2 text-center">เนื้อหา:</dt>
                    <dd class="col-md-8 order-2 ">{{ $reports->description }}</dd>
                </dl>
                <hr>
                <dl class="row">
                    <dt class="col-md-2 offset-md-6 text-right">
                        วันที่ส่ง:
                    </dt>
                    <dd class="col-md-4">{{ $reports->created_at }}</dd>
                </dl>
            </div>
        </div>
    </div>
</div>

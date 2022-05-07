<div class="modal fade" id="Modalcompanydestroy" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">刪除公司</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col md-8">
                        <form action="{{route('contactlist.destroy',[$list->list_id])}}" method="post" id="companyDestroyForm">
                            @method('DELETE')
                            @csrf
                            是否確定刪除公司：{{$list->name}}
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">取消</button>
                <button type="submit" class="btn btn-primary" form="companyDestroyForm">確認刪除</button>
            </div>
        </div>
    </div>
</div>
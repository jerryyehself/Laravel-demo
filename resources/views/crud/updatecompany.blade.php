<div class="modal fade" id="Modalcompanyupdate" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">修改公司資訊</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col md-8">
                        <form action="{{ route('contactlist.update',[$list->id]) }}" method="post" id="companyUpdateForm">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label for="companytitleupdate">公司名稱</label>
                                <input type="text" class="form-control" name="companytitleupdate" id="companytitleupdate" value="{{$list->name}}"/>
                            </div>
                            <div class="form-group">
                                <label for="companywindowupdate">聯絡人</label>
                                <input type="text" class="form-control" name="companywindowupdate" id="companywindowupdate" value="{{$list->contact_person}}"/>
                            </div>
                            <div class="form-group">
                                <label for="companysiteupdate">公司網站</label>
                                <input type="text" class="form-control" name="companysiteupdate" id="companysiteupdate" value="{{$list->site}}"/>
                            </div>
                            <div class="form-group">
                                <label for="companyemailupdate">聯絡信箱</label>
                                <input type="text" class="form-control" name="companyemailupdate" id="companyemailupdate" value="{{$list->email}}"/>
                            </div>
                            <div class="form-group">
                                <label for="companyphoneupdate">電話</label>
                                <input type="text" class="form-control" name="companyphoneupdate" id="companyphoneupdate" value="{{$list->phone}}"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">取消修改</button>
                <button type="submit" class="btn btn-primary" form="companyUpdateForm">確認修改</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Modalcompanycreate" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">新增公司</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col md-8">
                        <form action="{{route('contactlist.store')}}" method="post" id="companyCreateForm">
                            @csrf
                            <div class="form-group">
                                <label for="companytitle">公司名稱</label>
                                <input type="text" class="form-control" name="companytitle" id="companytitle" />
                            </div>
                            <div class="form-group">
                                <label for="companywindow">聯絡人</label>
                                <input type="text" class="form-control" name="companywindow" id="companywindow" />
                            </div>
                            <div class="form-group">
                                <label for="companysite">公司網站</label>
                                <input type="text" class="form-control" name="companysite" id="companysite" />
                            </div>
                            <div class="form-group">
                                <label for="companyemail">聯絡信箱</label>
                                <input type="text" class="form-control" name="companyemail" id="companyemail" />
                            </div>
                            <div class="form-group">
                                <label for="companyphone">電話</label>
                                <input type="text" class="form-control" name="companyphone" id="companyphone" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">取消新增</button>
                <button type="submit" class="btn btn-primary" form="companyCreateForm">新增</button>
            </div>
        </div>
    </div>
</div>
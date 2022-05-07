@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <div class="col-md-8">
            @if(isset($lists))

            @foreach($lists as $list)
            <div class="card m-2">
                <div class="card-header d-flex justify-content-between text-truncate">
                    <span class="fs-5 text-truncate">{{$list->name}}</span>(更新於{{$list->updated_at}})
                    <div class="fs-6 align-self-center">
                        <a class="" href="#Modalcompanyupdate" data-bs-toggle="modal" role="button">修改</a>
                        @include('crud.updatecompany')
                        |
                        <a class="" href="#Modalcompanydestroy" data-bs-toggle="modal" role="button">刪除</a>
                        @include('crud.destroycompany')
                    </div>
                </div>
                <div class="card-body d-flex flex-column">
                    <dl class="row">
                        <dt class="col-sm-3">聯絡人</dt>
                        <dd class="col-sm-9">{{$list->contact_person}}</dd>
                        <dt class="col-sm-3">公司網站</dt>
                        <dd class="col-sm-9">{{$list->site}}</dd>
                        <dt class="col-sm-3">聯絡信箱</dt>
                        <dd class="col-sm-9">{{$list->email}}</dd>
                        <dt class="col-sm-3">連絡電話</dt>
                        <dd class="col-sm-9">{{$list->phone}}</dd>
                    </dl>
                </div>
            </div>
            @endforeach
            <div class="d-flex justify-content-end">
                <!--  $lists->links()  -->
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
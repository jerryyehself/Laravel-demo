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
            @if(isset($view))

            @foreach($view['staffs'] as $staff)
            <div class="card m-2">

                <div class="card-header d-flex justify-content-between text-truncate">
                    <span class="fs-5 text-truncate">{{$staff->name}}</span>
                    <div class="fs-6 align-self-center">
                        <a class="" href="#Modalupdate" data-bs-toggle="modal" role="button">修改</a>

                        |
                        <a class="" href="#Modaldestroy" data-bs-toggle="modal" role="button">刪除</a>

                    </div>
                </div>
                <div class="card-body">
                    <dl class="row">
                        @foreach($view['content_table'] as $key => $content)
                        <dt class="col-sm-3">{{$content}}</dt>
                        <dd class="col-sm-9">

                            @if($key === 0)

                            @switch($staff->auth_level)
                            @case(0)
                            職員
                            @break

                            @case(1)
                            主管
                            @break

                            @endswitch

                            @else
                            {{$staff->email}}
                            @endif
                        </dd>
                        @endforeach
                    </dl>
                </div>
            </div>
            @endforeach
            <div class="d-flex justify-content-end">
                {{ $view['staffs']->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
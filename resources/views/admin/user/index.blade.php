@extends('admin.layout.master')

@section('content')
<div class="col-sm-12">
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Users Lists</h4>
            </div>
        </div>
        <div class="iq-card-body pb-0">
            <div class="table-responsive">

                @if(session('success'))
                <div class="alert alert-success font-bold">
                    {{ session('success') }}
                </div>
                @endif

                <!-- data-tables -->
                <table class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th width="1%">Profile</th>
                            <th width="auto">Tên người dùng</th>
                            <th width="auto">Email</th>
                            <th width="auto">Trạng thái</th>
                            <th width="auto">Ngày tham gia</th>

                            <th width="auto">Bài viết
                                <x-admin.sort-btn route="users.index" sort="news_count" />
                            </th>

                            <th width="auto">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td><img width="50px" src="{{Storage::url($user -> profile)}}"></td>
                            <td>{{$user -> name       }}</td>
                            <td>{{$user -> email      }}</td>
                            <td>
                                <span class="{{ $user -> getStatusClassAttribute() }}">
                                {{$user -> getStatusTextAttribute() }}
                                </span>
                            </td>
                            <td>{{$user -> created_at -> format('d/m/Y')}}</td>
                            <td>{{$user -> news_count }}</td>
                            <td>
                                <!-- data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" -->
                                <div class="flex align-items-center list-user-action">
                                    <a class="bg-primary" title="Sửa" href="{{ route('users.edit' ,$user -> id) }}">
                                        <i class="ri-pencil-line"></i>
                                    </a>

                                    <form action="{{ route('users.destroy' ,$user -> id) }}" class="d-inline" method="DELETE">
                                        <button onclick="return confirm('?')" type="submit" class="bg-danger text-white border-0 rounded" title="Xóa">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users -> links() }}
            </div>
        </div>
    </div>
</div>
@endsection
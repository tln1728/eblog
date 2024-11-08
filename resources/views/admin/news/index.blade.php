@extends('admin.layout.master')

@section('content')
<div class="col-sm-12">
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Danh sách tin</h4>
            </div>
            <div class="iq-card-header-toolbar d-flex align-items-center">
                <a href="{{route('news.create')}}" class="btn btn-primary">Thêm tin</a>
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
                        <tr class="">
                            <th width="auto">Tiêu đề</th>
                            <th width="auto">Người đăng</th>
                            <th width="auto">Danh mục</th>
                            <th width="10%">Lượt xem</th>
                            <th width="auto">Ngày đăng</th>
                            <th width="auto">Cập nhật</th>
                            <th width="10%">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($news as $new)
                        <tr>
                            <td>
                                <a href="{{route('post',$new -> id)}}" class="text-dark font-weight-bold">{{ $new -> title }}<i class="ri-arrow-right-up-line"></i></a>
                            </td>
                            
                            <td><a href="" class="text-dark">{{ $new -> user -> name  }}</a></td>
                            <td>
                            @foreach ($new -> categories as $cat)
                                <a href="" class="badge border border-primary text-primary">{{$cat -> title}}</a>
                            @endforeach
                            </td>

                            <td>{{ $new -> views      }} </td>
                            <td>{{ $new -> created_at }} </td>
                            <td>{{ $new -> updated_at }} </td>
                            <td>
                                <!-- data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" -->
                                <div class="flex align-items-center list-user-action">
                                    <a class="bg-primary" title="Sửa" href="{{ route('news.edit',$new -> id) }}">
                                        <i class="ri-pencil-line"></i>
                                    </a>

                                    <x-forms.form action="{{ route('news.destroy' ,$new -> id) }}" class="d-inline" method="DELETE">
                                        <button onclick="return confirm('?')" type="submit" class="bg-danger text-white border-0 rounded" title="Xóa">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </x-forms.form>

                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $news -> links() }}
            </div>
        </div>
    </div>
</div>
@endsection
@extends('admin.layout.master')

@section('content')
<div class="col-sm-12">
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Lịch sử bình luận</h4>
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
                            <th width="auto">Nội dung</th>
                            <th width="auto">Ngày đăng</th>
                            <th width="20%">Bài viết</th>
                            <th width="auto">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $cmt)
                        <tr>
                            <td class="text-break">{{Str::words($cmt -> content,10)}}</td>
                            <td>{{$cmt -> created_at -> format('d/m/Y')}}</td>
                            <td>
                                <a href="{{route('news.show',$cmt -> news -> slug)}}" class="text-dark font-weight-bold">{{ $cmt -> news -> title }}<i class="ri-arrow-right-up-line"></i></a>
                                @if ($cmt -> parent_id !== null)
                                <div>
                                    Reply {{$cmt -> parent -> user -> name}}
                                </div>
                                @endif
                            </td>

                            <td>
                                <!-- data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" -->
                                <div class="flex align-items-center list-user-action">
                                    <x-forms.form action="{{route('comments.destroy' ,$cmt -> id) }}" class="d-inline" method="DELETE">
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
                {{ $comments -> links() }}
            </div>
        </div>
    </div>
</div>
@endsection
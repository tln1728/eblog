@extends('admin.layout.master')

@section('content')
<div class="col-sm-12">
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Category Lists</h4>
            </div>
            <div class="iq-card-header-toolbar d-flex align-items-center">
                <a href="{{ route('category.create') }}" class="btn btn-primary">Add New Category</a>
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
                            <th width="10%">ID
                                <x-admin.sort-btn route="category.index" sort="id"/>
                            </th>

                            <th width="auto">Tên danh mục</th>

                            <th width="auto">Số lượng bài viết
                                <x-admin.sort-btn route="category.index" sort="news_count"/>
                            </th>
                            
                            <th width="auto">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $cat)
                        <tr>
                            <td>{{$cat -> id}}</td>
                            <td>{{$cat -> title}}</td>
                            <td>{{$cat -> news_count}}</td>
                            <td>
                                <!-- data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" -->
                                <div class="flex align-items-center list-user-action">
                                    <a class="bg-primary" title="Sửa" href="{{ route('category.edit' ,$cat -> id) }}">
                                        <i class="ri-pencil-line"></i>
                                    </a>

                                    <a class="bg-primary" title="Chi tiết" href="/category/{{$cat -> title}}">
                                        <i class="ri-information-line"></i>
                                    </a>

                                    <x-forms.form action="{{route('category.destroy' ,$cat -> id) }}" class="d-inline" method="DELETE">
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
                {{ $categories -> links() }}
            </div>
        </div>
    </div>
</div>
@endsection
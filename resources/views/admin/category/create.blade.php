@extends('admin.layout.master')


@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="iq-card">

            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Thêm danh mục</h4>
                </div>
            </div>

            <div class="iq-card-body">
                <form action="{{ route('category.store') }}" method="post">

                    <div class="form-group">
                        <label>Tên danh mục</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Category Description</label>
                        <textarea class="form-control" rows="4"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection

<!-- php
$default = [
    "class"  => "max-w-2xl mx-auto space-y-5",
    "method" => "GET",
];
endphp

<form { $attributes($default)}}>
    if ($attributes->get('method', $default['method']) !== 'GET')
        csrf
        method($attributes->get('method'))
    endif

    { $slot }}
</form> -->
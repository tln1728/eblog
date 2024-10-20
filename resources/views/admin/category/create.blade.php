@extends('admin.layout.master')


@section('content')

<div class="col-sm-12">
    <div class="iq-card">

        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Thêm danh mục</h4>
            </div>
        </div>

        <div class="iq-card-body">
            <x-forms.form action="{{ route('category.store') }}" method="post">
                <x-forms.group error="title">
                    <x-forms.input
                        label="Tên danh mục"
                        name="title"
                        placeholder="Sport" />
                </x-forms.group>

                <button type="submit" class="btn btn-primary font-bold">Thêm</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="{{ route('category.index') }}" class="btn btn-danger">Quay lại</a>
            </x-forms.form>
        </div>

    </div>
</div>

@endsection
@extends('admin.layout.master')


@section('content')

<div class="col-sm-12">
    <div class="iq-card">

        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Sửa danh mục</h4>
            </div>
        </div>

        <div class="iq-card-body">
            <x-forms.form action="{{ route('category.update',['category' => $category -> id]) }}" method="PUT">

                <x-forms.group error="title">
                    <x-forms.input id="title-input"
                        label="Tên danh mục"
                        name="title"
                        value="{{ old('title', $category -> title) }}" />
                </x-forms.group>

                <button type="submit" class="btn btn-primary font-bold">Sửa</button>
                <button id="reset-btn" type="button" class="btn btn-secondary">Reset</button>
                <a href="{{ route('category.index') }}" class="btn btn-danger">Quay lại</a>
            </x-forms.form>
        </div>

    </div>
</div>

<script>
    let originalTitle = "{{ $category -> title }}";
    console.log(originalTitle);

    document.getElementById('reset-btn').addEventListener('click', function() {
        document.getElementById('title-input').value = originalTitle;
    });
</script>

@endsection
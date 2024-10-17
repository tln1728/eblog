@extends('admin.layout.master')


@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="iq-card">

            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Sửa danh mục</h4>
                </div>
            </div>

            <div class="iq-card-body">
                <form action="{{ route('category.update',['category' => $category -> id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group @error('title') has-error @enderror">

                        <label>Tên danh mục</label>
                        <input 
                            id="title-input" 
                            type="text" 
                            class="form-control" 
                            name="title" 
                            value="{{ old('title', $category -> title) }}">

                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        
                    </div>

                    <button type="submit" class="btn btn-primary font-bold">Sửa</button>
                    <button id="reset-btn" type="button" class="btn btn-secondary">Reset</button>
                    <a href="{{ route('category.index') }}" class="btn btn-danger">Quay lại</a>
                </form>
            </div>

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
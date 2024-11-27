@extends('admin.layout.master')


@section('content')

<div class="col-sm-12">
    <div class="iq-card">

        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Sửa bình luận</h4>
            </div>
        </div>

        <div class="iq-card-body">
            <x-forms.form action="{{ route('comments.update',$cmt -> id)}}" method="PUT">

                <x-forms.group error="content">
                    <x-forms.input
                        label="Nội dung"
                        name="content"
                        value="{{old('content',$cmt -> content)}}" />
                </x-forms.group>

                <button type="submit" class="btn btn-primary font-bold">Sửa</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="{{ route('comments.index') }}" class="btn btn-danger">Quay lại</a>
            </x-forms.form>
        </div>

    </div>
</div>

@endsection
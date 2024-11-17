@extends('admin.layout.master')

@section('content')
<div class="col-sm-12">
    <div class="iq-card">

        @if(session('error'))
        <div class="alert alert-danger font-bold">
            {{session('error')}}
        </div>
        @endif

        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Sửa bài viết</h4>
            </div>
        </div>

        <div class="iq-card-body">
            <x-forms.form action="{{route('news.update',$new->id)}}" method="put" enctype="multipart/form-data">
                <x-forms.group error="title">
                    <x-forms.input
                        label="Tiêu đề"
                        value="{{old('title',$new -> title)}}"
                        name="title" />
                </x-forms.group>

                <x-forms.group error="category">
                    <x-forms.input
                        multiple
                        type="select"
                        label="Danh mục"
                        name="category[]">

                        @foreach($cats as $id => $title)
                        <option value={{$id}} {{is_selected($id, old('category',$selectedCategory))}}>
                            {{$title}}
                        </option>
                        @endforeach
                        
                    </x-forms.input>
                </x-forms.group>
                
                <x-forms.group error="content">
                    <x-forms.textarea
                        label="Nội dung"
                        name="content">
                        {{old('content',$new -> content)}}
                    </x-forms.textarea>
                </x-forms.group>

                <x-forms.group error="summary">
                    <x-forms.input
                        label="Tóm tắt"
                        value="{{old('summary',$new -> summary)}}"
                        name="summary"
                        />
                    </x-forms.group>
                    
                <x-forms.group :error="false">
                    <img src="{{Storage::url($new -> thumbnail)}}" width="auto" height="250">
                </x-forms.group>

                <x-forms.group error="thumbnail">
                    <x-forms.input
                        type="file"
                        label="Thumbnail"
                        name="thumbnail" />
                </x-forms.group>

                <button type="submit" class="btn btn-primary font-bold">Sửa</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="{{route('news.index')}}" class="btn btn-danger">Quay lại</a>
            </x-forms.form>
        </div>

    </div>
</div>
@endsection
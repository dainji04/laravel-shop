@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/44.2.0/ckeditor5.css" />
@endsection

@section('content')

<form action="" method="POST">
    @include('alert')
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Tên danh mục:</label>
        <div class="col-sm-10">
            <input name="name" type="text" class="form-control">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Danh mục cha:</label>
        <div class="col-sm-10">
            <select name="parent_id" class="form-control" id="">
                <option value="0">Danh mục cha</option>
                @foreach($menus as $menu)
                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Mô tả:</label>
        <div class="col-sm-10">
            <input name="description" type="text" class="form-control">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">Mô tả chi tiết:</label>
        <div class="col-sm-10">
            <textarea name="content" class="form-control" id="editor"></textarea>
        </div>
    </div>
    <fieldset class="row mb-3">
        <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
        <div class="col-sm-10">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="active" value="1" checked>
                <label class="form-check-label">
                    kích hoạt
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="active" value="0">
                <label class="form-check-label">
                    không kích hoạt
                </label>
            </div>
        </div>
    </fieldset>
    <button type="submit" class="btn btn-primary">Tạo danh mục</button>
    @csrf
</form>
@endsection

@section('footer')
<script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#editor')) // Không cần khai báo plugins
        .then(editor => {
            console.log('Editor initialized');
        })
        .catch(error => {
            console.error(error);
        });
</script>

@endsection
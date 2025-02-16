@extends('layouts.app')

@section('content')

<h1 class="mb-4">Admin Pages - Trang quản trị</h1>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Tên danh mục</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Mô tả chi tiết</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Lựa chọn</th>
        </tr>
    </thead>
    <tbody>
        {!! \App\Helpers\Helper::menu($menus) !!}
    </tbody>
</table>
@endsection

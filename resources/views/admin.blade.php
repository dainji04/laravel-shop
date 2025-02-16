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
        <!-- @foreach($menus as $menu)
        <tr>
            <th scope="row">{{ $menu->id }}</th>
            <td>{{ $menu->name }}</td>
            <td>{{ $menu->parent_id }}</td>
            <td>{{ $menu->description }}</td>
            <td>{{ $menu->content }}</td>
            <td>{{ $menu->active }}</td>
            <td>
                <form action="{{ route('menu.destroy', $menu) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach -->
    </tbody>
</table>
@endsection

@extends('admin.master')
@section('title', 'User')
@section('action', 'Xem')
@section('content')
@if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </div>
@endif

@if(session('message'))
        <div class="alert alert-{{session('flag')}}">
            {{session('message')}}
        </div>
@endif
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Họ tên</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Email</th>
            <th>Level</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt = 0 ?>
        @foreach($get_user as $user)
        <?php $stt += 1 ?>
        <tr class="odd gradeX" align="center">
            <td>{{$stt}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->address}}</td>
            <td>{{$user->email}}</td>
            <td>
                @if($user->level == 2)
                    Admin
                @else
                    Member
                @endif
            </td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{URL::to('/admin/user/user-delete/'. $user->id)}}" onclick="return confirm('Bạn muốn xóa danh mục này?')"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{URL::to('/admin/user/user-edit/'. $user->id)}}">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
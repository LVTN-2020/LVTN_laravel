
@extends('admin.master')
@section('content')
@if(session('message'))
    <div class="alert alert-{{session('flag')}}">
        {{session('message')}}
    </div>
@endif
<div class="col-md-12">
    <!-- DATA TABLE -->
    <h3 class="title-5 m-b-35">Danh sách user</h3>
    <div class="table-data__tool">
        <div class="table-data__tool-left">
            <div class="rs-select2--light rs-select2--md">
            </div>
        </div>
        <div class="table-data__tool-right">
            <a href="{{URL::to('/admin/user/user-add')}}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                <i class="zmdi zmdi-plus"></i>Thêm người dùng
            </a>
        </div>
    </div>
    <div class="table-responsive table-responsive-data2">
        <table id="example" class="table table-striped table-bordered" style="width:100%" >
            <thead>
                <tr style="text-align: center;">
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php $stt = 0 ?>
                @foreach($get_user as $user)
                <tr class="tr-shadow" style="text-align: center; ">
                    <?php $stt += 1 ?>
                    <td>{{ $stt }}</td>
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
                    <td>
                        <div class="table-data-feature">
                            @if(Auth::user()->id === $user->id)
                            <a href="{{URL::to('/admin/user/user-edit/'. $user->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="zmdi zmdi-edit"></i>
                            </a>
                            @elseif(Auth::user()->level == 3)
                            <a href="{{URL::to('/admin/user/user-edit/'. $user->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="zmdi zmdi-edit"></i>
                            </a>
                            @endif
                            <a href="{{URL::to('/admin/user/user-delete/'. $user->id)}}" onclick="return confirm('Bạn muốn xóa danh mục này?')" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                <i class="zmdi zmdi-delete"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
    <!-- END DATA TABLE -->
</div>
@endsection
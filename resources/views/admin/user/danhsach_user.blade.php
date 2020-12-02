
{{-- <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
</table> --}}
@extends('admin.master')
@section('content')
@if(session('message'))
    <div class="alert alert-{{session('flag')}}">
        {{session('message')}}
    </div>
@endif
<div class="col-md-12">
    <!-- DATA TABLE -->
    <h3 class="title-5 m-b-35">Danh sách sản phẩm</h3>
    <div class="table-data__tool">
        <div class="table-data__tool-left">
            <div class="rs-select2--light rs-select2--md">
                <select class="js-select2" name="property">
                    <option selected="selected">All Properties</option>
                    <option value="">Option 1</option>
                    <option value="">Option 2</option>
                </select>
                <div class="dropDownSelect2"></div>
            </div>
            <button class="au-btn-filter">
                <i class="zmdi zmdi-filter-list"></i>filters
            </button>
        </div>
        <div class="table-data__tool-right">
            <a href="{{URL::to('/admin/user/user-add')}}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                <i class="zmdi zmdi-plus"></i>Thêm users
            </a>
            <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                <select class="js-select2" name="type">
                    <option selected="selected">Export</option>
                    <option value="">Option 1</option>
                    <option value="">Option 2</option>
                </select>
                <div class="dropDownSelect2"></div>
            </div>
        </div>
    </div>
    <div class="table-responsive table-responsive-data2">
        <table class="table table-data2">
            <thead>
                <tr style="text-align: center;">
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Hành động</th>
                    <th></th>
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
                            <a href="{{URL::to('/admin/user/user-edit/'. $user->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="zmdi zmdi-edit"></i>
                            </a>
                            <a href="{{URL::to('/admin/user/user-delete/'. $user->id)}}" onclick="return confirm('Bạn muốn xóa danh mục này?')" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                <i class="zmdi zmdi-delete"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
                <tr class="spacer"></tr>
            </tbody>
        </table>
    </div>
    <!-- END DATA TABLE -->
</div>
@endsection
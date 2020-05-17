@extends('layouts.app')
@section('content')
<div class="d-flex" id="wrapper">
    @include('layouts.sidebar')
    <div id="page-content-wrapper">
        @include('layouts.nav')
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    {{--show success or error message--}}
                    @include('helpers.error_success_msg')
                    <h2>Users List</h2>
                    <div class='mt-3 float-left'>
                        Total Records : {{ $users->total() }}
                    </div>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col" colspan=3 class='text-center'>Actions</th>
                            </tr>
                        </thead>
                        <tbody>   
                                     
                            @foreach($users as $k => $user)
                                <tr>
                                    <th scope="row">{{$users->firstItem()+$k}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>  
                                    <?php  
                                    
                                        $role_names= '';                             
                                        foreach($user->roles as $j => $role){
                                            $role_names .= $role->name;
                                            if(!empty($user->roles[$j+1])){
                                                $role_names .= ',';
                                            }
                                        }
                                   
                                        $role_names = $role_names ? $role_names : 'user';                                    
                                    
                                    ?>
                                    <td>{{$role_names}}</td>
                                    @if($user->deleted_at)
                                        <td>Edit</td>
                                        {{-- Restore softdelete, set deleted_at = null --}}
                                        <td><a href="{{route('user_restore',['id'=>"$user->id"])}}">Restore</a></td>
                                        @can('force delete user',$user)
                                            <td><a href="{{route('user_forcedelete',['id'=>"$user->id"])}}" class='text-danger'>ForceDelete</a></td>
                                        @endcan
                                    @else
                                        {{-- Edit if have specify role permission--}}
                                        @can('specify role',$user)
                                            <td><a href="{{route('user_edit',['id'=>"$user->id"])}}">Edit</a></td>
                                        @endcan
                                        {{-- softdelete,not actually delete,set deleted_at = current datetime --}}
                                        <td><a href="{{route('user_delete',['id'=>"$user->id"])}}">Delete</a></td>
                                        {{-- Permanently Delete if have force delecte permission --}}
                                        @can('force delete user',$user)
                                            <td><a href="{{route('user_forcedelete',['id'=>"$user->id"])}}" class='text-danger'>ForceDelete</a></td>
                                        @endcan
                                    @endif
                                </tr>  
                            @endforeach                                  
                        </tbody>
                    </table> 
                    {{-- pagination --}}
                    @if($users->total() > $page_limit)
                        <div class='pt-3 d-flex justify-content-center'>
                            {{ $users->links() }}
                        </div>    
                    @endif 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
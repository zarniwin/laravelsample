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
                    <h2>Menus List</h2>
                    @if($menus->total() > 0 )
                        <div class='mt-3 float-left'>
                            Total Records : {{ $menus->total() }}
                        </div>
                        
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Display Name</th>
                                    <th scope="col">Rank</th>
                                    <th scope="col" colspan=3 class='text-center'>Actions</th>
                                </tr>
                            </thead>
                            <tbody>                    
                                @foreach($menus as $k => $menu)
                                    <tr>
                                        <th scope="row">{{$menus->firstItem()+$k}}</th>
                                        <td>{{$menu->menu_name}}</td>
                                        <td>{{$menu->display_name}}</td>
                                        <td>{{$menu->rank}}</td>
                                        @if($menu->deleted_at)
                                            <td>Edit</td>
                                            <!-- Restore softdelete, set deleted_at = null -->
                                            <td><a href="{{route('menu_restore',['id'=>"$menu->id"])}}">Restore</a></td>
                                            <td><a href="{{route('menu_forcedelete',['id'=>"$menu->id"])}}" class='text-danger'>ForceDelete</a></td>
                                        @else
                                            <!-- Edit -->
                                            <td><a href="{{route('menu_edit',['id'=>"$menu->id"])}}">Edit</a></td>
                                            <!-- softdelete,not actually delete,set deleted_at = current datetime -->
                                            <td><a href="{{route('menu_delete',['id'=>"$menu->id"])}}">Delete</a></td>
                                            <!-- Permanently Delete -->
                                            <td><a href="{{route('menu_forcedelete',['id'=>"$menu->id"])}}" class='text-danger'>ForceDelete</a></td>
                                        @endif
                                    </tr>  
                                @endforeach                                  
                            </tbody>
                        </table>                        
                        {{-- pagination --}}
                        @if($menus->total() > $page_limit)
                            <div class='pt-3 d-flex justify-content-center'>
                                {{ $menus->links() }}
                            </div>    
                        @endif 
                    @else
                        <div class="pt-3">
                            <p class='text-danger'>There are no Records.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
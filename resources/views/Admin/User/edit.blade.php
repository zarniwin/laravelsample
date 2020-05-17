@extends('layouts.app')

@section('content')
<div class="d-flex" id="wrapper">
    @include('layouts.sidebar')
    <div id="page-content-wrapper">
        @include('layouts.nav')
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    @include('helpers.error_success_msg')
                    <div class="card">
                        <div class="card-header">User Edit</div>
                        <div class="card-body">                            
                            <form method='POST'>
                                @csrf  
                                <div class="form-group">
                                    <label for="menu_name">Name</label>
                                    <input type="text" class="form-control" name="menu_name" id="menu_name" value="{{$user->name}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="display_name">Display Name</label>
                                    <input type="text" class="form-control" name="display_name" id="display_name" value="{{$user->email}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="role">Choose Roles</label>
                                    <select multiple class="form-control" id="roles" name="roles[]">
                                        @foreach($roles as $role)
                                            <?php $selected = ''; ?>
                                            @if($user->roles->count() > 0)
                                                @foreach($user->roles as $user_role)   
                                                    @if($role->id == $user_role->id)                                        
                                                        <?php $selected = 'selected'; ?> 
                                                    @endif
                                                @endforeach    
                                            
                                            @elseif($role->name == 'user')
                                                <?php $selected = 'selected'; ?> 
                                            @endif                                       
                                            <option value="{{$role->id}}" {{$selected}}>{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>  
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
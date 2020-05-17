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
                        <div class="card-header">Menu Creation</div>
                        <div class="card-body">                            
                            <form method='POST'>
                                @csrf  
                                <div class="form-group">
                                    <label for="menu_name">Name</label>
                                    <input type="text" class="form-control" name="menu_name" id="menu_name">
                                </div>
                                <div class="form-group">
                                    <label for="display_name">Display Name</label>
                                    <input type="text" class="form-control" name="display_name" id="display_name">
                                </div>
                                <div class="form-group">
                                    <label for="rank">Rank</label>
                                    <input type="text" class="form-control" name="rank" id="rank">
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
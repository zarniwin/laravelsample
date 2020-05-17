<!-- show all errors -->
@foreach($errors->all() as $error)
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{$error}}                                      
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>                                                                                                                          
    </div>
@endforeach

<!-- show flash succes session -->
@if(Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{Session::get('success')}}                                      
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>                                                                                                                          
    </div>
@endif

<!-- show flash error session -->
@if(Session::has('error'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{Session::get('error')}}                                      
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>                                                                                                                          
    </div>
@endif

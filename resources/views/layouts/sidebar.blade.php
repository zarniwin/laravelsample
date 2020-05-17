<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading">
        <a class="navbar-brand" href="{{ url('home') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
    </div>
    <div class="list-group list-group-flush">
        <a href="{{url('home')}}" class="list-group-item list-group-item-action bg-light">Dashboard</a>        
        @if(Auth::user()->hasAnyRole('super_admin','admin'))
            <a href="{{url('users')}}" class="list-group-item list-group-item-action bg-light">Users List</a>
            <a href="{{url('menus/create')}}" class="list-group-item list-group-item-action bg-light">Menus Registration</a>
            <a href="{{url('menus')}}" class="list-group-item list-group-item-action bg-light">Menus List</a>
        @endif        
    </div>
</div>
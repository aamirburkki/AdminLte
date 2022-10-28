<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
@if (Auth::user()->role == 1)
    <li class="nav-item">
        <a href="{{route('employeeList')}}" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>Employee</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('index') }}" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>Create Company</p>
        </a>
    </li>
@elseif (Auth::user()->role == 0)
    <li class="nav-item">
        <a href="{{ route('myprofile') }}" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>Employee Profile</p>
        </a>
    </li>
@endif

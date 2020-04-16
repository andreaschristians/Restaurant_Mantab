<div class="sidebar" data-color="purple" data-image="{{ asset('backend/img/sidebar-1.jpg') }}">

    <div class="logo">
        <a href="{{ route('welcome') }}" class="simple-text">
            Restaurant Mantap
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ Request::is('admin/dashboard*') ? 'active': '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/employee*') ? 'active': '' }}">
                <a href="{{ route('employee.index') }}">
                    <i class="material-icons">person</i>
                    <p>Employee</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/table*') ? 'active': '' }}">
                <a href="{{ route('table.index') }}">
                    <i class="material-icons">event_seat</i>
                    <p>Table</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/category*') ? 'active': '' }}">
                <a href="{{ route('category.index') }}">
                    <i class="material-icons">content_paste</i>
                    <p>Categories</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/menu*') ? 'active': '' }}">
                <a href="{{ route('menu.index') }}">
                    <i class="material-icons">library_books</i>
                    <p>Menus</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/reservation*') ? 'active': '' }}">
                <a href="{{ route('reservation.index') }}">
                    <i class="material-icons">chrome_reader_mode</i>
                    <p>Reservations</p>
                </a>
            </li>
        </ul>
    </div>
</div>
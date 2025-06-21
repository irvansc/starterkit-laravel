<div class="vertical-menu">

    <div class="h-100">

        <div class="user-wid text-center py-4">
            @livewire('back.user-profile-side')
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li class="">
                    <a href="{{ route('home') }}" class="waves-effect ">
                        <i class="mdi mdi-airplay"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @can('read role')
                    <li class="{{ Route::is('konfigurasi.*') ? 'mm-active' : '' }}">
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-account-multiple"></i>
                            <span>User Management</span>
                        </a>
                        <ul class="sub-menu {{ Route::is('konfigurasi.*') ? 'mm-collapse mm-show' : '' }}"
                            aria-expanded="true">
                            <li class="{{ Route::is('konfigurasi.roles.*') ? 'mm-active' : '' }}">
                                <a href="{{ route('konfigurasi.roles.index') }}" class=" waves-effect">
                                    <span>Roles</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('konfigurasi.permissions.index') }}" class=" waves-effect">
                                    <span>Permissions</span>
                                </a>

                            </li>
                            <li>
                                <a href="{{ route('konfigurasi.users-list.index') }}" class=" waves-effect">
                                    <span>Users</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>

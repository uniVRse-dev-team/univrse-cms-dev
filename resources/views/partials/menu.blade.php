<style>
    * {
    font-weight: 600;
    }


    /*
    .c-sidebar-nav-item:hover {
        background-color: purple;
    }
    */

</style>

<div id="sidebar" style="background-color:#3D3F48;" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div style="background-color:#FFFFFF;" class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="{{ route('admin.home') }}">
            <img width="180" height="49" style="margin: 5px;" src="https://univrse.io/wp-content/uploads/2021/08/UNIVRSE_LOGO2021_COLOR-1-1024x284.png">
        </a>
    </div>

    <div style="background-color:#FFFFFF;" class="c-sidebar-brand d-md-down-none">
    <a class="c-sidebar-brand-full h4" href="#">
        <img style="border-radius:50%; margin-bottom: 20px;" width="150" height="150" src="https://www.pngall.com/wp-content/uploads/5/User-Profile-PNG.png">
    </a>
    </div>

    <div style="background-color:#FFFFFF;" class="c-sidebar-brand d-md-down-none">
    <h3 style="text-align:center; color:#7F3F96;">Welcome Back<br><span style="color:black;font-size:20px; margin-bottom:20px;">Admin</span></h3>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("home.dashboard") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-home">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <img width=30 height=30 src="{{ url('/icon/outline_groups_white_48dp.png') }}">
                    &nbsp; User Management
                </a>
                <ul class="c-sidebar-nav-dropdown-items">                   
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <img width=30 height=30 src="{{ url('/icon/outline_list_alt_white_48dp.png') }}">
                                &nbsp; {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <img width=30 height=30 src="{{ url('/icon/outline_list_alt_white_48dp.png') }}">
                                &nbsp; {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <img width=30 height=30 src="{{ url('/icon/outline_list_alt_white_48dp.png') }}">
                                &nbsp; {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <img width=30 height=30 src="{{ url('/icon/outline_list_alt_white_48dp.png') }}">
                                &nbsp; {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.organizers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/organizers") || request()->is("admin/organizers/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.organizer.title')}}
                </a>
            </li>
        @can('sponsor_access')
        
                <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.systemCalendar") }}" class="c-sidebar-nav-link {{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "c-active" : "" }}">
                <img width=30 height=30 src="{{ url('/icon/outline_event_white_24dp.png') }}">
                    &nbsp; {{ trans('global.systemCalendar') }}
            </a>
        </li>
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.sponsors.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sponsors") || request()->is("admin/sponsors/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-hand-holding-usd c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.sponsor.title') }}
                </a>
            </li>
        @endcan
        @can('exhibitor_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.exhibitors.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/exhibitors") || request()->is("admin/exhibitors/*") ? "c-active" : "" }}">
                    <img width=30 height=30 src="{{ url('/icon/outline_storefront_white_48dp.png') }}">
                    &nbsp; {{ trans('cruds.exhibitor.title') }}
                </a>
            </li>
        @endcan
        @can('briefcase_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.briefcase.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/briefcase") || request()->is("admin/briefcase/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-picture-o c-sidebar-nav-icon">

                    </i>
                    Media
                </a>
            </li>
        @endcan
        
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.userbriefcase.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/userbriefcase") || request()->is("admin/userbriefcase/*") ? "c-active" : "" }}">
                   <img width=30 height=30 src="{{ url('/icon/outline_business_center_white_48dp.png') }}">
                    &nbsp; Briefcase
                </a>
            </li>

        @can('delegate_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.delegates.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/delegates") || request()->is("admin/delegates/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.delegate.title') }}
                </a>
            </li>
        @endcan
        @can('schedule_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.schedules.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/schedules") || request()->is("admin/schedules/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-clock-o c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.schedule.title') }}
                </a>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-pencil-square-o c-sidebar-nav-icon">
                        </i>
                        Edit Profile
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
                    <a href="#" class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="">
                        <img width=30 height=30 src="{{ url('/icon/outline_live_help_white_48dp.png') }}">
                        &nbsp; Help Center
                    </a>
                </li>

    </ul>

</div>
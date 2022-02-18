<style>
    * {
    font-weight: 600;
    }
</style>

<div id="sidebar" style="background-color:#3D3F48;" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div style="background-color:#FFFFFF;" class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="{{ route('admin.home') }}">
            <img width="180" height="49" style="margin: 5px;" alt="logo" src="/icon/UNIVRSE_LOGO2021_COLOR-1-1024x284.png">
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
                <img width=30 height=30 src="{{ url('/icon/outline_home.png') }}">

                </i>
                &nbsp; {{ trans('global.dashboard') }}
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                <img width=30 height=30 src="{{ url('/icon/outline_list_alt_white_48dp.png') }}">
                &nbsp; {{ trans('cruds.user.title') }}
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.booths.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/booths") || request()->is("admin/booths/*") ? "c-active" : "" }}">
                <img width=30 height=30 src="{{ url('/icon/outline_storefront_white_48dp.png') }}">
                &nbsp; {{ trans('cruds.booth.title') }}
            </a>
        </li>
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.exhibitors.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/exhibitors") || request()->is("admin/exhibitors/*") ? "c-active" : "" }}">
                    <img width=30 height=30 src="{{ url('/icon/outline_user.png') }}">
                    &nbsp; {{ trans('cruds.exhibitor.title') }}
                </a>
        </li>
        </li>
            <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.delegates.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/delegates") || request()->is("admin/delegates/*") ? "c-active" : "" }}">
                    <img width=30 height=30 src="{{ url('/icon/outline_user.png') }}">
                    </i>
                    &nbsp; {{ trans('cruds.delegate.title') }}
                </a>
        </li>
        <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                    <img width=30 height=30 src="{{ url('/icon/outline_edit.png') }}">
                    </i>
                    &nbsp; Edit Profile
                </a>
        </li>
                <li class="c-sidebar-nav-item">
                    <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <img width=30 height=30 src="{{ url('/icon/outline_logout.png') }}">
                        &nbsp; {{ trans('global.logout') }}
                    </a>
                </li>
    </ul>

</div>
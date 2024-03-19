<aside id="leftsidebar" class="sidebar">
    <div class="user-info">
        <div class="image">
            <img src="/images/user.png" width="48" height="48" alt="User"
                style="border-radius: 0px; box-shadow: 0px 2px 5px #dedede;" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ciao <span class="name">{{ Auth::user()->name }}</span>! </div>

            <div class="email">
                Email: <span class="name">{{ Auth::user()->email }} </span><br />
                {{-- Il tuo ruolo è: <span class="role" id="role">{{ Auth::user()->getRoleName() }}</span> --}}</div>

            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="{{ url('/logout') }}"><i class="material-icons">input</i>Sign Out</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="menu">
        <ul class="list">
            @role(['admin'])
                <li
                    class="{{ appSectionName(0) }} {{ appSectionName(1) }} {{ isSectionActive(['home'], 1) ? 'active' : '' }}">
                    <a href="{{ route('admin.home') }}">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                <li
                    class="{{ appSectionName(0) }} {{ appSectionName(1) }} {{ isSectionActive(['user'], 1) ? 'active' : '' }}">
                    <a href="{{ route('admin.user.index') }}">
                        <i class="material-icons">account_circle</i>
                        <span>Utenti</span>
                    </a>
                </li>
                <hr />
                <li>
                    <a href="{{ url('admin/log-viewer') }}">
                        <i class="material-icons">error</i>
                        <span>Log</span>
                    </a>
                </li>
            @endrole

            @role(['customer'])
                <li
                    class="{{ appSectionName(0) }} {{ appSectionName(1) }} {{ isSectionActive(['home'], 1) ? 'active' : '' }}">
                    <a href="{{ route('customer.home') }}">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
            @endrole
        </ul>
    </div>

    <x-admin.footer />

</aside>

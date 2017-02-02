@if (!Auth::guest())
  <div class="sidebar" id="sidebar" style="display: block;">
  <div class="sidebar-username">{{ Auth::user()->display_name }}</div>
        <div class="sidebar-avatar">
          <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->id }}">
        </div>
        <div class="sidebar-menu"><a href="/profil"><span class="icon icon-user"></span> Mon compte</a><a href="/drafts"><span class="icon icon-inbox"></span> Mes articles</a><a href="/forum/topics/watched"><span class="icon icon-group"></span> Mes sujets suivis</a><a class="menu_last" href="/playlists"><span class="icon icon-list"></span> Ma playlist</a><a class="sidebar_logout" href="{{ url('/logout') }}"><span class="icon icon-times"></span> Se déconnecter</a>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        </div>
        <div class="sidebar-wave">
        <svg id="sidebar-wave" width="100%" height="100%" viewBox="0 0 200 900" version="1.1" preserveAspectRatio="none">
            <path d="M200,0c0,0 -200,84.962 -200,192c0,107.038 158.577,103.545 167,298c8.423,194.455 33,410 33,410l16,0l-3,-900l-13,0" data-to="M0,0c0,0 0,84.962 0,192c0,107.038 0.583,103.364 0,298c-0.577,192.455 0,410 0,410l216,0l-3,-900l-213,0"></path>
        </svg>
        </div>
      </div>
@endif
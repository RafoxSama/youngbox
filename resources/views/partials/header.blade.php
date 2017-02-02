<header class="topbar" id="topbar">
        <a class="topbar-logo" href="/"><svg width="39" height="39"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/logo.svg#logo"></use></svg></a>
        <nav class="topbar-menu">
          <a class="topbar-menu_home" href="/">Accueil</a>
          <a href="/tutoriels">Tutoriels</a>
          <a href="/formations">Formations</a>
          <a href="/blog">Blog</a>
          <a href="/forum">Forum</a>
          <a href="/live">Live </a>
          <a class="topbar-menu-premium" href="/premium">Premium</a>
        </nav>
        <div class="topbar-right">
          <form class="js-search topbar-search" id="topbar-search" method="get" action="/search">
            <span><a class="icon icon-search" href="/search"></a><input id="q" name="q" placeholder="Rechercher"></span>
          </form>
          @if (Auth::guest())
            <a class="btn btn-grey-border" href="{{ url('/register') }}">S'inscrire</a>
            <a class="btn" id="btn-login" href="{{ url('/login') }}">Se connecter</a>
          @else
            <button class="toggle-sidebar topbar-avatar" title="Mon compte"><img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->id }}"></button>
          @endif
        </div>
</header>
<ul id="left-bar" >
    <li><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Início</a></li>
    <li><a href="{{ route('projects') }}"><i class="fas fa-clipboard-list"></i> Projetos</a></li>
    <li><a href="{{ route('sprints') }}"><i class="fas fa-running"></i> Sprints</a></li>
    <li>
        <a href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> Sair
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
</ul>
<ul id="left-bar">
    <li><a href="">Início</a></li>
    <li><a href="">Projetos</a></li>
    <li><a href="">Sprints</a></li>
    <li>
        <a href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Sair
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
</ul>

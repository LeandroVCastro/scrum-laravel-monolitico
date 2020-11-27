{{-- <ul id="left-bar">
    <li><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Início</a></li>
    <li><a href="{{ route('projects') }}"><i class="fas fa-clipboard-list"></i> Projetos</a></li>
    <li><a href="{{ route('sprints') }}"><i class="fas fa-running"></i> Sprints</a></li>
    <li><a href="{{ route('sprints') }}"><i class="fas fa-tasks"></i> Tarefas</a></li>
    <li>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> Sair
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
</ul> --}}


<div class="list-group">
    <a class="list-group-item list-group-item-action active" href="{{ route('dashboard') }}">
        <i class="fas fa-home"></i> Início
    </a>
    <a class="list-group-item list-group-item-action" href="{{ route('projects') }}">
        <i class="fas fa-clipboard-list"></i> Projetos
    </a>
    <a class="list-group-item list-group-item-action" href="{{ route('sprints') }}">
        <i class="fas fa-running"></i> Sprints
    </a>
    <a class="list-group-item list-group-item-action" href="{{ route('tasks') }}">
        <i class="fas fa-tasks"></i> Tarefas
    </a>
    <a class="list-group-item list-group-item-action" href="{{ route('logout') }}"
    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt"></i> Sair
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>

<div class="list-group">
    <a class="list-group-item list-group-item-action" id="dashboard" href="{{ route('dashboard') }}">
        <i class="fas fa-home"></i> Início
    </a>
    <a class="list-group-item list-group-item-action" id="projects" href="{{ route('projects') }}">
        <i class="fas fa-clipboard-list"></i> Projetos
    </a>
    <a class="list-group-item list-group-item-action" id="sprints" href="{{ route('sprints') }}">
        <i class="fas fa-running"></i> Sprints
    </a>
    <a class="list-group-item list-group-item-action" id="tasks" href="{{ route('tasks') }}">
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

<script>
    const setActiveMenu = function() {
        const uri = location.pathname.substr(1);
        try {
            let element = document.getElementById(uri.split('/')[0]);
            element.classList.add('active');
        } catch (error) {
            console.info('Não foi possível setar o menu ativo: ', uri,  error);
        }
    }
    setActiveMenu()
</script>

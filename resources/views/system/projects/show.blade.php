@include('system.shared.header')
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2">
            @include('system.shared.left-bar')
        </div>
        <div class="col-sm-10">
            <div class="card">
                <div class="card-header">
                    Projeto: {{ $project->name }}
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $project->description}}</p>
                    <img src="{{ asset('storage/projects/' . $project->image) }}" alt="Imagem do projeto" class="img-thumbnail rounded" style="max-width: 250px">
                </div>
            </div>
            <br>
            @include('system.projects.list-sprints')
            <br>
            @include('system.projects.list-members')
        </div>
    </div>
</div>
@include('system.shared.footer')

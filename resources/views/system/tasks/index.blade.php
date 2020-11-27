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
                    Tarefas
                </div>
                <div class="card-body">
                    @include('system.shared.message')
                    <a class="btn btn-primary btn-new" href="{{ route('new-sprint') }}">
                        <i class="fas fa-plus"></i> Nova
                    </a>
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" style="width: 5%;">#</th>
                                <th scope="col" style="width: 10%">Título</th>
                                <th scope="col" style="width: 20%;">Descrição</th>
                                <th scope="col" style="width: 20%;">Status</th>
                                <th scope="col" style="width: 15%;" >Projeto</th>
                                <th scope="col" style="width: 15%;" >Sprint</th>
                                <th scope="col" style="width: 20%;">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                            <tr>
                                <th>{{ $task->id }}</th>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->description }}</td>
                                <td>
                                    @if ($task->status->id === 1)
                                        <span class="badge badge-warning">{{ $task->status->title }}</span>
                                    @endif
                                    @if ($task->status->id === 2)
                                        <span class="badge badge-primary">{{ $task->status->title }}</span>
                                    @endif
                                    @if ($task->status->id === 3)
                                        <span class="badge badge-success">{{ $task->status->title }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('project', ['id' => $task->project_id]) }}" class="text-decoration-none">
                                        {{ $task->project->name }}
                                    </a>
                                </td>
                                <td>Sprint</td>
                                <td class="options">
                                    Opções
                                    {{-- <a type="button" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Tem certeza?')"
                                    href=" {{ route('delete-sprint', ['id' => $sprint->id]) }} ">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                    <a type="button" class="btn btn-primary btn-sm"
                                    href=" {{ route('edit-sprint', ['id' => $sprint->id]) }} ">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a type="button" class="btn btn-secondary btn-sm"
                                    href=" {{ route('sprint', ['id' => $sprint->id]) }} ">
                                        <i class="far fa-eye"></i>
                                    </a> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('system.shared.footer')

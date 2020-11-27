<div class="card">
    <div class="card-header">
        Membros
    </div>
    <div class="card-body">
        @if ($user->admin)
            {{-- <a class="btn btn-primary btn-new" href="{{ route('new-project') }}">
                <i class="fas fa-plus"></i> Novo
            </a> --}}
        @endif

        <table class="table table-hover">
            <thead class="thead">
                <tr>
                    <th scope="col" style="width: 5%;">#</th>
                    <th scope="col" style="width: 50%">Nome</th>
                    <th scope="col" style="width: 20%;">Função</th>
                    <th scope="col" style="width: 20%;">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($project->project_role_user as $project_role_user)
                    <tr>
                        <th>{{ $project_role_user->user->id }}</th>
                        <td>{{ $project_role_user->user->name }}</td>
                        <td>
                            @if ($project_role_user->project_role->id === 1) 
                                <span class="badge badge-success">{{ $project_role_user->project_role->name }}</span>
                            @endif
                            @if ($project_role_user->project_role->id === 2) 
                                <span class="badge badge-primary">{{ $project_role_user->project_role->name }}</span>
                            @endif
                            @if ($project_role_user->project_role->id === 3) 
                                <span class="badge badge-secondary">{{ $project_role_user->project_role->name }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($user->admin)
                                {{'Ainda vou criar as opções'}}
                                {{-- <a type="button" class="btn btn-danger btn-sm"
                                onclick="return confirm('Tem certeza?')"
                                href=" {{ route('delete-sprint', ['id' => $project_role_user->user->id]) }} ">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                <a type="button" class="btn btn-primary btn-sm"
                                href=" {{ route('edit-sprint', ['id' => $project_role_user->user->id]) }} ">
                                    <i class="far fa-edit"></i>
                                </a> --}}
                            @else
                                {{'--'}}
                            @endif
                        </td>
                    </tr>
                @endforeach
                {{-- @foreach ($project->sprints()->orderBy('created_at', 'desc')->get() as $sprint)
                    <tr>
                        <th>{{ $sprint->id }}</th>
                        <td>{{ $sprint->title }}</td>
                        <td>{{ $sprint->description }}</td>
                        <td>
                            @if ($sprint->status->id === 1)
                                <span class="badge badge-warning">{{ $sprint->status->title }}</span>
                            @endif
                            @if ($sprint->status->id === 2)
                                <span class="badge badge-primary">{{ $sprint->status->title }}</span>
                            @endif
                            @if ($sprint->status->id === 3)
                                <span class="badge badge-success">{{ $sprint->status->title }}</span>
                            @endif
                        </td>
                        <td class="options">
                            @if ($user->admin)
                                <a type="button" class="btn btn-danger btn-sm"
                                onclick="return confirm('Tem certeza?')"
                                href=" {{ route('delete-sprint', ['id' => $sprint->id]) }} ">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            @endif
                            @if ($sprint->project->loggedUserHavePermissionToSave())
                                <a type="button" class="btn btn-primary btn-sm"
                                href=" {{ route('edit-sprint', ['id' => $sprint->id]) }} ">
                                    <i class="far fa-edit"></i>
                                </a>
                            @endif
                            <a type="button" class="btn btn-secondary btn-sm"
                            href=" {{ route('sprint', ['id' => $sprint->id]) }} ">
                                <i class="far fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach --}}
            </tbody>
        </table>
    </div>
</div>
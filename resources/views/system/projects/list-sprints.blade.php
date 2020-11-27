<div class="card">
    <div class="card-header">
        Sprints
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead class="thead">
                <tr>
                    <th scope="col" style="width: 5%;">#</th>
                    <th scope="col" style="width: 25%">Nome</th>
                    <th scope="col" style="width: 35%;">Descrição</th>
                    <th scope="col" style="width: 10%;">Status</th>
                    <th scope="col" style="width: 20%;">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($project->sprints()->orderBy('created_at', 'desc')->get() as $sprint)
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
                @endforeach
            </tbody>
        </table>
    </div>
</div>
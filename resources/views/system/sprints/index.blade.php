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
                    Sprints
                </div>
                <div class="card-body">
                    @include('system.shared.message')
                    <a class="btn btn-primary btn-new" href="{{ route('new-sprint') }}">
                        <i class="fas fa-plus"></i> Novo
                    </a>
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" style="width: 5%;">#</th>
                                <th scope="col" style="width: 10%">Nome</th>
                                <th scope="col" style="width: 20%;">Descrição</th>
                                <th scope="col" style="width: 35%;">Status</th>
                                <th scope="col" style="width: 20%;">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sprints as $sprint)
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
                                    Opções
                                    <div class="btn-group" role="group" aria-label="Opções">
                                        <a type="button" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Tem certeza?')"
                                        href=" {{ route('delete-sprint', ['id' => $sprint->id]) }} ">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                        <a type="button" class="btn btn-primary btn-sm"
                                        href=" {{ route('edit-sprint', ['id' => $sprint->id]) }} ">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        {{-- <a type="button" class="btn btn-secondary btn-sm"
                                        href=" {{ route('project', ['id' => $sprint->id]) }} ">
                                            <i class="far fa-eye"></i>
                                        </a> --}}
                                    </div>
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

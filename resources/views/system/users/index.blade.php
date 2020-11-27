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
                    Usuários
                </div>
                <div class="card-body">
                    @include('system.shared.message')
                    <a class="btn btn-primary btn-new" href="{{ route('new-user') }}">
                        <i class="fas fa-plus"></i> Novo
                    </a>
                    <table class="table table-hover">
                        <thead class="thead">
                            <tr>
                                <th scope="col" style="width: 5%;">#</th>
                                <th scope="col" style="width: 25%">Nome</th>
                                <th scope="col" style="width: 20%;">E-mail</th>
                                <th scope="col" style="width: 15%;">Administrador</th>
                                <th scope="col" style="width: 10%;">Status</th>
                                <th scope="col" style="width: 20%;">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if ($user->admin)
                                            <span class="badge badge-primary">Sim</span>
                                        @else
                                            <span class="badge badge-secondary">Não</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if (!$user->deleted_at)
                                            <span class="badge badge-success">Ativado</span>
                                        @else
                                            <span class="badge badge-danger">Desativado</span>
                                        @endif
                                    </td>
                                    <td class="options">
                                        {{-- <a type="button" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Tem certeza?')"
                                        href=" {{ route('delete-user', ['id' => $user->id]) }} ">
                                            <i class="far fa-trash-alt"></i>
                                        </a> --}}
                                        <a type="button" class="btn btn-primary btn-sm"
                                        href=" {{ route('edit-user', ['id' => $user->id]) }} ">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        {{-- <a type="button" class="btn btn-secondary btn-sm"
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

@include('system.shared.header')
<br>
<div class="container">
    <div class="row">
        <div class="col-sm-2">
            @include('system.shared.left-bar')
        </div>
        <div class="col-sm-10">
            <div class="card">
                <div class="card-body">
                    <h2>Projetos</h2>
                    <hr>
                    @if(session()->has('message.success'))
                        <div class="alert alert-success"> 
                            {{ session('message.success') }}
                        </div>
                    @endif
                    @if(session()->has('message.error'))
                        <div class="alert alert-danger"> 
                            {{ session('message.error') }}
                        </div>
                    @endif
                    <a class="btn btn-primary btn-new" href="{{ route('new-project') }}">
                        <i class="fas fa-plus"></i> Novo
                    </a>
                    
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" style="width: 5%;">#</th>
                                <th scope="col" style="width: 10%">Imagem</th>
                                <th scope="col" style="width: 20%;">Nome</th>
                                <th scope="col" style="width: 35%;">Descrição</th>
                                <th scope="col" style="width: 20%;">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <th scope="row">{{ $project->id}}</th>
                                    <td> <img src="{{  asset('storage/projects/' . $project->image)  }}" style="width: 100%;" alt=""> </td>
                                    {{-- <td> <img src="http://localhost/storage/projects/IDTJtZZkOx30XrnQNe0nW1b1ou4t4yaLhlA9vfXT.jpeg" alt=""> </td> --}}
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->description }}</td>
                                    <td class="options">
                                        <div class="btn-group" role="group" aria-label="Opções">
                                            <a type="button" class="btn btn-danger"
                                            onclick="return confirm('Tem certeza?')"
                                            href=" {{ route('delete-project', ['id' => $project->id]) }} ">
                                                <i class="far fa-trash-alt"></i> Excluir
                                            </a>
                                            <a type="button" class="btn btn-primary">
                                                <i class="far fa-edit"></i> Editar
                                            </a>
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

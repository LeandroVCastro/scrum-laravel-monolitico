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
                    Novo Projeto
                </div>
                <div class="card-body">
                    <form action="{{ url('/projects/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nome</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="{{ $project->name ?? '' }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">Descrição</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="description" name="description" rows="5"
                                    required>{{$project->description ?? ''}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">Imagem</label>
                            <div class="col-sm-10 ">
                                <input type="file" name="image" id="image">
                            </div>
                        </div>
                        @if (isset($project))
                            <div class="row">
                                <div class="offset-sm-2 col-sm-10">
                                    <img src="{{ asset('storage/projects/' . $project->image) }}" style="max-width: 100%;" alt="">
                                </div>
                            </div>
                            <input type="hidden" name="id" value="{{$project->id}}">
                        @endif
                        <br>
                        <div class="d-flex justify-content-end">
                            <a type="button" class="btn btn-light mr-2" href=" {{ url('/projects') }} ">Cancelar</a>
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('system.shared.footer')

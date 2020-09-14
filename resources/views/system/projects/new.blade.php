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
                    <h2>Novo Projeto</h2>
                    <hr>
                    <form action="{{ url('/projects/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nome</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">Descrição</label>
                            <div class="col-sm-10">
                              <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">Imagem</label>
                            <div class="col-sm-10 ">
                                <input type="file" name="image" id="image">
                            </div>
                          </div>
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

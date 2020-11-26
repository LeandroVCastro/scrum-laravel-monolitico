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
                    Novo Sprint
                </div>
                <div class="card-body">
                    <form action="{{ url('/sprints/store') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="project_id" class="col-sm-2 col-form-label">Projeto</label>
                            <div class="col-sm-10">
                                <select class="custom-select" name="project_id" id="project_id" required="true">
                                    @foreach ($projects as $project)
                                    <option {{ $sprint->project_id == $project->id ? 'selected' : ''}} value="{{ $project->id }}">
                                        {{ $project->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Título</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title" value="{{ $sprint->title ?? '' }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">Descrição</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="description" name="description" rows="5"
                                    required>{{$sprint->description ?? ''}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status_id" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select class="custom-select" name="status_id" id="status_id" required>
                                    @foreach ($status as $statusItem)
                                    <option {{ $sprint->status_id == $statusItem->id ? 'selected' : ''}} value="{{ $statusItem->id }}">
                                        {{ $statusItem->title }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @if (isset($sprint))
                            <input type="hidden" name="id" value="{{$sprint->id}}">
                        @endif
                        <br>
                        <div class="d-flex justify-content-end">
                            <a type="button" class="btn btn-light mr-2" href=" {{ url('/sprints') }} ">Cancelar</a>
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('system.shared.footer')

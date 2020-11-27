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
                    Sprint: {{ $sprint->title }}
                </div>
                <div class="card-body">
                    <p class="card-text">
                        Status: 
                        @if ($sprint->status->id === 1)
                            <span class="badge badge-warning">{{ $sprint->status->title }}</span>
                        @endif
                        @if ($sprint->status->id === 2)
                            <span class="badge badge-primary">{{ $sprint->status->title }}</span>
                        @endif
                        @if ($sprint->status->id === 3)
                            <span class="badge badge-success">{{ $sprint->status->title }}</span>
                        @endif
                        <br>
                        {{ $sprint->description}}
                    </p>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    Tarefas
                </div>
                <div class="card-body">
                    Aqui serão listadas as tarefas desse sprint
                </div>
            </div> 
        </div>
    </div>
</div>
@include('system.shared.footer')

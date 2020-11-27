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
                    <p class="card-text">{{ $sprint->description}}</p>
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

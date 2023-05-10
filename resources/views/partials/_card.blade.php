<div class="card card_style" data-id="{{ $task->id }}" data-order="{{ $task->order }}">


    {{-- Card Component --}}
    <div class="card-body">
        <p>Name: {{ $task->name }}</p>

        <p>Priority: @if ($task->priority === '1')
            <button class="btn btn-primary">Low</button>

        @elseif ($task->priority === '2')
            <button class="btn btn-warning">Medium</button>


        @else
            <button class="btn btn-danger">High</button>

        @endif</p>

        <p>
            Created At : {{ $task->created_at }}
        </p>

        <div class="action_btn">
            <button class="ml-2 ml-3 btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#editTaskModal{{ $task->id }}">
                <i class="fas fa-edit btn-success "></i>
            </button>

            @include('partials._editmodal')

           {{-- Delete Action --}}
        <form method="POST" action="/tasks/{{$task->id}}">
            @csrf
            @method('DELETE')
            <button class="btn btn-outline-danger mx-1" onclick="return confirm('Are you sure you want to delete this Task')">
                <i class="fas fa-trash  text-danger-50"></i>
            </button>
        </form>
        </div>
    </div>
</div>

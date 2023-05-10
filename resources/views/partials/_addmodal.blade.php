{{-- Add Task Modal --}}
<div class="modal fade" id="newTaskModal" tabindex="-1"  data-mdb-backdrop="static" aria-labelledby="taskModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">


    <form action="/tasks" method="POST">
    @csrf
      <div class="modal-content">
        <div class="modal-header bg-bluedark">
          <h5 class="modal-title" id="exampleModalLabel">Create New Task</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">

            @if (count($projects) === 0)
                <div class="alert alert-danger">
                    No Project Created, Please Create A Project First
                </div>
            @endif

            <div class="form-group my-3">
                <label for="Name">Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                @error('name')
                <p class="text-danger  mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group my-3">
                <label for="Name">Priority</label>
                <select name="priority" class="form-select" id="">
                    <option value="priority">Choose ...</option>
                    <option value="1">Low</option>
                    <option value="2">Medium</option>
                    <option value="3">High</option>

                </select>

                @error('priority')
                <p class="text-danger  mt-1">{{$message}}</p>
                @enderror
            </div>


            <div class="form-group my-3">
                <label for="Project_id">Select Project</label>
                <select name="project_id" class="form-select" id="">
                    <option value="project_id">Choose ...</option>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>

                @error('project_id')
                <p class="text-danger  mt-1">{{$message}}</p>
                @enderror
            </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
</div>




{{-- Projects Modal --}}
<div class="modal fade" id="newProjectModal" data-mdb-backdrop="static" tabindex="-1" aria-labelledby="taskModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <form action="/projects" method="POST">
            @csrf
        <div class="modal-header bg-bluedark">
          <h5 class="modal-title" id="exampleModalLabel">Create New Project</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">




            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                @error('name')
                <p class="text-danger  mt-1">{{$message}}</p>
                @enderror
            </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

      </div>
    </form>
    </div>
</div>

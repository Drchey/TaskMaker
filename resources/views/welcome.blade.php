@extends('layout')

@section('content')

@include('partials._header')


<div class="m-5" >

    @include('partials._flashmessage')

    <div class=" my-4">

         {{--  New Project Modal --}}
         <button class="mr-5  btn btn-success" data-mdb-toggle="modal" data-mdb-target="#newProjectModal">Create New Project</button>

        {{-- View Projects --}}
         <a href="/projects" class="mr-5  btn btn-secondary">View Project(s)</a>
        {{--  New Task Modal --}}
        <button class="ml-2 ml-3 btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#newTaskModal">Create New Task</button>
        {{-- Refresh --}}
        <a href="/" class="btn btn-outline-primary ml-1">
            <i class="fas fa-refresh"></i>
        </a>
      </div>



      {{-- Get All Tasks --}}

    @unless (count($tasks) === 0)

    <div class="form-group my-3" style="display: flex;align-item:center; justify-content:space-between">

    <form action="/" class="d-flex">
        <select name="project" id="" class="form-select mx-1">
            <option value="">Select Project</option>
            @foreach ($projects as $project)
                <option value="{{ $project->id }}">{{ $project->name }}</option>
            @endforeach


        </select>


        <button class="btn btn-outline-primary mx-1">
            Search
        </button>

    </form>

    </div>
<div class="row">
      @foreach ($tasks as $task)
                @include('partials._card')

      @endforeach

</div>


      {{ $tasks->links() }}


    @else


    <div class="alert-danger py-2 px-1">
        No Tasks Recorded
    </div>

    @endunless




    @include('partials._addmodal')
    @include('partials._sort')
</div>


@endsection

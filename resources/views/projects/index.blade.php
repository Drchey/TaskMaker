@extends('layout')

@section('content')

@include('partials._header')


<div class="m-5" >

    <h2>Project(s)</h2>

    <div class=" my-4">





        <a href="/" class="ml-2 ml-3 btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
      </div>

    @unless (count($projects) === 0)


    {{-- fetch all projects --}}

      @foreach ($projects as $project)

      <div class="alert alert-primary d-flex justify-content-between">
        <div class="">
            {{ $project->name }}
        </div>


        {{-- Delete Action --}}
        <form method="POST" action="/projects/{{$project->id}}">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger mx-1" onclick="return confirm('Are you sure you want to delete this Project, All Tasks Will be Deleted Accordingly')">
                <i class="fas fa-trash  text-white-50"></i>
            </button>
        </form>
      </div>
      @endforeach



    @else

    <div class="alert-danger py-2 px-1">
        No Projects Recorded
    </div>

    @endunless


    @include('partials._addmodal')
</div>


@endsection

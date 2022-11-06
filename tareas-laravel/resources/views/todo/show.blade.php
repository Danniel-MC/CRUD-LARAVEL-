@extends('app')

@section('content')
    <div class="container w-25 border p-4 mt-4">
        <form action="{{ route('todos-update', [$todo->id]) }}" method="POST">
            @method('PATCH')
            @csrf {{--  genera token --}}

            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            @error('title')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror

            <div class="mb-3">
                <label for="title" class="form-label">Title task</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $todo->title }}">
                <div id="emailHelp" class="form-text">Add description to task </div>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>



    </div>
@endsection

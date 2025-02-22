@extends('layout')

@section('content')
    <h1>User Form</h1>

    @if (isset($errors))
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="pb-2">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    @endif

    <form @if (isset($id)) action="/users/{{ $id }}" @else action="/users" @endif method="POST">
        @csrf

        @if (isset($id))
            @method('PUT')
        @endif

        <div>Name</div>
        <input type="text" class="form-control" name="name" value="{{ old('name', $name) }}" placeholder="Name">
        @if (isset($errors))
            @if ($errors->has('name'))
                <div class="text-danger">{{ $errors->first('name') }}</div>
            @endif
        @endif

        <div>Email</div>
        <input type="text" class="form-control" name="email" value="{{ old('email', $email) }}" placeholder="Email">
        @if (isset($errors))
            @if ($errors->has('email'))
                <div class="text-danger">{{ $errors->first('name') }}</div>
            @endif
        @endif

        <div class="mt-3">Password</div>
        <input type="password" class="form-control" name="password" placeholder="Password">
        @if (isset($errors))
            @if ($errors->has('password'))
                <div class="text-danger">{{ $errors->first('name') }}</div>
            @endif
        @endif

        <div class="mt-3">
            <button type="submit" class="btn btn-success">
                <i class="fa-solid fa-check me-2"></i>
                Submit
            </button>
        </div>
    </form>
@endsection

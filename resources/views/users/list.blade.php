@extends('layout')

@section('content')
    <h1>User List</h1>

    <a href="/users/form" class="btn btn-success my-2">
        <i class="fa-solid fa-plus"></i>
        Create User
    </a>

    @if (isset($users))
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th width="110px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="text-center">
                            <form action="/users/remove/{{ $user->id }}" method="post">
                                @csrf
                                @method('delete')

                                <a href="/users/{{ $user->id }}" class="btn btn-primary">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                                <button class="btn btn-danger" type="submit">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection

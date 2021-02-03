@extends('layouts.main')

@section('content')
    <form method="POST" action="{{ route('images.find') }}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">User name</label>
            <input name="userName" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Find images by user (name)</div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('images.index') }}">
            <button type="button" class="btn btn-light">Clear</button>
        </a>
    </form>

    <div class="images">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">user id</th>
                <th scope="col">user name</th>
                <th scope="col">image</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($images as $image)
                <tr>
                    <th scope="row">{{ $image->user->id }}</th>
                    <td>{{ $image->user->name }}</td>
                    <td>
                        <img class="image" src="{{ 'storage/images/' . $image->uuid . '.jpg' }}">
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if (isset($paginate))
            {{ $images->links() }}
        @endif

        @if (isset($errors))
        <ul>
            @foreach ($errors as $error)
            <li>
                {{ $error }}
            </li>
            @endforeach
        </ul>
        @endif

    </div>


@endsection

@extends('layouts')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('login')}}" method="POST">
        @csrf
        <div>
            <input type="email" name="email" >
        </div>
        <div>
            <input type="password" name="password" >
        </div>
        <div>
            <input type="submit" value="submit">
        </div>



    </form>
@endsection

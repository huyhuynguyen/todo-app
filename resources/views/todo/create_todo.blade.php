@extends('layout.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/create_todo.css') }}">
    <div class="main__wrapper">
        <div class="main__container-header">
            <h2 class="main__container-heading">
                Create Todo
            </h2>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="main__table-wrapper">
            <div class="main__table-container">
                <div class="main__table-header">
                    <h3 class="main__table-heading">
                        Create new todo
                    </h3>
                </div>

                <div class="main__form-container">
                    <form action="/todolist" method="post" class="main__form-create-todo">
                        @csrf

                        <div class="form__group">
                            <input type="text" name="title" class="form__group-title" placeholder="Title...">
                        </div>
                        <div class="form__group">   
                            <textarea name="detail" class="form__group-desciption" placeholder="Detail..."></textarea>
                        </div>
                        <div class="form__group">
                            <button type="submit" class="form__group-btn-create">Create Todo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
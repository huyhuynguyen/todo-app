@extends('layout.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/edit_todo.css') }}">
    <div class="main__wrapper">
        <div class="main__container-header">
            <h2 class="main__container-heading">
                Edit Todo
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
                        Edit this todo
                    </h3>
                </div>

                <div class="main__form-container">
                    <form action="/todolist/{{ $todo->slug }}" method="post" class="main__form-create-todo">
                        @csrf
                        @method('PUT')
                        
                        <div class="form__group">
                            <input type="text" name="title" value="{{ $todo->title }}" class="form__group-title" placeholder="Title...">
                        </div>
                        <div class="form__group">   
                            <textarea name="detail" class="form__group-desciption" placeholder="Detail...">{{ $todo->detail }}</textarea>
                        </div>
                        <div class="form__group">
                            <button type="submit" class="form__group-btn-create">Edit Todo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
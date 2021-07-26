@extends('layout.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/show.css') }}">
    <div class="main__wrapper">
        <div class="main__container-header">
            <h2 class="main__container-heading">
                {{ $todo->title }}
            </h2>
        </div>

        <div class="main__container-status-btnEdit-wrapper">
            <div class="main__container-status-btnEdit-container">
                <div class="main__container-status-container">
                    <p class="status-container">Status: 
                        @if ($todo->completed==0)
                            <span class="status text-danger">Not completed</span>
                        @else
                            <span class="status text-success">completed</span>
                        @endif
                    </p>
                </div>

                <div class="main__container-btn-action-container">
                    <div class="main__container-btnEdit-container">
                        <a href="/todolist/{{ $todo->slug }}/edit" class="main__container-btnEdit-link">
                            <button class="main__container-btnEdit">
                                <div class="edit-text-icon-container">
                                    <div class="edit-text">
                                        Edit
                                    </div>
                                    <div class="edit-icon">
                                        <img src="https://img.icons8.com/material-two-tone/24/000000/edit.png" class="main__todo-btn-edit-icon"/>
                                    </div>
                                </div>
                            </button>
                        </a>
                    </div>
    
                    <div class="main__todo-btn-delete">
                        <form action="/todolist/{{ $todo->slug }}" method="post">
                            @csrf
                            @method('DELETE')
    
                            <button type="submit" class="form__group-btn-delete">
                                <img src="https://img.icons8.com/material-rounded/24/000000/trash.png" class="main__todo-btn-delete-icon"/>
                            </button>
                        </form>
                        
                    </div>
                </div>

                
            </div>
        </div>

        <div class="main__content-wrapper">
            <div class="main__content-header">
                <h3 class="main__content-heading">
                    Detail:
                </h3>
            </div>
            <div class="main__content-container">
                <p class="main__content">
                    {{-- keep line break --}}
                    {!! nl2br(e($todo->detail)) !!}
                </p>
            </div>
        </div>
    </div>
@endsection
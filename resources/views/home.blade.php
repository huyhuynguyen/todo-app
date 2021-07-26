@extends('layout.app')

@section('content')
<link rel="stylesheet" href='{{ asset('css/app.css') }}'>
    <div class="main__wrapper">
        <div class="main__banner-container">
            <div class="main__paragraph-container">
                <div class="main__paragraph-header">
                    <h3 class="main__paragraph-heading">Build your Todo App</h3>
                </div>
                <div class="main__paragraph-text-container">
                    <p class="main__paragraph-text">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                </div>
                <div class="main__btn-container">
                    <a href="" class="main__btn-link">
                        <button class="main__btn-view-more">
                            View more >>
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <div class="main__content-wrapper">
            <div class="main__content-container">
                <div class="main__content-header">
                    <h3 class="main__content-heading">
                        ToDo App
                    </h3>
                </div>

                <div class="main__content-latest-container">
                    <p class="main__content-latest">Latest Todo</p>
                </div>

                <div class="main__todo-latest-wrapper">
                    <div class="main__todo-latest-container">
                        <div class="main__todo-latest--left">
                            <div class="main__todo-latest--left-top">
                                <div class="main__todo-icon-complete">
                                    @if ($todo->completed==0)
                                        <img src="https://img.icons8.com/ios/50/000000/circled-x.png" class="main__todo-image-icon"/>
                                    @else
                                        <img src="https://img.icons8.com/ios-glyphs/30/000000/double-tick.png" class="main__todo-image-icon"/>
                                    @endif
                                </div>
                                <div class="main__todo-title-container">
                                    <p class="main__todo-title">
                                        <a href="/todolist/{{ $todo->slug }}" class="main__todo-title-link">
                                            {{ $todo->title }}
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="main__todo-latest--left-bottom">
                                <p class="main__todo-latest--left-paragraph">Updated at: <span class="main__todo-latest--left-time">{{ date('Y-m-d', strtotime($todo->updated_at)) }}</span></p>
                            </div>
                        </div>
                        
                        <div class="main__todo-latest-action--right">
                            <div class="main__todo-btn-complete-container">

                                @if ($todo->completed==0)
                                    <form action="/todolist/{{ $todo->slug }}/0/complete" method="post">
                                        @csrf
                                        @method('PUT')

                                        <button data="false" class="main__todo-btn-complete">Mark it as completed</button>
                                    </form>
                                @else
                                    <form action="/todolist/{{ $todo->slug }}/1/complete" method="post">
                                        @csrf
                                        @method('PUT')

                                        <button data="true" class="main__todo-btn-complete">Mark it as uncompleted</button>
                                    </form>
                                @endif
                            </div>
                            <div class="main__todo-btn-edit">
                                <a href="/todolist/{{ $todo->slug }}/edit" class="main__todo-btn-edit-link">
                                    <img src="https://img.icons8.com/material-two-tone/24/000000/edit.png" class="main__todo-btn-edit-icon"/>
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

                <div class="main__to-btn-all-list-container">
                    <a href="/todolist" class="main__to-btn-all-list-container-link">
                        <button class="main__to-btn-all-list">
                            View all list >>>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- <script src="{{ asset('js/main.js') }}"></script> --}}
@endsection


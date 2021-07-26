@extends('layout.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/search.css') }}">
    <div class="main__wrapper">
        <div class="main__header">
            <h2 class="main__header-heading">
                Search Todos Page
            </h2>
        </div>

        <div class="main__search-wrapper">
            <div class="main__search-container">
                <form action="/todolist/search" method="post" class="main__form-search">
                    @csrf
                    
                    <div class="form__group">
                        <input type="search" name="search" value="{{ $_SESSION['search'] }}" class="form__group-input-search" placeholder="Search..." title="search todo">
                    </div>
                    <div class="form__group">
                        <button type="submit" class="form__group-btn-search">
                            Search
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="main__result-wrapper">
            <div class="main__result-container">
                <p class="main__result">
                    Total:
                    @if (isset($todos))
                        {{ $todos->count() }}
                        @if ($todos->count() > 1)
                            results
                        @else
                            result
                        @endif
                    @else
                        0 result
                    @endif 
                </p>
            </div>
        </div>

        <div class="main__table-container">
            <div class="main__table-header">
                <h4 class="main__table-heading">Todos</h4>
            </div>

            @if (isset($todos) && $todos->count() > 0)
                <div class="main__list-container">
                    <ul class="main__list-todos">
                        @foreach ($todos as $todo)
                            <li class="main__list-todos-item">
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
                            </li>
                        @endforeach
                    </ul>
                    {{-- <div class="navigate-pagination">
                        {{ $todos->link('pagination::bootstrap-4') }}
                    </div> --}}
                </div>
            @else
                <p class="h3 mt-4 mb-3 ml-5">
                    No result
                </p>
            @endif
        </div>
    </div>  
@endsection
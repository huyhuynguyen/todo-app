<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!------ reset CSS về mặc định ------->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">

    <!-------- nhúng bootstrap ----------->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
</head>
<body>
    <div class="app">
        <header>
            <div class="header-wrapper">
                <div class="header-logo-container">
                    <h2 class="header-logo-heading">
                        <a href="/" class="header-logo-heading-link">Todo App</a>
                    </h2>
                </div>

                <div class="header-link-container">
                    <ul class="header__link-list">
                        <li class="list-item">
                            <a href="/" class="list-item-link">Home</a>
                        </li>
                        <li class="list-item">
                            <a href="/todolist" class="list-item-link">Todo List</a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <div class="main">
            @yield('content')
        </div>

        <footer>
            <div class="footer__wrapper">
                <div class="footer__wrapper-info">
                    <div class="footer-logo-container">
                        <h2 class="footer-logo-heading">
                            Todo App
                        </h2>
                    </div>
    
                    <div class="footer-link-container">
                        <div class="footer-link-list-container">
                            <h4 class="footer-link-list-heading">Discover</h4>
                            <ul class="footer-link-list">
                                <li class="footer-link-list-item">
                                    <a href="" class="footer-link-list-item-link">
                                        Successful story
                                    </a>
                                </li>
                                <li class="footer-link-list-item">
                                    <a href="" class="footer-link-list-item-link">
                                        Some book
                                    </a>
                                </li>
                                <li class="footer-link-list-item">
                                    <a href="" class="footer-link-list-item-link">
                                        My blog
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="footer-link-list-container">
                            <h4 class="footer-link-list-heading">About us</h4>
                            <ul class="footer-link-list">
                                <li class="footer-link-list-item">
                                    <a href="" class="footer-link-list-item-link">
                                        Company
                                    </a>
                                </li>
                                <li class="footer-link-list-item">
                                    <a href="" class="footer-link-list-item-link">
                                        Customer
                                    </a>
                                </li>
                                <li class="footer-link-list-item">
                                    <a href="" class="footer-link-list-item-link">
                                        Cloud
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="footer-link-list-container">
                            <h4 class="footer-link-list-heading">Support</h4>
                            <ul class="footer-link-list">
                                <li class="footer-link-list-item">
                                    <a href="" class="footer-link-list-item-link">
                                        Contact with us
                                    </a>
                                </li>
                                <li class="footer-link-list-item">
                                    <a href="" class="footer-link-list-item-link">
                                        Online Support
                                    </a>
                                </li>
                                <li class="footer-link-list-item">
                                    <a href="" class="footer-link-list-item-link">
                                        Company Support
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="footer__wrapper-copyright">
                    <p class="footer__wrapper-copyright-paragraph">Copyright &copy; Huy Nguyen all right reserved</p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
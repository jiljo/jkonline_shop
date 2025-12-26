<!DOCTYPE html>
<html class="h-100" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login - YourAppName</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="h-100">

    <!-- Preloader -->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>

    <!-- Login Form -->
    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="{{ url('/') }}">
                                    <h4>Login</h4>
                                </a>

                                <!-- AJAX Message Placeholder -->
                                <div id="login-message" class="text-center mb-3"></div>

                                <form id="loginForm" class="mt-5 mb-5 login-input">
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    <button type="submit" class="btn login-form__btn submit w-100">Sign In</button>
                                </form>

                                <p class="mt-5 login-form__footer">
                                    Don’t have an account?
                                    <a href="{{ route('register') }}" class="text-primary">Sign Up</a> now
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/gleek.js') }}"></script>
    <script src="{{ asset('js/styleSwitcher.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('loginForm');
            form.addEventListener('submit', function (e) {
                e.preventDefault();

                const formData = new FormData(form);

                fetch("{{ route('login.custom') }}", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                    },
                    body: formData,
                    credentials: 'same-origin' 
                })
                .then(async (res) => {
                    const data = await res.json();
                    const messageBox = document.getElementById('login-message');

                    if (res.ok) {
                        messageBox.innerHTML = `<span style="color:green;">${data.message}</span>`;
                        setTimeout(() => {
                            window.location.href = "/dashboard"; // change this to your post-login page
                        }, 1000);
                    } else {
                        messageBox.innerHTML = `<span style="color:red;">${data.message}</span>`;
                    }
                })
                .catch(error => {
                    console.error('Login error:', error);
                });
            });
        });
    </script>
</body>
</html>

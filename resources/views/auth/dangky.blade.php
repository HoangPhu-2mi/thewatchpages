<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .brand-box {
            text-align: center;
            margin-bottom: 25px;
        }
        .brand-box h2 {
            font-weight: 700;
            color: #000;
        }
        .register-container {
            background-color: #fff;
            padding: 40px 35px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        .btn-dark {
            background-color: #000;
            border: none;
        }
    </style>
</head>
<body>

    <div class="flex flex-col">
        <!-- LOGO / BRAND -->
        <div class="brand-box">
             <a class="navbar-brand fw-bold fs-5 text-dark me-auto" href="{{ url('/') }}" aria-label="Trang chủ The Watch Pages" style="white-space: nowrap;">
                <svg height="29px" width="223px" aria-hidden="true" class="w-44 fill-current sm:w-48 2xl:w-56" xmlns="http://www.w3.org/2000/svg" id="Layer_1" viewBox="0 0 600 77.8" version="1.1">
              <path class="st0" d="M64.3 32.6h-6L46.3 59l-7.8-21.9-7.8 23.3-12-28.7h-5.5c.5-1.8 1.2-3.6 2.1-5.2h6.9l8 19.1 8.2-24.4L47 45.1l8-17.7h7.4c.8 1.6 1.4 3.4 1.9 5.2z" id="path12" fill-opacity="1"></path>
              <path class="st0" d="M77.2 37.8l-5.4-.4 3.4-11.6c.1-.3-.2-.6-.5-.5l-5.2 1.4-.5-12.1c0-.3-.4-.5-.6-.3l-4.5 3L59.3 6c-.1-.3-.5-.3-.7-.1l-3.3 4.3L47.5 1c-.2-.2-.6-.2-.7.1l-1.6 5-9.8-6c-.3-.2-.6 0-.6.3v5.4L22.9 3.2c-.3-.1-.5.2-.5.5l1.8 5.1-12.1 1.4c-.3 0-.5.4-.3.6l3.3 4.3-10.8 5.3c-.3.1-.3.5 0 .7l4.5 3-8.6 8.5c-.2.2-.1.6.2.7l5.2 1.3L.2 45.4c-.2.3 0 .6.3.6l5.4-.4-1.6 12c0 .3.3.5.6.4l5-2.2 2.4 11.9c.1.3.4.4.7.2l4-3.7 6.2 10.5c.2.3.5.2.7 0l2.6-4.8 9.2 7.9c.2.2.6.1.7-.2l.9-5.4 11.3 4.4c.3.1.6-.1.5-.4L48 70.7l12.1.5c.3 0 .5-.3.3-.6l-2.6-4.8 11.6-3.4c.3-.1.4-.5.2-.7l-4-3.6 9.9-7.1c.2-.2.2-.6-.1-.7l-5-2.1 7-9.9c.2-.2.1-.5-.2-.5zM38.6 65.3c-14.6 0-26.4-11.8-26.4-26.4 0-2.5.3-4.9 1-7.2.5-1.8 1.2-3.6 2.1-5.2 4.4-8.3 13.2-14 23.3-14 10.5 0 19.5 6.1 23.8 14.9.8 1.7 1.4 3.4 1.9 5.2.5 2 .8 4.1.8 6.3-.1 14.5-11.9 26.4-26.5 26.4zm75-7.9h-6.3V27.5H96v-5.8h28.9v5.8h-11.3v29.9zm24.2-15v15h-6.3V21.7h6.3v14.8h17V21.7h6.3v35.7h-6.3v-15h-17zm58.9-15.1h-20.2v9.3h17.9v5.6h-17.9v9.6h20.4v5.6h-26.7V21.7h26.4v5.6zm44.3-5.7h5.3l8.8 26.5 8.5-26.4h6.6l-12.4 35.9h-5.4L243.5 32l-8.8 25.6h-5.4l-12.4-35.9h6.8l8.5 26.4 8.8-26.5zm65.1 35.8h-6.6l-3.6-8.6H279l-3.7 8.6h-6.4l15.7-35.9h5.8l15.7 35.9zM287.4 29l-6.1 14.3h12.3L287.4 29zm35.3 28.4h-6.3V27.5H305v-5.8h29v5.8h-11.3v29.9zm32.5.6c-10.4 0-18.1-8.1-18.1-18.4 0-10.2 7.6-18.5 18.4-18.5 6.6 0 10.5 2.3 14 5.6l-4 4.6c-2.9-2.6-5.9-4.4-10-4.4-6.8 0-11.8 5.6-11.8 12.6s4.9 12.7 11.8 12.7c4.4 0 7.2-1.8 10.2-4.6l4 4.1c-3.7 3.8-7.8 6.3-14.5 6.3zm27.3-15.6v15h-6.3V21.7h6.3v14.8h17V21.7h6.3v35.7h-6.3v-15h-17zm61.1 3.5h-7.1v11.5h-6.3V21.7h14.1c8.3 0 13.5 4.7 13.5 12 .1 8-6.4 12.2-14.2 12.2zm.2-18.5h-7.3v12.8h7.3c4.7 0 7.7-2.6 7.7-6.4 0-4.2-3-6.4-7.7-6.4zm51 30h-6.6l-3.6-8.6h-16.9l-3.7 8.6h-6.4l15.7-35.9h5.8l15.7 35.9zM476.1 29L470 43.2h12.3L476.1 29zm39.6 29c-11.2 0-18.5-7.9-18.5-18.4 0-10 7.6-18.5 18.4-18.5 6.2 0 10 1.7 13.7 4.8l-4 4.7c-2.8-2.3-5.4-3.8-10-3.8-6.6 0-11.6 5.7-11.6 12.6 0 7.4 4.8 12.8 12.1 12.8 3.4 0 6.4-1.1 8.6-2.7v-6.7h-9.1v-5.5h15.2v15C527 55.4 522 58 515.7 58zm49.4-30.7H545v9.3h17.9v5.6H545v9.6h20.4v5.6h-26.7V21.7h26.4v5.6zm21.5 9.4c7.5 1.8 11.5 4.5 11.5 10.5 0 6.7-5.2 10.7-12.7 10.7-5.4 0-10.6-1.9-14.9-5.7l3.8-4.5c3.4 3 6.8 4.6 11.3 4.6 3.9 0 6.3-1.8 6.3-4.5 0-2.6-1.4-4-8-5.5-7.6-1.8-11.9-4.1-11.9-10.7 0-6.2 5.1-10.4 12.2-10.4 5.2 0 9.3 1.6 12.9 4.5l-3.4 4.7c-3.2-2.4-6.4-3.7-9.7-3.7-3.7 0-5.8 1.9-5.8 4.3-.1 2.9 1.6 4.1 8.4 5.7z" id="path14" fill-opacity="1"></path>
            </svg>
            </a>
        </div>

        <!-- REGISTER FORM -->
        <div class="register-container">
            <h3 class="text-center mb-3 fw-bold">CREATE YOUR ACCOUNT</h3>

            <!-- ✅ HIỂN THỊ LỖI EMAIL BẰNG COMPONENT -->
            @if ($errors->has('mail'))
                <x-error-alert :message="'Please provide a valid email address.'" />
            @endif

            <!-- ✅ HIỂN THỊ CÁC LỖI KHÁC (USERNAME, PASSWORD, POLICY, ETC.) -->
            @if ($errors->any() && !$errors->has('mail'))
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register.post') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">First Name *</label>
                    <input type="text" class="form-control" name="TaiKhoan" value="{{ old('TaiKhoan') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email address *</label>
                    <input type="email" class="form-control" name="mail" value="{{ old('mail') }}" required>
                </div>

                <div class="mb-3 position-relative">
                    <label class="form-label">Password *</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" required>
                        <span class="input-group-text" style="cursor:pointer;" id="togglePassword">👁️</span>
                    </div>
                </div>

                <div class="form-check mb-2">
                    <input type="checkbox" class="form-check-input" id="privacy" name="privacy" required>
                    <label class="form-check-label" for="privacy">
                        I've read and accepted the<a href="#" class="text-decoration-none">Privacy Policy</a>.
                    </label>
                </div>

                <div class="form-check mb-4">
                    <input type="checkbox" class="form-check-input" id="newsletter" name="newsletter">
                    <label class="form-check-label" for="newsletter">
                        I'd like to receive the newsletter
                    </label>
                </div>


                <button type="submit" class="btn btn-dark w-100">CREATE ACCOUNT</button>

                <div class="text-center mt-3">
                    <a href="#" class="btn btn-outline-dark w-100">Continue with Google</a>
                </div>

                <p class="text-center mt-3">
                    Already have an account? <a href="{{ route('login') }}" class="text-decoration-none">Sign in</a>
                </p>
            </form>
        </div>
    </div>

    <script>
        // Toggle password visibility
        const togglePassword = document.getElementById("togglePassword");
        const passwordField = document.getElementById("password");
        togglePassword.addEventListener("click", () => {
            const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
            passwordField.setAttribute("type", type);
        });
    </script>
</body>
</html>

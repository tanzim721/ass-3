<?php
require_once('config.php');
session_start();
$return = false;

if (!empty($_SESSION['email'])) {
    header("location:home.php");
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $return = login($email, $password);
    echo "<script type='text/javascript'>alert('{$message_code[$return]}');</script>";
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Razakar</title>
    <link rel="stylesheet" href="style.css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <header class="bg-white">
        
    </header>

    <main class="">
        <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="./index.html" class="-m-1.5 p-1.5">
                    <span class="sr-only">We are Razakar</span>
                    <span class="block font-bold text-lg bg-gradient-to-r from-blue-600 via-green-500 to-indigo-400 inline-block text-transparent bg-clip-text">We are Razakar</span>
                </a>
            </div>
            <div class="flex lg:hidden">
                <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <a href="index.php" class="text-sm font-semibold leading-6 text-gray-900">Back <span aria-hidden="true">&rarr;</span></a>
            </div>
        </nav>
        <!-- Mobile menu, show/hide based on menu open state. -->
        <div class="lg:hidden" role="dialog" aria-modal="true">
            <!-- Background backdrop, show/hide based on slide-over state. -->
            <div class="fixed inset-0 z-10"></div>
            <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                <div class="flex items-center justify-between">
                    <a href="./index.html" class="-m-1.5 p-1.5">
                        <span class="sr-only">We are Razakar</span>
                        <span class="block font-bold text-xl bg-gradient-to-r from-blue-600 via-green-500 to-indigo-400 inline-block text-transparent bg-clip-text">We are Razakar</span>
                    </a>
                    <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="py-6">
                            <a href="index.php" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Back <span aria-hidden="true">&rarr;</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray-50 py-3 sm:py-12">
            <img src="./images/beams.jpg" alt="" class="absolute top-1/2 left-1/2 max-w-none -translate-x-1/2 -translate-y-1/2" width="1308" />
            <div class="absolute inset-0 bg-[url(./images/grid.svg)] bg-center [mask-image:linear-gradient(180deg,white,rgba(255,255,255,0))]"></div>
            <div class="relative bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10">
                <div class="mx-auto max-w-xl">
                    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                        <div class="mx-auto w-full max-w-xl text-center px-24">
                            <h1 class="block text-center font-bold text-2xl bg-gradient-to-r from-blue-600 via-green-500 to-indigo-400 inline-block text-transparent bg-clip-text">Razakar</h1>
                        </div>

                        <div class="mt-10 mx-auto w-full max-w-xl">
                            <form action="" id="register" method="post" class="space-y-6">
                                <div>
                                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900" id="email-label">Email address</label>
                                    <div class="mt-2">
                                        <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div>
                                    <div class="flex items-center justify-between">
                                        <label for="password" id="password-label" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                                        <div class="text-sm">
                                            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="login" id="submit" class="submit-login">
                                        <h2>Login</h2>
                                    </button>
                                </div>
                            </form>
                            <br />
                            <p class="mt-2 text-center text-sm text-gray-500">
                                Not a member?
                                <a href="registration.php" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Register now!</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-white">
        <div class="mx-auto max-w-7xl px-6 py-12 md:flex md:items-center justify-center lg:px-8">
            <p class="text-center text-xs leading-5 text-gray-500">&copy; 2024 Razakar. All rights reserved by Students.</p>
        </div>
    </footer>

</body>
</html>
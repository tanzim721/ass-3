<?php
require("config.php");
session_start();
global $message_code;
$return = false;

if (!empty($_SESSION['email'])) {
  header("location:home.php");
}

if (isset($_POST['submit'])) {
  $feedback = $_POST['feedback'];
  $name = $_POST['name'];
  $return = user_feedback($feedback, $name);

  if ($return != '2') {
      echo "<script type='text/javascript'>alert('{$message_code[$return]}');</script>";
  } else {
      echo "<script type='text/javascript'>;";
      echo "alert('{$message_code[$return]}');";
      echo "window.location.href = 'index.php';</script>";
  }
}


?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Razakar Page</title>
  <link rel="stylesheet" href="style.css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

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
        <button onclick="window.location.href='login.php';" class="text-sm font-semibold leading-6 text-gray-900">Login <span aria-hidden="true">&rarr;</span></button>
    </div>
  </nav>
  <div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray-50 py-6 sm:py-12">
    <img src="./images/beams.jpg" alt="" class="absolute top-1/2 left-1/2 max-w-none -translate-x-1/2 -translate-y-1/2" width="1308" />
    <div class="absolute inset-0 bg-[url(./images/grid.svg)] bg-center [mask-image:linear-gradient(180deg,white,rgba(255,255,255,0))]"></div>
    <div class="relative bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10">
      <div class="mx-auto max-w-xl">
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
          <div class="mx-auto w-full max-w-xl text-center px-10">
            <h1 class="block text-center font-bold text-2xl bg-gradient-to-r from-blue-600 via-green-500 to-indigo-400 inline-block text-transparent bg-clip-text">Welcome! We are Razakar.</h1>
          </div>
          <div class="mt-10 mx-auto w-full max-w-xl">
            <form class="space-y-6" action="#" method="POST">
                <div>
                  <label for="feedback" class="block text-sm font-medium leading-6 text-gray-900">Don't hesitate, just drop us a line!</label>
                  <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                  <div class="mt-2">
                    <input type="text" name="name" id="name" class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                  <label for="feedback" class="block text-sm font-medium leading-6 text-gray-900">Feedback</label>
                  <div class="mt-2">
                    <textarea required name="feedback" id="feedback" cols="30" rows="10" class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                  </div>
                </div>

                <div>
                    <button type="submit" name="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
                </div>
            </form>
            <!-- <button class="link-login" onclick="window.location.href='login.php';">
              <h2>Login</h2>
            </button>
            <br />
            <button class="link-register" onclick="window.location.href='registration.php';">
              <h2>Registration</h2>
            </button> -->
          </div>
        </div>
      </div>
      
    </div>
  </div>
  <footer class="bg-white">
    <div class="mx-auto max-w-7xl px-6 py-12 md:flex md:items-center justify-center lg:px-8">
        <p class="text-center text-xs leading-5 text-gray-500">&copy; 2024 Razakar. All rights reserved by Students.</p>
    </div>
  </footer>
</body>
</html>
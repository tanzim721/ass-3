<?php

require_once('config.php');

session_start();

if (isset($_POST['logout'])) {
    session_destroy();
    header("location: login.php");
}
if(empty($_SESSION['email'])) {
    header("location: login.php");
}
else{
    $email = $_SESSION['email'];
    $return = user_info($email);

    $json_data = file_get_contents('data.json');
    $all_users = json_decode($json_data, true);
}

$json_data = file_get_contents('feedback.json');
$all_feedback = json_decode($json_data, true);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header>
        
    </header>
    
    <main class="">
        <div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray-50 py-6 sm:py-12">
            <img src="./images/beams.jpg" alt="" class="absolute top-1/2 left-1/2 max-w-none -translate-x-1/2 -translate-y-1/2" width="1308" />
            <div class="absolute inset-0 bg-[url(./images/grid.svg)] bg-center [mask-image:linear-gradient(180deg,white,rgba(255,255,255,0))]">
                <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                    <div class="flex lg:flex-1">
                        <a href="" class="-m-1.5 p-1.5">
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
                        <form action="" method="post" id="logout">
                            <div class="form-group">
                                <button type="submit" name="logout" id="submit" class="">
                                    <h2><?php echo $return['username']; ?> <span aria-hidden="true">&rarr;</span></h2>
                                </button>
                            </div>
                        </form>    
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
                            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                            <form action="" method="post" id="logout">
                                <div class="form-group">
                                    <button type="submit" name="logout" id="submit" class="">
                                        <h2><?php echo $return['username']; ?> <span aria-hidden="true">&rarr;</span></h2>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="mt-10 mx-auto w-full max-w-xl">
                    <div class="user_info">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Feedback</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <?php foreach($all_feedback as $feedback): ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?php echo htmlspecialchars($feedback['name']); ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo htmlspecialchars($feedback['feedback']); ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User Name</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php foreach($all_users as $user): ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?php echo htmlspecialchars($user['username']); ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo htmlspecialchars($user['email']); ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table> -->
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title', 'Rwanda Driving License System'); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php echo $__env->yieldContent('styles'); ?>
</head>

<body class="bg-gray-50 flex flex-col min-h-screen">
    <div class="flex-1">
        <!-- Top Navigation Bar -->
        <nav class="bg-white shadow-lg">
            <div class="max-w-full mx-auto px-4">
                <div class="flex justify-between h-16">
                    <!-- Left side - Logo and Navigation -->
                    <div class="flex">
                        <!-- Logo -->
                        <div class="flex items-center">
                            <div class="flex items-center space-x-3">
                                <div class="bg-blue-600 p-2 rounded-lg">
                                    <i class="fas fa-car text-white text-xl"></i>
                                </div>
                                <h1 class="text-xl font-bold text-gray-800">Rwanda Drive License System</h1>
                            </div>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden md:flex md:ml-10 md:space-x-4">
                            <a href="/dashboard"
                                class="flex items-center px-3 py-2 text-gray-700 rounded-md hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">
                                <i class="fas fa-chart-line w-5 text-gray-400"></i>
                                <span class="ml-2 font-medium">Dashboard</span>
                            </a>
                            <a href="/candidate"
                                class="flex items-center px-3 py-2 text-gray-700 rounded-md hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">
                                <i class="fas fa-users w-5 text-gray-400"></i>
                                <span class="ml-2 font-medium">Candidates</span>
                            </a>
                            <a href="/grade"
                                class="flex items-center px-3 py-2 text-gray-700 rounded-md hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">
                                <i class="fas fa-graduation-cap w-5 text-gray-400"></i>
                                <span class="ml-2 font-medium">Grade</span>
                            </a>
                            <a href="/report"
                                class="flex items-center px-3 py-2 text-gray-700 rounded-md hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">
                                <i class="fas fa-file-alt w-5 text-gray-400"></i>
                                <span class="ml-2 font-medium">Report</span>
                            </a>
                        </div>
                    </div>

                    <!-- Right side - User Profile and Logout -->
                    <div class="flex items-center">
                        <!-- User Profile Dropdown -->
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center space-x-3 focus:outline-none">
                                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                                    <i class="fas fa-user text-blue-600 text-sm"></i>
                                </div>
                                <div class="hidden md:block text-left">
                                    <p class="text-sm font-medium text-gray-900">
                                        <?php echo e(auth()->user()->adminName ?? 'Admin'); ?>

                                    </p>
                                    <p class="text-xs text-gray-500">Administrator</p>
                                </div>
                                <i class="fas fa-chevron-down text-gray-400 text-xs"></i>
                            </button>

                            <!-- Dropdown Menu -->
                            <div x-show="open" @click.away="open = false"
                                class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                                <div class="px-4 py-2 border-b">
                                    <p class="text-sm font-medium text-gray-900">
                                        <?php echo e(App\Models\register::where('id',Session::get('loginid'))->first()->adminName); ?>

                                    </p>
                                    <p class="text-xs text-gray-500">Administrator</p>
                                </div>
                                <div class="border-t border-gray-100"></div>
                                <a href="<?php echo e(route('logout')); ?>"
                                    class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                    <i class="fas fa-sign-out-alt w-5"></i>
                                    <span class="ml-2">Log Out</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="p-8">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center space-x-2">
                    <div class="bg-blue-600 p-1 rounded">
                        <i class="fas fa-car text-white text-sm"></i>
                    </div>
                    <span class="text-sm text-gray-600">Rwanda Driving License System</span>
                </div>
                <div class="mt-4 md:mt-0">
                    <p class="text-sm text-gray-500">
                        &copy; <?php echo e(date('Y')); ?> Rwanda Driving License. All rights reserved.
                    </p>
                </div>
                <div class="mt-4 md:mt-0 flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Alpine.js for dropdown functionality -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\Rwanda_Driving_License-main\resources\views/layouts/app.blade.php ENDPATH**/ ?>
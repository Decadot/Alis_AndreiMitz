<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Student Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'midnight': '#1b1533',
                        'royal-violet': '#3f2c78',
                        'soft-lavender': '#b18db2',
                        'sky-blue': '#6da6d9',
                        'midnight-light': '#2a2047',
                        'violet-light': '#5a3f9e'
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background: linear-gradient(135deg, #1b1533 0%, #3f2c78 50%, #2a2047 100%);
            min-height: 100vh;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }
        
        .card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(109, 166, 217, 0.2);
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #6da6d9 0%, #b18db2 100%);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #6da6d9, #b18db2);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #5a95c8, #a07ca1);
            transition: left 0.3s ease;
        }
        
        .btn-primary:hover::before {
            left: 0;
        }
        
        .btn-primary span {
            position: relative;
            z-index: 1;
        }
        
        .input-field {
            background: #f8f9fa;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
        }
        
        .input-field:focus {
            background: #ffffff;
            border-color: #6da6d9;
            box-shadow: 0 0 0 4px rgba(109, 166, 217, 0.1);
        }
        
        .field {
            position: relative;
        }
        
        .float-label {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            pointer-events: none;
            transition: all 0.2s ease;
            background: transparent;
            padding: 0 6px;
            font-size: 15px;
        }
        
        .input-field:focus + .float-label,
        .input-field:not(:placeholder-shown) + .float-label {
            top: -10px;
            left: 12px;
            font-size: 12px;
            color: #6da6d9;
            background: white;
            font-weight: 500;
        }
        
        .decorative-circle {
            position: absolute;
            border-radius: 50%;
            opacity: 0.1;
        }
        
        .circle-1 {
            width: 300px;
            height: 300px;
            background: #6da6d9;
            top: -150px;
            right: -100px;
        }
        
        .circle-2 {
            width: 200px;
            height: 200px;
            background: #b18db2;
            bottom: -100px;
            left: -50px;
        }
    </style>
</head>
<body>
    <div class="min-h-screen flex items-center justify-center px-4 py-8 relative overflow-hidden">
        <div class="decorative-circle circle-1"></div>
        <div class="decorative-circle circle-2"></div>
        
        <div class="max-w-2xl w-full relative z-10">
            <div class="text-center mb-8">
                <div class="inline-block gradient-bg text-white px-6 py-2 rounded-full text-sm font-semibold mb-4 shadow-lg">
                    Join Us Today
                </div>
                <h1 class="text-4xl font-bold text-white mb-2">Create Your Account</h1>
                <p class="text-soft-lavender text-lg">Get started with Student Management</p>
            </div>

            <div class="card rounded-3xl p-8 shadow-2xl">
                <?php if (isset($_SESSION['success'])): ?>
                    <div class="mb-6 bg-green-50 border-l-4 border-green-500 text-green-800 px-4 py-3 rounded-lg relative">
                        <span class="block sm:inline"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" onclick="this.parentElement.remove()">
                            <svg class="fill-current h-5 w-5 text-green-600" viewBox="0 0 20 20">
                                <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15z"/>
                            </svg>
                        </span>
                    </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['error'])): ?>
                    <div class="mb-6 bg-red-50 border-l-4 border-red-500 text-red-800 px-4 py-3 rounded-lg relative">
                        <span class="block sm:inline"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" onclick="this.parentElement.remove()">
                            <svg class="fill-current h-5 w-5 text-red-600" viewBox="0 0 20 20">
                                <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15z"/>
                            </svg>
                        </span>
                    </div>
                <?php endif; ?>

                <form method="POST" action="">
                    <div class="space-y-5">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="field">
                                <input type="text" id="first_name" name="first_name" placeholder="First Name" 
                                       class="input-field w-full px-4 py-3.5 rounded-xl text-gray-800 placeholder-transparent focus:outline-none" required>
                                <label class="float-label" for="first_name">First Name</label>
                            </div>
                            <div class="field">
                                <input type="text" id="last_name" name="last_name" placeholder="Last Name" 
                                       class="input-field w-full px-4 py-3.5 rounded-xl text-gray-800 placeholder-transparent focus:outline-none" required>
                                <label class="float-label" for="last_name">Last Name</label>
                            </div>
                        </div>

                        <div class="field">
                            <input type="email" id="email" name="email" placeholder="Email" 
                                   class="input-field w-full px-4 py-3.5 rounded-xl text-gray-800 placeholder-transparent focus:outline-none" required>
                            <label class="float-label" for="email">Email Address</label>
                        </div>

                        <div class="field">
                            <input type="text" id="username" name="username" placeholder="Username" 
                                   class="input-field w-full px-4 py-3.5 rounded-xl text-gray-800 placeholder-transparent focus:outline-none" required>
                            <label class="float-label" for="username">Username</label>
                        </div>

                        <div class="field">
                            <input type="password" id="password" name="password" placeholder="Password" 
                                   class="input-field w-full pl-4 pr-12 py-3.5 rounded-xl text-gray-800 placeholder-transparent focus:outline-none" required>
                            <label class="float-label" for="password">Password</label>
                            <button type="button" aria-label="Toggle password visibility" onclick="togglePwd('password','eye1')" 
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <svg id="eye1" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>

                        <div class="field">
                            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" 
                                   class="input-field w-full pl-4 pr-12 py-3.5 rounded-xl text-gray-800 placeholder-transparent focus:outline-none" required>
                            <label class="float-label" for="confirm_password">Confirm Password</label>
                            <button type="button" aria-label="Toggle password visibility" onclick="togglePwd('confirm_password','eye2')" 
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <svg id="eye2" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>

                        <button type="submit" class="btn-primary w-full px-6 py-4 rounded-xl font-semibold text-white shadow-lg hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-sky-blue/30">
                            <span class="flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                </svg>
                                Create Account
                            </span>
                        </button>
                    </div>
                </form>

                <div class="mt-8 text-center">
                    <p class="text-gray-600">
                        Already have an account? 
                        <a href="<?php echo site_url('auth/login'); ?>" class="text-sky-blue hover:text-royal-violet font-semibold transition-colors">
                            Sign in here
                        </a>
                    </p>
                </div>
            </div>
            
            <div class="text-center mt-6">
                <p class="text-soft-lavender text-sm">
                    © 2025 Student Management System. All rights reserved.
                </p>
            </div>
        </div>
    </div>
    
    <script>
        function togglePwd(inputId, eyeId){
            const input = document.getElementById(inputId);
            const eye = document.getElementById(eyeId);
            const showing = input.type === 'text';
            input.type = showing ? 'password' : 'text';
            eye.innerHTML = showing
              ? '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>'
              : '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a10.05 10.05 0 012.121-3.284M6.2 6.2A9.956 9.956 0 0112 5c4.477 0 8.268 2.943 9.542 7a10.08 10.08 0 01-4.043 5.197M15 12a3 3 0 00-4.243-2.829"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18"/>';
        }
    </script>
</body>
</html>

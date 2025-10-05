<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : 'Dashboard - Student Management System'; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
            background: linear-gradient(135deg, #f5f7fa 0%, #e8ebf0 100%);
            min-height: 100vh;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }
        
        .card {
            background: white;
            border: 1px solid #e5e7eb;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .card:hover {
            border-color: #6da6d9;
            box-shadow: 0 10px 30px rgba(109, 166, 217, 0.15);
            transform: translateY(-2px);
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #6da6d9 0%, #b18db2 100%);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #6da6d9, #b18db2);
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(109, 166, 217, 0.3);
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #5a95c8, #a07ca1);
            box-shadow: 0 6px 20px rgba(109, 166, 217, 0.4);
            transform: translateY(-2px);
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, #9ca3af, #6b7280);
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            background: linear-gradient(135deg, #6b7280, #4b5563);
            transform: translateY(-1px);
        }
        
        .input-field {
            background: #f9fafb;
            border: 2px solid #e5e7eb;
            transition: all 0.3s ease;
        }
        
        .input-field:focus {
            background: white;
            border-color: #6da6d9;
            box-shadow: 0 0 0 4px rgba(109, 166, 217, 0.1);
        }
        
        .header-card {
            background: linear-gradient(135deg, #1b1533 0%, #3f2c78 100%);
            border: none;
        }
        
        .user-dropdown {
            z-index: 9999 !important;
            position: relative;
        }
        
        .user-dropdown .dropdown-menu {
            z-index: 10000 !important;
            position: absolute;
            background: white;
            border: 1px solid #e5e7eb;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userMenuButton = document.getElementById('user-menu-button');
            const userMenu = document.getElementById('user-menu');

            if(userMenuButton && userMenu) {
                userMenuButton.addEventListener('click', function() {
                    userMenu.classList.toggle('hidden');
                });

                document.addEventListener('click', function(event) {
                    if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
                        userMenu.classList.add('hidden');
                    }
                });
            }
        });
    </script>
</head>
<body class="text-gray-800">
    <div class="max-w-7xl mx-auto px-6 py-8">
        <div class="card header-card rounded-3xl p-8 mb-8 shadow-2xl" style="overflow: visible; position: relative; z-index: 10;">
            <div class="flex justify-between items-center flex-wrap gap-4" style="overflow: visible;">
                <div>
                    <h1 class="text-4xl font-bold mb-2 text-white">
                        Student Management
                    </h1>
                    <p class="text-soft-lavender text-lg">Dashboard & Control Panel</p>
                </div>
                
                <div class="relative inline-block text-left z-50 user-dropdown">
                    <div>
                        <button type="button" class="flex items-center space-x-3 px-4 py-2 rounded-xl bg-white/10 hover:bg-white/20 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-white/30" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <div class="w-10 h-10 rounded-full overflow-hidden bg-gradient-to-br from-sky-blue to-soft-lavender flex items-center justify-center ring-2 ring-white/30">
                                <?php if (isset($_SESSION['profile_image']) && $_SESSION['profile_image']): ?>
                                    <img src="<?php echo base_url() . '/public/' . $_SESSION['profile_image']; ?>" 
                                         alt="Profile Picture" 
                                         class="w-full h-full object-cover">
                                <?php else: ?>
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                    </svg>
                                <?php endif; ?>
                            </div>
                            <div class="text-left">
                                <div class="text-white font-semibold"><?php echo htmlspecialchars($_SESSION['first_name'] . ' ' . $_SESSION['last_name']); ?></div>
                                <div class="text-soft-lavender text-sm"><?php echo ucfirst($_SESSION['role']); ?></div>
                            </div>
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                    </div>

                    <div class="origin-top-right absolute right-0 mt-3 w-56 rounded-2xl shadow-xl py-2 bg-white ring-1 ring-gray-200 focus:outline-none hidden z-50 dropdown-menu" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1" id="user-menu">
                        <a href="<?php echo site_url('dashboard'); ?>" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors" role="menuitem">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3 text-sky-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/>
                                </svg>
                                <span class="font-medium">Dashboard</span>
                            </div>
                        </a>
                        <a href="<?php echo site_url('dashboard/update_profile'); ?>" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors" role="menuitem">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3 text-soft-lavender" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                <span class="font-medium">Edit Profile</span>
                            </div>
                        </a>
                        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                        <a href="<?php echo site_url('students'); ?>" class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors" role="menuitem">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3 text-royal-violet" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m8-4a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                                <span class="font-medium">Manage Students</span>
                            </div>
                        </a>
                        <?php endif; ?>
                        <div class="border-t border-gray-200 my-2"></div>
                        <a href="<?php echo site_url('auth/logout'); ?>" class="block px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition-colors rounded-b-2xl" role="menuitem">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                                <span class="font-semibold">Logout</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card rounded-3xl p-8 shadow-lg">
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

            <?php echo $content ?? ''; ?>
        </div>
    </div>
</body>
</html>
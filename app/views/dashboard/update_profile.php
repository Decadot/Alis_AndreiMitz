<?php
$title = 'Update Profile';
$content = '
<div class="mb-8">
    <div class="gradient-bg rounded-2xl p-8 text-center shadow-xl">
        <h3 class="text-4xl font-bold text-white mb-2">Update Profile</h3>
        <p class="text-white/90 text-lg font-medium">Manage your account information</p>
    </div>
</div>

<div class="max-w-2xl mx-auto">
    <div class="card rounded-2xl p-8 shadow-lg">
        <form method="POST" action="">
            <div class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="first_name" class="block text-sm font-semibold text-gray-700 mb-2">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            First Name
                        </label>
                        <input type="text" 
                               id="first_name" 
                               name="first_name" 
                               value="' . htmlspecialchars($student['first_name']) . '" 
                               class="input-field w-full px-4 py-3 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none" 
                               required>
                    </div>
                    <div>
                        <label for="last_name" class="block text-sm font-semibold text-gray-700 mb-2">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Last Name
                        </label>
                        <input type="text" 
                               id="last_name" 
                               name="last_name" 
                               value="' . htmlspecialchars($student['last_name']) . '" 
                               class="input-field w-full px-4 py-3 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none" 
                               required>
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Email Address
                    </label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           value="' . htmlspecialchars($student['email']) . '" 
                           class="input-field w-full px-4 py-3 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none" 
                           required>
                </div>

                <div>
                    <label for="username" class="block text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Username
                    </label>
                    <input type="text" 
                           id="username" 
                           name="username" 
                           value="' . htmlspecialchars($auth['username']) . '" 
                           class="input-field w-full px-4 py-3 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none" 
                           required>
                </div>

                <div class="border-t border-gray-200 pt-6">
                    <h4 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-sky-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                        Change Password (Optional)
                    </h4>
                    
                    <div class="space-y-4">
                        <div>
                            <label for="current_password" class="block text-sm font-semibold text-gray-700 mb-2">
                                Current Password
                            </label>
                            <input type="password" 
                                   id="current_password" 
                                   name="current_password" 
                                   class="input-field w-full px-4 py-3 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none" 
                                   placeholder="Enter current password">
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="new_password" class="block text-sm font-semibold text-gray-700 mb-2">
                                    New Password
                                </label>
                                <input type="password" 
                                       id="new_password" 
                                       name="new_password" 
                                       class="input-field w-full px-4 py-3 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none" 
                                       placeholder="Enter new password">
                            </div>
                            <div>
                                <label for="confirm_password" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Confirm New Password
                                </label>
                                <input type="password" 
                                       id="confirm_password" 
                                       name="confirm_password" 
                                       class="input-field w-full px-4 py-3 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none" 
                                       placeholder="Confirm new password">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-4 pt-6">
                    <a href="' . site_url('dashboard') . '" class="btn-secondary px-6 py-3 rounded-xl font-medium text-white inline-flex items-center space-x-2 shadow-md">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        <span>Cancel</span>
                    </a>
                    <button type="submit" 
                            class="btn-primary px-6 py-3 rounded-xl font-medium text-white focus:outline-none focus:ring-2 focus:ring-sky-blue/50 shadow-lg">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Update Profile
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>';

include 'layout.php';
?>
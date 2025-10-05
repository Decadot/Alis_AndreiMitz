<?php
$title = 'Dashboard';
$content = '
<div class="mb-8">
    <div class="gradient-bg rounded-2xl p-8 text-center shadow-xl">
        <h3 class="text-4xl font-bold text-white mb-2">Welcome Back!</h3>
        <p class="text-white/90 text-lg font-medium">' . htmlspecialchars($student['first_name'] . ' ' . $student['last_name']) . '</p>
    </div>
</div>

<!-- Removed Profile Status, Account Type and Member Since cards as requested -->

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <div class="card rounded-2xl p-6 shadow-md">
        <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
            <svg class="w-6 h-6 mr-2 text-sky-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            Profile Information
        </h3>
        
        <div class="space-y-4">
            <div class="flex justify-between items-center py-3 border-b border-gray-200">
                <span class="text-gray-600 font-medium">Full Name:</span>
                <span class="text-gray-800 font-semibold">' . htmlspecialchars($student['first_name'] . ' ' . $student['last_name']) . '</span>
            </div>
            <div class="flex justify-between items-center py-3 border-b border-gray-200">
                <span class="text-gray-600 font-medium">Email:</span>
                <span class="text-gray-800 font-semibold">' . htmlspecialchars($student['email']) . '</span>
            </div>
            <div class="flex justify-between items-center py-3 border-b border-gray-200">
                <span class="text-gray-600 font-medium">Username:</span>
                <span class="text-gray-800 font-semibold">' . htmlspecialchars($auth['username']) . '</span>
            </div>
            <div class="flex justify-between items-center py-3 border-b border-gray-200">
                <span class="text-gray-600 font-medium">Role:</span>
                <span class="inline-flex items-center px-3 py-1 rounded-full bg-gradient-to-r from-sky-blue/20 to-soft-lavender/20 text-royal-violet text-sm font-bold">' . ucfirst($auth['role']) . '</span>
            </div>
        </div>

        <div class="mt-6">
            <a href="' . site_url('dashboard/update_profile') . '" class="btn-primary px-6 py-3 rounded-xl font-medium text-white inline-flex items-center space-x-2 w-full justify-center shadow-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                <span>Edit Profile</span>
            </a>
        </div>
    </div>

    <div class="card rounded-2xl p-6 shadow-md">
        <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
            <svg class="w-6 h-6 mr-2 text-soft-lavender" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            Profile Picture
        </h3>
        
        <div class="text-center">
            <div class="w-32 h-32 mx-auto mb-4 rounded-full overflow-hidden bg-gradient-to-br from-sky-blue to-soft-lavender flex items-center justify-center shadow-xl ring-4 ring-sky-blue/20">
                ' . (($auth['profile_image'] || (isset($_SESSION['profile_image']) && $_SESSION['profile_image'])) ? 
                    '<img src="' . base_url() . '/public/' . ($auth['profile_image'] ?: $_SESSION['profile_image']) . '" alt="Profile Picture" class="w-full h-full object-cover">' : 
                    '<svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>'
                ) . '
            </div>
            
            <form method="POST" action="' . site_url('dashboard/upload_profile_image') . '" enctype="multipart/form-data" class="mt-4">
                <div class="flex items-center justify-center">
                    <input type="file" 
                           name="profile_image" 
                           accept="image/jpeg,image/jpg,image/png,image/gif" 
                           class="hidden" 
                           id="profile_image_input" 
                           onchange="this.form.submit()">
                    <label for="profile_image_input" 
                           class="btn-primary px-6 py-3 rounded-xl font-medium text-white cursor-pointer inline-flex items-center space-x-2 shadow-lg w-full justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span>Upload Photo</span>
                    </label>
                </div>
            </form>
        </div>
    </div>
</div>';

include 'layout.php';
?>
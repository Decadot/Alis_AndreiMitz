<?php
$title = 'Edit Student';
$content = '
<div class="mb-6">
    <a href="' . site_url('students') . '" class="btn-secondary px-5 py-2.5 rounded-xl font-medium text-white inline-flex items-center space-x-2 shadow-md">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        <span>Back to Students</span>
    </a>
</div>

<div class="mb-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-2">Edit Student</h2>
    <p class="text-gray-600">Update student information in the system</p>
</div>

<form action="' . site_url('students/update/' . $student['id']) . '" method="POST" class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="first_name" class="block text-sm font-semibold text-gray-700 mb-2">First Name</label>
            <input type="text" id="first_name" name="first_name" 
                   class="input-field w-full px-4 py-3 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none" 
                   value="' . htmlspecialchars($student['first_name']) . '" 
                   placeholder="Enter first name" required>
        </div>

        <div>
            <label for="last_name" class="block text-sm font-semibold text-gray-700 mb-2">Last Name</label>
            <input type="text" id="last_name" name="last_name" 
                   class="input-field w-full px-4 py-3 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none" 
                   value="' . htmlspecialchars($student['last_name']) . '" 
                   placeholder="Enter last name" required>
        </div>
    </div>

    <div>
        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
        <input type="email" id="email" name="email" 
               class="input-field w-full px-4 py-3 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none" 
               value="' . htmlspecialchars($student['email']) . '" 
               placeholder="Enter email address" required>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="username" class="block text-sm font-semibold text-gray-700 mb-2">Username</label>
            <input type="text" id="username" name="username" 
                   class="input-field w-full px-4 py-3 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none" 
                   value="' . (isset($student['username']) ? htmlspecialchars($student['username']) : '') . '" 
                   placeholder="Enter username" required>
        </div>

        <div>
            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
            <input type="password" id="password" name="password" 
                   class="input-field w-full px-4 py-3 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none" 
                   placeholder="Enter new password (leave blank to keep current)">
        </div>
    </div>

    <div>
        <label for="role" class="block text-sm font-semibold text-gray-700 mb-2">Role</label>
        <select id="role" name="role" 
                class="input-field w-full px-4 py-3 rounded-xl text-gray-800 focus:outline-none" required>
            <option value="">Select Role</option>
            <option value="student"' . (isset($student['role']) && $student['role'] === 'student' ? ' selected' : '') . '>Student</option>
            <option value="admin"' . (isset($student['role']) && $student['role'] === 'admin' ? ' selected' : '') . '>Admin</option>
        </select>
    </div>

    <div class="bg-gradient-to-r from-sky-blue/10 to-soft-lavender/10 border border-sky-blue/30 rounded-2xl p-5">
        <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center">
            <svg class="w-5 h-5 mr-2 text-sky-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            Student Information
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
            <div class="flex items-center">
                <span class="text-gray-600 font-medium">Student ID:</span>
                <span class="text-sky-blue font-mono font-bold ml-2">#' . htmlspecialchars($student['id']) . '</span>
            </div>
            <div class="flex items-center">
                <span class="text-gray-600 font-medium">Status:</span>
                <span class="inline-flex items-center px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold ml-2">
                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Active
                </span>
            </div>
        </div>
    </div>

    <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
        <a href="' . site_url('students') . '" class="btn-secondary px-6 py-3 rounded-xl font-medium text-white inline-flex items-center space-x-2 shadow-md">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
            <span>Cancel</span>
        </a>
        <button type="submit" class="btn-primary px-6 py-3 rounded-xl font-medium text-white inline-flex items-center space-x-2 shadow-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            <span>Update Student</span>
        </button>
    </div>
</form>';

include 'layout.php';
?>
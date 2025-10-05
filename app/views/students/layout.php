<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : 'Student Management System'; ?></title>
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
        
        .table-header {
            background: linear-gradient(135deg, #6da6d9, #b18db2);
        }
        
        .table-row {
            background: white;
            border-bottom: 1px solid #e5e7eb;
            transition: all 0.2s ease;
        }
        
        .table-row:hover {
            background: #f9fafb;
            border-color: #6da6d9;
        }
        
        .header-card {
            background: linear-gradient(135deg, #1b1533 0%, #3f2c78 100%);
            border: none;
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
        }
        
        .pagination ul {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 0.5rem;
        }
        
        .pagination li {
            display: inline-block;
        }
        
        .pagination a,
        .pagination span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem 1rem;
            margin: 0;
            background: white;
            border: 2px solid #e5e7eb;
            color: #374151;
            text-decoration: none;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
            font-weight: 500;
            min-width: 2.5rem;
        }
        
        .pagination a:hover {
            background: linear-gradient(135deg, #6da6d9, #b18db2);
            border-color: #6da6d9;
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(109, 166, 217, 0.3);
        }
        
        .pagination .current {
            background: linear-gradient(135deg, #6da6d9, #b18db2);
            border-color: #6da6d9;
            color: white;
            font-weight: 600;
        }
        
        .pagination .disabled {
            background: #f3f4f6;
            border-color: #e5e7eb;
            color: #9ca3af;
            cursor: not-allowed;
        }
        
        .pagination .disabled:hover {
            background: #f3f4f6;
            border-color: #e5e7eb;
            transform: none;
            box-shadow: none;
        }
    </style>
</head>
<body class="text-gray-800">
    <div class="max-w-7xl mx-auto px-6 py-8">
        <div class="card header-card rounded-3xl p-8 mb-8 shadow-2xl">
            <h1 class="text-4xl font-bold text-center text-white">
                Student Management System
            </h1>
            <p class="text-center text-soft-lavender text-lg mt-2">Comprehensive Student Data Management</p>
        </div>

        <div class="mb-6">
            <a href="<?php echo site_url('dashboard'); ?>" class="btn-secondary px-6 py-3 rounded-xl font-medium inline-flex items-center space-x-2 text-white shadow-md hover:shadow-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                <span>Back to Dashboard</span>
            </a>
        </div>

        <div class="card rounded-2xl p-6 mb-8 shadow-md">
            <div class="flex justify-center space-x-3 flex-wrap gap-y-3">
                <a href="<?php echo site_url('students'); ?>" class="btn-primary px-6 py-3 rounded-xl font-medium inline-flex items-center space-x-2 text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span>All Students</span>
                </a>
                <a href="<?php echo site_url('students/create'); ?>" class="btn-primary px-6 py-3 rounded-xl font-medium inline-flex items-center space-x-2 text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                    <span>Add New Student</span>
                </a>
                <a href="<?php echo site_url('students/deleted'); ?>" class="btn-secondary px-6 py-3 rounded-xl font-medium inline-flex items-center space-x-2 text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    <span>Soft Deleted</span>
                </a>
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
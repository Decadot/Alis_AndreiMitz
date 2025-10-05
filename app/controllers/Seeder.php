<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Seeder extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->call->model('StudentModel');
        $this->call->model('AuthModel');
    }

    // Run once: /seeder/run/{token}
    public function run($token = '')
    {
        $expected = getenv('SEED_TOKEN') ?: 'disable-seed';
        if (!$expected || $expected === 'disable-seed' || $token !== $expected) {
            echo 'Unauthorized';
            return;
        }

        try {
            $this->db->transaction();

            // Create sample student (admin)
            $adminStudentId = $this->StudentModel->create_student([
                'first_name' => 'System',
                'last_name' => 'Administrator',
                'email' => 'admin@example.com',
            ]);

            // Create auth for admin
            $this->AuthModel->create_auth([
                'student_id' => $adminStudentId,
                'username' => 'admin',
                'password' => $this->AuthModel->hash_password('Admin@12345'),
                'role' => 'admin',
            ]);

            // Create sample student (member)
            $userStudentId = $this->StudentModel->create_student([
                'first_name' => 'Demo',
                'last_name' => 'Student',
                'email' => 'student@example.com',
            ]);

            // Create auth for student
            $this->AuthModel->create_auth([
                'student_id' => $userStudentId,
                'username' => 'student',
                'password' => $this->AuthModel->hash_password('Student@12345'),
                'role' => 'student',
            ]);

            $this->db->commit();
            echo 'Seed complete: admin/admin and student/student created with emails admin@example.com, student@example.com';
        } catch (Exception $e) {
            $this->db->roll_back();
            echo 'Seed failed: ' . $e->getMessage();
        }
    }
}
?>



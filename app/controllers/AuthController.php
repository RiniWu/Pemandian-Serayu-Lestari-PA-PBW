<?php

class AuthController extends Controller
{
    private function appUrl($path = '')
    {
        $basePath = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');
        $path = ltrim($path, '/');

        return $path === '' ? $basePath : $basePath . '/' . $path;
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $admin = $this->model('Admin')->login($username, $password);

            if ($admin) {
                $_SESSION['login'] = true;
                $_SESSION['admin_id'] = $admin['id'] ?? null;
                $_SESSION['admin_nama'] = $admin['nama'] ?? ($admin['username'] ?? 'Admin');

                header("Location: " . $this->appUrl('admin'));
                exit;
            }

            $data['error'] = "Username atau password salah!";
            $this->view('auth/login', $data);
            return;
        }

        $this->view('auth/login');
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION = [];
        session_destroy();

        header("Location: " . $this->appUrl('auth/login'));
        exit;
    }
}

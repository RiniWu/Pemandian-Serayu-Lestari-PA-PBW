<?php

class AuthController extends Controller
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // ambil input
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            // panggil model (pakai username)
            $admin = $this->model('Admin')->login($username, $password);

            if ($admin) {
                $_SESSION['login'] = true;

                // redirect ke dashboard admin
                header("Location: /admin");
                exit;
            } else {
                $data['error'] = "Username atau password salah!";
                $this->view('auth/login', $data);
                return;
            }
        }

        $this->view('auth/login');
    }

    public function logout()
    {
        session_destroy();

        // ❗ jangan ke /logout (loop)
        header("Location: /auth/login");
        exit;
    }
}

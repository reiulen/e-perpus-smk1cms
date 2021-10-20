<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class KhususTamu implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(session()->get('log') !='TRUE'){
            session()->setFlashdata('warning', 'warning');
            session()->setFlashdata('title', 'Anda Belum Login');
            session()->setFlashdata('color', 'red');
            session()->setFlashdata('icon', 'warning');
            return redirect()->to('login-admin');
        }

        if(session()->get('level') == 'user'){
            return redirect()->to('/');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
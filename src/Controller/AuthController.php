<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\HttpFoundation\Cookie;

class AuthController extends AbstractController
{
    #[Route('/api/login_check', name: 'app_login')]
    public function login(Request $request, JWTTokenManagerInterface $jwtManager): Response
    {

        $user = $this->getUser();
        $token = $jwtManager->create($user);


        $response = new Response();
        $response->headers->setCookie(new Cookie('token', $token, time() + 3600, '/', '', false, true));


        return $response;
    }
}

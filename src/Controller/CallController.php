<?php

namespace App\Controller;

use App\Service\CallService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CallController extends AbstractController
{
    private CallService $callService;

    public function __construct(CallService $callService)
    {
        $this->callService = $callService;
    }

    #[Route('/callAll', name: 'call_all')]
    public function callAllFriendsAction(Request $request): Response
    {
        $this->callService->callToAllFriends();
        return new Response();
    }

    #[Route('/callAvailable', name: 'call_available')]
    public function callAvailableFriendsAction(Request $request): Response
    {
        $this->callService->callToAvailableFriends();
        return new Response();
    }

    #[Route('/call/{id}', name: 'call_friend')]
    public function callFriendAction(int $id): Response
    {
        $this->callService->callToFriend($id);
        return new Response();
    }
}
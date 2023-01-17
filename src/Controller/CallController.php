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

//    #[Route('/call', name: 'call_all')]
    public function callFriendAction(Request $request): Response
    {
        if (!$friendId = $request->get('friendId')) {
            throw new BadRequestException();
        }
        $this->callService->callToFriend($friendId);
        return new Response();
    }
}
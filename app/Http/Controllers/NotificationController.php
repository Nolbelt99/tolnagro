<?php

namespace App\Http\Controllers;

use App\Interfaces\NotificationRepositoryInterface;

class NotificationController extends Controller
{
    private NotificationRepositoryInterface $notificationRepository;

    public function __construct(NotificationRepositoryInterface $notificationRepository) 
    {
        $this->notificationRepository = $notificationRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $notifications = $this->notificationRepository->getPaginatedNotifications(5);
        $sum = $this->notificationRepository->getNotificationSum();

        return view('notifications.list', compact('notifications', 'sum'));
    }
}

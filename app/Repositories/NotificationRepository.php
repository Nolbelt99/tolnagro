<?php

namespace App\Repositories;

use App\Models\Notification;
use App\Interfaces\NotificationRepositoryInterface;

/**
 * Class NotificationRepository
 *
 * @package App\Repositories
 */
class NotificationRepository implements NotificationRepositoryInterface 
{
    /**
     * Get paginated notifications.
     *
     * @param int $perPage Number of items per page.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginatedNotifications($perPage)
    {
        return Notification::paginate($perPage);
    }

    /**
     * Create a new notification.
     *
     * @param array $notificationDetails Notification details.
     *
     * @return Notification
     */
    public function createNotification(array $notificationDetails) 
    {
        return Notification::create($notificationDetails);
    }

    /**
     * Get the total count of notifications.
     *
     * @return int
     */
    public function getNotificationSum() 
    {
        return Notification::all()->count();
    }
}
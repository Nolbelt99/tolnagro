<?php

namespace App\Interfaces;

/**
 * Interface NotificationRepositoryInterface
 *
 * This interface defines the contract for a notification repository.
 */
interface NotificationRepositoryInterface 
{
    /**
     * Get paginated notifications.
     *
     * @param int $perPage Number of items per page.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginatedNotifications($perPage);

    /**
     * Create a new notification.
     *
     * @param array $notificationDetails Notification details.
     *
     * @return Notification
     */
    public function createNotification(array $notificationDetails);

    /**
     * Get the total count of notifications.
     *
     * @return int
     */
    public function getNotificationSum();
}
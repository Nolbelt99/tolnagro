<?php

namespace App\Console\Commands;

use Exception;
use App\Mail\DemoMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Interfaces\NotificationRepositoryInterface;
use Faker\Factory as Faker;

class SendNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:notifications';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notifications via email';

    /**
     * The NotificationRepositoryInterface implementation.
     *
     * @var NotificationRepositoryInterface
     */
    private NotificationRepositoryInterface $notificationRepository;

    /**
     * Create a new command instance.
     *
     * @param NotificationRepositoryInterface $notificationRepository
     */
    public function __construct(NotificationRepositoryInterface $notificationRepository) 
    {
        parent::__construct();

        $this->notificationRepository = $notificationRepository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $faker = Faker::create();

        try {
            for ($i = 0; $i < 3; $i++) {

                $data = [
                    'email' => $faker->safeEmail,
                    'count' => $this->notificationRepository->getNotificationSum()
                ];
                
                //uncomment to send emails
                //Mail::to($data['email'])->send(new DemoMail($data));

                $notification = $this->notificationRepository->createNotification($data);
            }

            return Command::SUCCESS;
        } catch (Exception $e) {
            Log::debug($e);
            return false;
        }
    }
}

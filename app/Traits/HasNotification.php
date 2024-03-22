<?php

namespace App\Traits;
use App\Models\User;
use App\Models\Admin;
use App\Models\PrintJob;
use App\Models\Subscriber;
use App\Notifications\NewJobNotification;
use App\Notifications\NewUserNotification;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewSubscriptionNotification;

trait HasNotification {
    public function notifyAdmins(PrintJob $print_job)
    {
        $admins = Admin::all();

        Notification::send($admins, new NewJobNotification($print_job));

        return 'Notification send';
    }

    public function notifyAdmins2(Subscriber $subscriber)
    {
        $admins = Admin::all();

        Notification::send($admins, new NewSubscriptionNotification($subscriber));

        return 'Notification send';
    }

    public function notifyAdmins3(User $user)
    {
        $admins = Admin::all();

        Notification::send($admins, new NewUserNotification($user));

        return 'Notification send';
    }

    public function unreadNotificationsCount()
    {
       $user = auth()->user();

       return count($user->unreadNotifications);
    }

    public function readNotificationsCount()
    {
        $user = auth()->user();

        return count($user->readNotifications);
    }

    public function notificationsCount()
    {
        $user = auth()->user();

        return count($user->notifications);
    }

    public static function getNotifications($type="all")
    {
        $user = auth()->user();

        $unread = $user->unreadNotifications;
 
        if($type === 'job'){
             return count($unread->where('type', 'App\Notifications\NewJobNotification'));
        }else if($type === 'user'){
             return count($unread->where('type', 'App\Notifications\NewUserNotification'));
        }
     
        return count($unread);
    }

    public function findNotification($id)
    {
        return auth()->user()->notifications->filter(function (
            $value,
            $key
        ) use($id){

            return $value['data']['route_param'] === $id;
            
        })->values()->all();

    }

    public function checkIfRead($id)
    {
        $notification = $this->findNotification($id);

        return count($notification) ? $notification[0]->read_at : true;
    }

    public function getNotificationId($id)
    {
        $notification = $this->findNotification($id);

        return count($notification) ? $notification[0]->id : null;
    }
}
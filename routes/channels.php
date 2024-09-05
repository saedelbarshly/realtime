<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;
use App\Models\Order;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('users.{id}', function (User $user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('chat.room.{roomId}', function (User $user, $roomId) {
    if(!$user->canAccessRoom($roomId)){
        return false;
    }
    return true;
});

Broadcast::channel('orders.{orderId}', function (User $user, $orderId) {

    if($user->id !== Order::findOrNew($orderId)->user_id){
        return false;
    }

    return true;

});


Broadcast::channel('chat', function(){

});
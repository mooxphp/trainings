<?php

use App\Models\User;

return [
    /*
    |--------------------------------------------------------------------------
    | User Models
    |--------------------------------------------------------------------------
    |
    | Add your user models here. You can add as many as you want.
    |
    */

    'user_models' => [
        'App Users' => User::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Disable actions
    |--------------------------------------------------------------------------
    |
    | You can disable some action buttons in the admin panel.
    | These actions are still available via the API
    | or by using the included jobs.
    |
    */

    'create_trainings_action' => true,
    'training_invitations_collect_action' => true,
    'training_invitations_send_action' => true,

];

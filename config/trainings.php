<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Trainings - Navigation Sort
    |--------------------------------------------------------------------------
    |
    | This values are the sort order of the navigation items in the
    | Filament Admin Panel. If you use a bunch of Moox
    | plugins, everything should be in order.
    |
    */

    'navigation_sort' => 7001,

    /*
    |--------------------------------------------------------------------------
    | Trainings - User Models
    |--------------------------------------------------------------------------
    |
    | Add your user models here. You can add as many as you want.
    |
    */

    'user_models' => [
        'App Users' => \App\Models\User::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Trainings - Disable actions
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

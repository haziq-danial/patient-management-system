<?php

use App\Classes\Constants\RoleType;
use App\Models\User;
use App\Models\Technician;
use App\Models\Medical;

if (!function_exists('get_user_type')) {
    function get_user_type($model): object
    {
        $model_type = [
            RoleType::MEDICAL => $model->medical,
            RoleType::TECHNICIAN => $model->technician,
            RoleType::ADMIN => $model->admin,
        ];

        return $model_type[$model->role_type];
    }
}

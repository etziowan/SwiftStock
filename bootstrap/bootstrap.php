<?php

require_once 'C:/xampp/htdocs/SwiftStock/vendor/autoload.php'; // Adjust the path as needed

$app = require_once 'C:/xampp/htdocs/SwiftStock/bootstrap/app.php';

Illuminate\Support\Facades\Facade::setFacadeApplication($app);

$app->boot();

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

// Check if the user is authenticated
if (Auth::check()) {
    // Get the authenticated user
    $user = Auth::user();

    // Check if the user has a specific role
    if ($user->hasRole('Company Owner')) {
        // User has 'Company Owner' role
        // Perform actions specific to users with 'Company Owner' role
        echo "User has 'Company Owner' role.";
    } else {
        // User does not have 'Company Owner' role
        // Perform actions for users without 'Company Owner' role
        echo "User does not have 'Company Owner' role.";
    }
} else {
    // User is not authenticated
    // Perform actions for unauthenticated users
    echo "User is not authenticated.";
}

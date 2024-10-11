<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\models\User;

class SigninAdminController extends Controller
{
       /**
     * Create a new admin user with the provided username, email, and password.
     * 
     * @param string $username The username of the admin user.
     * @param string $email The email of the admin user.
     * @param string $password The password for the admin user.
     */
    public function actionIndex($username, $email, $password)
    {
        if (User::findOne(['username' => $username]) || User::findOne(['email' => $email])) {
            echo "A user with this username or email already exists.\n";
            return;
        }
 
        $user = new User();
        $user->username = $username;
        $user->email = $email;
        $user->setPassword($password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->status = User::STATUS_ACTIVE;
        $user->role = User::ROLE_ADMIN;

        if ($user->save()) {
            echo "Admin user created successfully.\n";
        } else {
            echo "Failed to create admin user. Errors:\n";
            print_r($user->errors);
        }
    }
}

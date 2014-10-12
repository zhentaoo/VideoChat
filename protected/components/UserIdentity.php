<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate()
    {
        /**从数据库查询密码**/
        $user_model = User::model()->find('user_name=:name', array(':name' => $this->username));
        /**开始校验**/
        if ($user_model == null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
            return false;
        } else if ($user_model->password !== $this->password) {
            /**数据库查询密码！==用户输入密码**/
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
            return false;
        } else {
            $this->errorCode = self::ERROR_NONE;
            return true;
        }
    }
}
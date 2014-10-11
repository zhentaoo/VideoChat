<?php

class User extends CActiveRecord
{
    public $user_name;
    public $password;
    public $email;
    private $_identity;

    /*
     * 对应的标签名
     */
    function attributeLabels()
    {
        return array(
            'user_name' => '用户名',
            'password' => '密码',
            'email' => '邮箱'
        );
    }

    public function rules()
    {
        return array(
            array('email', 'email'),
            array('password,user_name,email', 'authenticate'),
        );
    }

    public function authenticate($attribute, $params)
    {
//        $this->_identity = new UserIdentity($this->user_name, $this->password);
        if ($this->password == '')
            $this->addError('password', '<font color="red">*密码不能空</font>');
        if ($this->user_name == '')
            $this->addError('user_name', '<font color="red">*用户名不能空</font>');
        if ($this->email == '')
            $this->addError('email', '<font color="red">*邮件不能空</font>');

//        if ($this->password != 'a')
//            $this->addError('password', '密码错误');
//        if ($this->user_name != 'lzt')
//            $this->addError('user_name', '用户名错误');
//        if ($this->email != 'lzt@qq.com')
//            $this->addError('email', '邮件错误');

    }

    /*
     * 返回当前模型对象的静态方法
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /*
     * 返回当前模型的名字
     */

    public function tableName()
    {
        return 'user';
    }
}

?>
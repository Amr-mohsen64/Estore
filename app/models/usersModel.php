<?php     
    namespace PHPMVC\Models;

    use PHPMVC\Models\UserGroupsPrivilegsModel;

    class UsersModel  extends AbstractModel{
        public $UserId ;
        public $UserName ;
        public $Password;
        public $Email ;
        public $PhoneNumber;
        public $SubsciriptionDate;
        public $LastLogin;
        public $GroupId;
        public $Status;

        // profile model
        public $Profile;
        public $privilges;

        public static $tableName = 'app_users';
        protected static $primaryKey = 'UserId';

        protected static $tableSchema = array(
            'UserId'                =>self::DATA_TYPE_INT,
            'UserName'              =>self::DATA_TYPE_STRING,
            'Password'              =>self::DATA_TYPE_STRING,
            'Email'                 =>self::DATA_TYPE_STRING,
            'PhoneNumber'           =>self::DATA_TYPE_STRING,
            'SubsciriptionDate'     =>self::DATA_TYPE_DATE,
            'LastLogin'             =>self:: DATA_TYPE_STRING,
            'GroupId'               =>self:: DATA_TYPE_INT,
            'Status'                =>self:: DATA_TYPE_INT,
        );
        
        public function cryptPassword($password)
        {
            $this->Password = crypt($password, APP_SALT);
        }

        public static function getUsers(UsersModel $user){
            return self::get(
                'SELECT au.*, aug.GroupName GroupName FROM ' . self::$tableName . ' au INNER JOIN app_users_groups aug ON aug.GroupId = au.GroupId WHERE au.UserId != ' . $user->UserId
                );
        }

        // user exsist check in database
        public static function userExists($username)
        {
            return self::get('
                SELECT * FROM ' . self::$tableName . ' WHERE UserName = "' . $username . '"
            ');
        }
        
        public static function authenticate ($username, $password , $session)
        {
            $password = crypt($password, APP_SALT) ;
            // using sub query: it must rerun one value only
            $sql = 'SELECT * , (SELECT GroupName FROM app_users_groups WHERE app_users_groups.GroupId = '. self::$tableName .'.GroupId) GroupName FROM ' .  self::$tableName . ' WHERE Username = "' . $username . '" AND Password = "' .  $password . '"';
            $foundUser = self::getOne($sql);
            if(false !== $foundUser ){
                // user is disapled
                if($foundUser->Status == 2){
                    return 2;
                }

                // user is exist
                $foundUser->LastLogin = date('Y-m-d H:i:s');
                $foundUser->save();
                $foundUser->Profile = UserProfileModel::getByPK($foundUser->UserId);
                $foundUser->privileges = UserGroupsPrivilegsModel::getPrivilegesForGroup($foundUser->GroupId);
                
                // put in session the logged in user
                $session->u = $foundUser;
                return 1;
            }
            // user not exists
            return false;
        }
    
    }
    
?>
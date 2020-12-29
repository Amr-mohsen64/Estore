<?php     
    namespace PHPMVC\Models;
    
    class UserGroupsPrivilegsModel  extends AbstractModel{
        public $Id ;
        public $GroupId ;
        public $PrivilegeId ;
    
        public static $tableName = 'app_users_groups_privileges';
        protected static $primaryKey = 'Id';

        protected static $tableSchema = array(
            'GroupId'                =>self::DATA_TYPE_INT,
            'PrivilegeId'              =>self::DATA_TYPE_INT,
        );

        //function to get privielge ids
        public function getGroupPrivilegs(UserGroupsModel $group){
            // get all from user privelige where group id = ?
            $groupPrivilegs = self::getBy(['GroupId' => $group->GroupId]);
            $extractedPrivilegeIds = array();

            if(false !== $groupPrivilegs){
                foreach ($groupPrivilegs as $privilege) {
                    // put in the extractedPrivilegeIds array the privlege in this group
                    $extractedPrivilegeIds[] = $privilege->PrivilegeId  ;
                }
            }
            return $extractedPrivilegeIds;
        }

        // for the user of the system which used to get his privelges links
        public static function getPrivilegesForGroup($groupId)
        {
            $sql = 'SELECT augp.*, aup.Privilege FROM ' . self::$tableName . ' augp';
            $sql .= ' INNER JOIN app_users_privileges aup ON aup.PrivilegeId = augp.PrivilegeId';
            $sql .= ' WHERE augp.GroupId = ' . $groupId;
            $privileges =  self::get($sql);
            $extractedUrls = [];
            if(false !== $privileges) {
                foreach ($privileges as $privilege) {
                    $extractedUrls[] = $privilege->Privilege;
                }
            }
            return $extractedUrls;
        }
    }
    
?>
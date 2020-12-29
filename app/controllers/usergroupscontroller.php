<?php 
    namespace PHPMVC\Controllers ;
    use PHPMVC\Models\UserGroupsModel;
    use PHPMVC\Models\PrivilegesModel;
    use PHPMVC\Models\UserGroupsPrivilegsModel;
    use PHPMVC\LIB\InputFilter;
    use PHPMVC\LIB\Helper;

    class UserGroupsController extends AbstractController
    {
        use Helper;
        use InputFilter;

        public function defaultAction()
        {
            $this->language->load('template.common');
            $this->language->load('usergroups.default');
            $this->_data['groups'] = userGroupsModel::getAll();
            $this->_view();
        }

        public function createAction(){
            $this->language->load('template.common');
            $this->language->load('usergroups.create');
            $this->language->load('usergroups.lables');
            $this->_data['privilegs'] = PrivilegesModel::getAll();

            if(isset($_POST['submit'])){
                $group = new UserGroupsModel();
                $group->GroupName = $this->filterString($_POST['GroupName']);
                if($group->save()){
                    if(isset($_POST['privilegs']) || is_array($_POST['privilegs'])){
                        foreach ($_POST['privilegs'] as $privilegId ) {
                            // get the table of many to many
                            $groupPrivilegs = new UserGroupsPrivilegsModel();
                            $groupPrivilegs->GroupId = $group->GroupId;
                            $groupPrivilegs->PrivilegeId = $privilegId;
                            $groupPrivilegs->save();
                        }
                    }
                }
                $this->redirect('/usergroups');
            }
            $this->_view();
        }
        
        //edit action
        public function editAction(){
            
            $id = $this->filterInt($this->_params[0]);
            $group = UserGroupsModel::getByPK($id);

            if($group === false){
                $this->redirect('/usergroups');
            }

            $this->language->load('template.common');
            $this->language->load('usergroups.create');
            $this->language->load('usergroups.lables');

            $this->_data['group'] = $group;
            // get all privilge on the system
            $this->_data['privilegs'] = PrivilegesModel::getAll();

            // send to view to make check
            $extractedPrivilegeIds = $this->_data['groupPrivileges'] = UserGroupsPrivilegsModel::getGroupPrivilegs($group);
            
            /**
             * there is here a good trick 
             * array_diff() Compares array1 against one or more other arrays and returns the values in array that are not present in any of the other arrays.
             * $privilegeToBeDeleted : get the value of elements exist in old and i will uncheck in post request
             */
            if(isset($_POST['submit'])){    
                if($group->save()){
                    if(isset($_POST['privileges']) || is_array($_POST['privileges'])){

                        $privilegeToBeDeleted = array_diff($extractedPrivilegeIds , $_POST['privileges']);
                        $privilegeToBeAdded   = array_diff( $_POST['privileges'] ,$extractedPrivilegeIds );

                        foreach ($privilegeToBeDeleted as $deletedPrivileges ) {
                            $unwantedPrivileges = UserGroupsPrivilegsModel::getBy(['PrivilegeId' => $deletedPrivileges , 'GroupId' =>$group->GroupId ]);
                            $unwantedPrivileges->current()->delete();
                        }

                        // add new privleges
                        foreach ($privilegeToBeAdded as $privilegId ) {
                            $groupPrivilegs = new UserGroupsPrivilegsModel();
                            $groupPrivilegs->GroupId = $group->GroupId;
                            $groupPrivilegs->PrivilegeId = $privilegId;
                            $groupPrivilegs->save();
                        }
                    }
                    $this->redirect('/usergroups');
                }
            }
            $this->_view();
        }

        // delete action
        public function deleteAction(){
            $id = $this->filterInt($this->_params[0]);
            $group = UserGroupsModel::getByPK($id);
            
            if($group === false){
                $this->redirect('/usergroups');
            }

            $groupPrivilegs = UserGroupsPrivilegsModel::getBy(['GroupId' => $group->GroupId]);
            if(false !== $groupPrivilegs){
                foreach ($groupPrivilegs as $groupPrivilege) {
                    // delete from many to many table
                    $groupPrivilege->delete();
                }
            }
            
            if($group->delete()){
                $this->redirect('/usergroups');
            }
        }
    }
?>
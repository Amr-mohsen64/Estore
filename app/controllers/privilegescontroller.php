<?php 
    namespace PHPMVC\Controllers ;
    use PHPMVC\Models\PrivilegesModel;  
    use PHPMVC\Models\UserGroupsPrivilegsModel;
    use PHPMVC\LIB\InputFilter;  
    use PHPMVC\LIB\Helper;  
    use PHPMVC\LIB\Messenger;  
    
    class PrivilegesController extends AbstractController
    {
        use InputFilter;
        use Helper;

        public function defaultAction()
        {
            $this->language->load('template.common');
            $this->language->load('privileges.default');
            $this->_data['privileges'] = PrivilegesModel::getAll();
            $this->_view();
        }

        //add new Privilege
        public function createAction(){
            $this->language->load('template.common');
            $this->language->load('privileges.labels');
            
            if(isset($_POST['submit'])){
                $privilege = new PrivilegesModel();
                $privilege->PrivilegeTitle = $this->filterString($_POST['PrivilegeTitle']);
                $privilege->Privilege = $this->filterString($_POST['Privilege']);
                if($privilege->save()){
                    $this->messenger->add('تم فظ الصلاحية');
                    $this->redirect('/privileges');
                }
            }
            $this->_view();
        }


         //edit new Privilege
        public function editAction(){

            $id = $this->filterInt($this->_params[0]);
            $privilege = PrivilegesModel::getByPK($id);

            // id not exist
            if($privilege == false ){
                $this->redirect('/privileges');
            }
            
            //send data  to view
            $this->_data['privileges'] = $privilege;
            $this->language->load('template.common');
            $this->language->load('privileges.labels');
            // $this->language->load('privileges.edit');

            if(isset($_POST['submit'])){
                $privilege->PrivilegeTitle = $this->filterString($_POST['PrivilegeTitle']);
                $privilege->Privilege = $this->filterString($_POST['Privilege']);

                if($privilege->save()){
                    $this->messenger->add('تم تعديل الصلاحية' , Messenger::APP_MESSAGE_INFO);
                    $this->redirect('/privileges');
                }
            }
            $this->_view();
        }


         //delete
        public function deleteAction()
        {
            $id = $this->filterInt($this->_params[0]);
            $privilege = PrivilegesModel::getByPK($id);

            // id not exist
            if($privilege == false )
            {
                $this->rediect('/privileges');
            }

            $groupPrivileges = UserGroupsPrivilegsModel::getBy(['PrivilegeId' =>$privilege ->PrivilegeId]);
            if(false !== $groupPrivileges){
                foreach ($groupPrivileges as $groupPrivilege) {
                    // delete from many to many table
                    $groupPrivilege->delete();
                }
            }
            if($privilege->delete())
            {
                $this->redirect('/privileges');
            }
            
        }

    }
?>
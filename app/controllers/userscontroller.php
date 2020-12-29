<?php 
    namespace PHPMVC\Controllers ;
    use PHPMVC\Models\UsersModel;
    use PHPMVC\Models\UserGroupsModel;
    use PHPMVC\Models\UserProfileModel;
    use PHPMVC\LIB\Validate ;
    use PHPMVC\LIB\InputFilter ;
    use PHPMVC\LIB\Helper ;
    use PHPMVC\LIB\Messenger;


    class UsersController extends AbstractController
    {
        use Validate;
        use InputFilter;
        use Helper;

        private $_createActionRoles= [
            'FirstName'         => 'req|alphanum|between(3,10)',
            'LastName'          => 'req|alphanum|between(3,10)',
            'UserName'          => 'req|alphanum|between(3,12)',
            'Password'          => 'req|min(6)|eq_field(CPassword)',
            'CPassword'         => 'req|min(6)',
            'Email'             => 'req|email',
            'CEmail'            => 'req|email',
            'PhoneNumber'       => 'alphanum|max(15)',
            'GroupId'           => 'req|int'
        ]; 

        private $_editActionRoles =
        [
            'PhoneNumber'   => 'alphanum|max(15)',
            'GroupId'       => 'req|int'
        ];

        
        public function defaultAction()
        {
            $this->language->load('template.common');
            $this->language->load('users.default');
            $this->_data['users'] = UsersModel::getUsers($this->session->u);
            $this->_view();
        }

        public function createAction(){
            $this->language->load('template.common');
            $this->language->load('users.create');
            $this->language->load('users.lables');
            $this->language->load('users.messages');
            $this->language->load('validation.errors');
            $this->_data['groups'] = UserGroupsModel::getAll();

            if(isset($_POST['submit']) && $this->isValid($this->_createActionRoles , $_POST)){
                $user = new  UsersModel();
                $user->UserName     = $this->filterString($_POST['UserName']);
                $user->cryptPassword($_POST['Password']);
                $user->Email        = $this->filterString($_POST['Email']);
                $user->PhoneNumber  = $this->filterString($_POST['PhoneNumber']);
                $user->GroupId      = $this->filterInt($_POST['GroupId']);
                $user->SubsciriptionDate = date('Y-m-d');
                $user->LastLogin = date('Y-m-d H:i:s');
                $user->Status = 1;

                //check user exists
                if(UsersModel::userExists($user->UserName)) {
                    $this->messenger->add($this->language->get('message_user_exists' , Messenger::APP_MESSAGE_ERROR));
                    $this->redirect('/users/create');
                }

                if($user->save()){
                    $userProfile = new UserProfileModel();
                    $userProfile->UserId = $user->UserId;
                    $userProfile->FirstName = $this->filterString($_POST['FirstName']);
                    $userProfile->LastName  = $this->filterString($_POST['LastName']);
                    $userProfile->save(false);
                    $this->messenger->add($this->language->get('message_create_success'));
                }else{
                    $this->messenger->add($this->language->get('message_create_failed' , Messenger::APP_MESSAGE_ERROR));
                }
                $this->redirect('/users');
                
            }
            $this->_view();
        }

        //edit action
        public function editAction(){

            $id = $this->_params[0];
            $user = UsersModel::getByPK($id);

            // if user not exit or not the user using app cannot edit
            if($user == false || $this->session->u->UserId == $id){
                $this->redirect('/users');
            }

            //send data to view
            $this->_data['user'] = $user;

            $this->language->load('template.common');
            $this->language->load('users.create');
            $this->language->load('users.lables');
            $this->language->load('users.messages');
            $this->language->load('validation.errors');
            $this->_data['groups'] = UserGroupsModel::getAll();

            if(isset($_POST['submit']) && $this->isValid($this->_editActionRoles , $_POST)){    
                $user->PhoneNumber  = $this->filterString($_POST['PhoneNumber']);
                $user->GroupId      = $this->filterInt($_POST['GroupId']);

                if($user->save()){
                    $this->messenger->add($this->language->get('message_create_success'));
                }else{
                    $this->messenger->add($this->language->get('message_create_failed' , Messenger::APP_MESSAGE_ERROR));
                }
                $this->redirect('/users');
                
            }
            $this->_view();
        }

        //delete action
        public function deleteAction()
        {

            $id = $this->filterInt($this->_params[0]);
            $user = UsersModel::getByPK($id);

            // if user not exit or not the user using app cannot edit
            if($user == false || $this->session->u->UserId == $id){
                $this->redirect('/users');
            }

            $this->language->load('users.messages');

            if($user->delete()) {
                $this->messenger->add($this->language->get('message_delete_success'));
            } else {
                $this->messenger->add($this->language->get('message_delete_failed'), messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/users');
        }   

        // this ajax request to check user
        public function checkUserExistAjaxAction(){
            header('Content-type: text/plain');
            if(isset($_POST['UserName'])){
                if(UsersModel::userExists($this->filterString($_POST['UserName'])) !== false){
                    echo 1;
                }else{
                    echo 2;
                }
            }
        }
    }
?>
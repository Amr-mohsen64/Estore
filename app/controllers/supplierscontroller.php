<?php 
    namespace PHPMVC\Controllers ;
    use PHPMVC\Models\SuppliersModel;
    use PHPMVC\LIB\Validate ;
    use PHPMVC\LIB\InputFilter ;
    use PHPMVC\LIB\Helper ;
    use PHPMVC\LIB\Messenger;


    class SuppliersController extends AbstractController
    {
        use Validate;
        use InputFilter;
        use Helper;

        private $_createActionRoles= [
            'Name'         => 'req|alphanum|between(3,40)',
            'Email'            => 'req|email',
            'PhoneNumber'       => 'alphanum|max(15)',
            'PhoneNumber'       => 'req|alphanum|max(50)',
        ]; 

        private $_editActionRoles =
        [
            'Name'              => 'req|alphanum|between(3,40)',
            'Email'             => 'req|email',
            'PhoneNumber'       => 'alphanum|max(15)',
            'PhoneNumber'       => 'req|alphanum|max(50)',
        ];

        
        public function defaultAction()
        {
            $this->language->load('template.common');
            $this->language->load('suppliers.default');
            $this->_data['suppliers'] = SuppliersModel::getAll();
            $this->_view();
        }

        public function createAction(){
            $this->language->load('template.common');
            $this->language->load('suppliers.create');
            $this->language->load('suppliers.labels');
            $this->language->load('suppliers.messages');
            $this->language->load('validation.errors');

            if(isset($_POST['submit']) && $this->isValid($this->_createActionRoles , $_POST)){
                $supplier = new  SuppliersModel();
                $supplier->Name         = $this->filterString($_POST['Name']);
                $supplier->Email        = $this->filterString($_POST['Email']);
                $supplier->PhoneNumber  = $this->filterInt($_POST['PhoneNumber']);
                $supplier->Address      = $this->filterString($_POST['Address']);

                if($supplier->save()){
                    $this->messenger->add($this->language->get('message_create_success'));
                }else{
                    $this->messenger->add($this->language->get('message_create_failed' , Messenger::APP_MESSAGE_ERROR));
                }
                $this->redirect('/suppliers');
                
            }
            $this->_view();
        }

        //edit action
        public function editAction(){

            $id = $this->_params[0];
            $supplier = SuppliersModel::getByPK($id);

            // if user not exit or not the user using app cannot edit
            if($supplier == false){
                $this->redirect('/suppliers');
            }

            //send data to view
            $this->_data['supplier'] = $supplier;

            $this->language->load('template.common');
            $this->language->load('suppliers.create');
            $this->language->load('suppliers.labels');
            $this->language->load('suppliers.messages');
            $this->language->load('validation.errors');

            if(isset($_POST['submit']) && $this->isValid($this->_editActionRoles , $_POST)){    
                $supplier->Name         = $this->filterString($_POST['Name']);
                $supplier->Email        = $this->filterString($_POST['Email']);
                $supplier->PhoneNumber  = $this->filterInt($_POST['PhoneNumber']);
                $supplier->Address      = $this->filterString($_POST['Address']);


                if($supplier->save()){
                    $this->messenger->add($this->language->get('message_create_success'));
                }else{
                    $this->messenger->add($this->language->get('message_create_failed' , Messenger::APP_MESSAGE_ERROR));
                }
                $this->redirect('/suppliers');
                
            }
            $this->_view();
        }

        //delete action
        public function deleteAction()
        {

            $id = $this->filterInt($this->_params[0]);
            $supplier = SuppliersModel::getByPK($id);

            //supplier not exist
            if($supplier == false){
                $this->redirect('/suppliers');
            }

            $this->language->load('suppliers.messages');

            if($supplier->delete()) {
                $this->messenger->add($this->language->get('message_delete_success'));
            } else {
                $this->messenger->add($this->language->get('message_delete_failed'), messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/suppliers');
        }   
    }
?>
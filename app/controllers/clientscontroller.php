<?php 
    namespace PHPMVC\Controllers ;
    use PHPMVC\Models\ClientsModel;
    use PHPMVC\LIB\Validate ;
    use PHPMVC\LIB\InputFilter ;
    use PHPMVC\LIB\Helper ;
    use PHPMVC\LIB\Messenger;


    class ClientsController extends AbstractController
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
            $this->language->load('clients.default');
            $this->_data['clients'] = ClientsModel::getAll();
            $this->_view();
        }

        public function createAction(){
            $this->language->load('template.common');
            $this->language->load('clients.create');
            $this->language->load('clients.labels');
            $this->language->load('clients.messages');
            $this->language->load('validation.errors');

            if(isset($_POST['submit']) && $this->isValid($this->_createActionRoles , $_POST)){
                $supplier = new  ClientsModel();
                $supplier->Name         = $this->filterString($_POST['Name']);
                $supplier->Email        = $this->filterString($_POST['Email']);
                $supplier->PhoneNumber  = $this->filterInt($_POST['PhoneNumber']);
                $supplier->Address      = $this->filterString($_POST['Address']);

                if($supplier->save()){
                    $this->messenger->add($this->language->get('message_create_success'));
                }else{
                    $this->messenger->add($this->language->get('message_create_failed' , Messenger::APP_MESSAGE_ERROR));
                }
                $this->redirect('/clients');
                
            }
            $this->_view();
        }

        //edit action
        public function editAction(){

            $id = $this->_params[0];
            $client = ClientsModel::getByPK($id);

            // if user not exit or not the user using app cannot edit
            if($client == false){
                $this->redirect('/clients');
            }

            //send data to view
            $this->_data['client'] = $client;

            $this->language->load('template.common');
            $this->language->load('clients.create');
            $this->language->load('clients.labels');
            $this->language->load('clients.messages');
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
                $this->redirect('/clients');
                
            }
            $this->_view();
        }

        //delete action
        public function deleteAction()
        {

            $id = $this->filterInt($this->_params[0]);
            $supplier = ClientsModel::getByPK($id);

            //supplier not exist
            if($supplier == false){
                $this->redirect('/clients');
            }

            $this->language->load('clients.messages');

            if($supplier->delete()) {
                $this->messenger->add($this->language->get('message_delete_success'));
            } else {
                $this->messenger->add($this->language->get('message_delete_failed'), messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/clients');
        }   
    }
?>
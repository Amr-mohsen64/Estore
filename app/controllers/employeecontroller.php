<?php 
    namespace PHPMVC\Controllers ;
    use PHPMVC\Models\EmployeeModel;
    use PHPMVC\LIB\InputFilter;
    use PHPMVC\LIB\Helper;
    
    class EmployeeController extends AbstractController{
        use InputFilter;
        use Helper;
            
        public function defaultAction(){
            $this->language->load('template.common');
            $this->language->load('employee.default');
            $this->_data['employee'] = EmployeeModel::getAll(); 
            $this->_view();
        }

        public function addAction(){
            $this->language->load('template.common');
            if(isset($_POST['submit'])){
                $emp = new EmployeeModel;
                $emp->name      = $this->filterString($_POST['name']);
                $emp->age       = $this->filterInt($_POST['age']);
                $emp->address   = $this->filterString($_POST['address']);
                $emp->salary    = $this->filterFloat($_POST['salary']);
                
                if($emp->save()){
                    $_SESSION['msg'] =  'saved';
                    $this->redirect('/employee');
                }
            }
            $this->_view();
        }


        public function editAction(){
            $this->language->load('template.common');
            $id = filter_var($this->_params[0] , FILTER_SANITIZE_NUMBER_INT);
            $emp = EmployeeModel::getByPK($id);

            // if no emp by this id
            if(empty($emp)){
                $this->redirect('/employee');
            }
            
            $this->_data['employee'] = $emp;

            if(isset($_POST['submit'])){
                $emp->name      = $this->filterString($_POST['name']);
                $emp->age       = $this->filterInt($_POST['age']);
                $emp->address   = $this->filterString($_POST['address']);
                $emp->salary    = $this->filterFloat($_POST['salary']);
                
                if($emp->save()){
                    $_SESSION['msg'] =  'saved';
                    $this->redirect('/employee');
                }
            }
            $this->_view();
        }


        public function deleteAction(){
            $this->language->load('template.common');
            // id in link
            $id = filter_var($this->_params[0] , FILTER_SANITIZE_NUMBER_INT);
            $emp = EmployeeModel::getByPK($id);

            // if no emp by this id
            if(empty($emp)){
                $this->redirect('/employee');
            }

            if($emp->delete()){
                $_SESSION['msg'] =  'deleted';
                $this->redirect('/employee');
            }
            $this->_view();
        }
    }
?>
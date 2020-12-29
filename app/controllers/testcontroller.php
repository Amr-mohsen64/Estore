<?php 
    namespace PHPMVC\Controllers ;
    use PHPMVC\LIB\Validate ;
    use PHPMVC\Models\UserGroupsPrivilegsModel;

    class TestController extends AbstractController{
        use Validate;
        public function defaultAction(){
            
            var_dump($this->url('http://www.apptest') );
            echo "<pre>";
            // $priv = UserGroupsPrivilegsModel::getPrivilegesForGroup($this->session->u->GroupId);
            var_dump($this->session->u);

        }

    }
?>
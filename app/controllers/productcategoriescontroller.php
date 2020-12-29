<?php 
    namespace PHPMVC\Controllers ;
    use PHPMVC\Models\ProductCategoriesModel;
    use PHPMVC\LIB\InputFilter;
    use PHPMVC\LIB\Helper;
    use PHPMVC\LIB\FileUpload;
    use PHPMVC\LIB\Validate;

    class ProductCategoriesController extends AbstractController
    {
        use Helper;
        use InputFilter;
        use Validate;
        
        private $_createActionRoles =
        [
            'Name'          => 'req|alphanum|between(3,30)'
        ];

        public function defaultAction()
        {
            $this->language->load('template.common');
            $this->language->load('productcategories.default');
            $this->_data['categories'] = ProductCategoriesModel::getAll();
            $this->_view();
        }

        public function createAction(){
            $this->language->load('template.common');
            $this->language->load('productcategories.create');
            $this->language->load('productcategories.labels');
            $this->language->load('productcategories.messages');
            $this->language->load('validation.errors');
            $this->_data['categories'] = ProductCategoriesModel::getAll();

            $uploadError = false;

            if(isset($_POST['submit']) && $this->isValid($this->_createActionRoles, $_POST)) {
                $category = new ProductCategoriesModel();
                $category->Name = $this->filterString($_POST['Name']);

                //if image not empty
                if(!empty($_FILES['image']['name'])) {
                    $uploader = new FileUpload($_FILES['image']);
                    try {
                        $uploader->upload();
                        $category->Image = $uploader->getFileName();
                    } catch (\Exception $e) {
                        $this->messenger->add($e->getMessage(), messenger::APP_MESSAGE_ERROR);
                        $uploadError = true;
                    }
                }

                if($uploadError === false && $category->save())
                {
                    $this->messenger->add($this->language->get('message_create_success'));
                    $this->redirect('/productcategories');
                } else {
                    $this->messenger->add($this->language->get('message_create_failed'), messenger::APP_MESSAGE_ERROR);
                }
                
            }
            $this->_view();
        }
        
        //edit action
        public function editAction(){
            
            $id = $this->filterInt($this->_params[0]);
            $category = ProductCategoriesModel::getByPK($id);

            if($category === false){
                $this->redirect('/productcategories');
            }

            $this->language->load('template.common');
            $this->language->load('productcategories.create');
            $this->language->load('productcategories.labels');
            $this->language->load('productcategories.messages');
            $this->language->load('validation.errors');

            $uploadError = false;
            $this->_data['category'] = $category;

            if(isset($_POST['submit'])){    
                $category->Name = $this->filterString($_POST['Name']);
                if(!empty($_FILES['image']['name'])) 
                {
                    // Remove the old image
                    if($category->Image !== '' && file_exists(IMAGES_UPLOAD_STORAGE.DS.$category->Image) && is_writable(IMAGES_UPLOAD_STORAGE)) {
                        unlink(IMAGES_UPLOAD_STORAGE.DS.$category->Image);
                    }

                    // Create a new image
                    $uploader = new FileUpload($_FILES['image']);
                    try {
                        $uploader->upload();
                        $category->Image = $uploader->getFileName();
                    } catch (\Exception $e) {
                        $this->messenger->add($e->getMessage(), messenger::APP_MESSAGE_ERROR);
                        $uploadError = true;
                    }

                }

                if($uploadError === false && $category->save())
                {
                    $this->messenger->add($this->language->get('message_create_success'));
                    $this->redirect('/productcategories');
                } else {
                    $this->messenger->add($this->language->get('message_create_failed'), messenger::APP_MESSAGE_ERROR);
                }

            }
            $this->_view();
        }

        // delete action
        public function deleteAction()
        {
            $id = $this->filterInt($this->_params[0]);
            $category = ProductCategoriesModel::getByPK($id);

            if($category === false) {
                $this->redirect('/productcategories');
            }

            $this->language->load('productcategories.messages');

            if($category->delete())
            {
                // Remove the old image
                if($category->Image !== '' && file_exists(IMAGES_UPLOAD_STORAGE.DS.$category->Image)) {
                    unlink(IMAGES_UPLOAD_STORAGE.DS.$category->Image);
                }
                $this->messenger->add($this->language->get('message_delete_success'));
            } else {
                $this->messenger->add($this->language->get('message_delete_failed'));
            }
            $this->redirect('/productcategories');
            }
    }
?>
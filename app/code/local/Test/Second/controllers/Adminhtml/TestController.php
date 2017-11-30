<?php
class Test_Second_Adminhtml_TestController extends Mage_Adminhtml_Controller_Action {

    public function indexAction(){
        $this->loadLayout();
        $this->renderLayout();
    }
    
}


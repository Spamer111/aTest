<?php
class Second_Test_Adminhtml_TestController extends Mage_Adminhtml_Controller_Action {

    public function indexAction(){
        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('second_test/adminhtml_second'));
        $this->renderLayout();
    }
}


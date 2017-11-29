<?php
class Second_Test_Block_Adminhtml_Second extends Mage_Adminhtml_Block_Template
{

    public function getReport(){
        $data = array();
        $categoryCollection = Mage::getModel('catalog/category')->getCollection()->addAttributeToSelect('name');
        foreach($categoryCollection as $key => $category){

            $productCollectionPrice = $category->getProductCollection()
                ->addAttributeToFilter('price',array('gt' => 10));

            $productCollectionQty = $category->getProductCollection()
                ->joinField('qty',
                    'cataloginventory/stock_item',
                    'qty',
                    'product_id=entity_id',
                    '{{table}}.stock_id=1',
                    'left'
                )->addAttributeToFilter('qty', array('lt' => 3));

            $productCollectionName= $category->getProductCollection()
                ->addAttributeToFilter('name',array('like' => '%A%'));

            $data[$key]['id'] =   $category->getId();
            $data[$key]['name'] =  $category->getName();
            $data[$key]['pricesize'] =  $productCollectionPrice->getSize();
            $data[$key]['qtysize'] =  $productCollectionQty->getSize();
            $data[$key]['namesize'] =  $productCollectionName->getSize();
        }
        return $data;
    }

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('second/test.phtml');
    }


}
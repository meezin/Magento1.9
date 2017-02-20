<?php
class Meezin_CustomerGrouped_Model_Observer {
  public function customerRegisterSuccess(Varien_Event_Observer $observer) {

        $event = $observer->getEvent();
        $customer = $event->getCustomer();
        $customer = Mage::getModel('customer/customer')->load($customer->getId());
        $billingAddress = $customer->getPrimaryBillingAddress();
        if ($billingAddress) {
            $countryId = $billingAddress->getCountryId();
            switch ($countryId) {
                case 'US':
                    $customer->setData('group_id', 1);
                    $customer->save();
                    break;
                default:
                    $customer->setData('group_id', 27);
                    $customer->save();
            }
        }
  }
}

 
?>
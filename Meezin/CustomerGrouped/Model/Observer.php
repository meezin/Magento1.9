/*

the default setting on my website,
|    group                  |   group_id   |
|  Standard                 |       1      |
|  international_standard   |      27      |

This code result in if the country code is US, set as standard group. Or, set as international group
You can expand the code by using switch-case statement. 

*/

<?php
class Meezin_CustomerGrouped_Model_Observer {
  public function customerRegisterSuccess(Varien_Event_Observer $observer) {

        $event = $observer->getEvent();
        $customer = $event->getCustomer();
        $customer = Mage::getModel('customer/customer')->load($customer->getId()); 
        $billingAddress = $customer->getPrimaryBillingAddress();
        if ($billingAddress) {
            $countryId = $billingAddress->getCountryId(); //get value of your country attribute
            switch ($countryId) {
                case 'US': //set the country_code 
                    $customer->setData('group_id', 1); // or whatever the group id should be
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

# Magento1.9_AssignGroupIDBasedOnCountryID
Automatically assign groupd id based on address where customer live 


When customer register on some websites, customer should select the country where they live and it is saved as billing address. 
The final goal for this module is when customer live in United State, their group is standard group(just default group). 
If there don't, such as they live in Jamaica, Spain, they are assigned to international group automatically by using this module.

Unfortunately, Magento does not use group id as the function of classifying where they live in.
it used as the function of grouping the tax group based on their billing address. 

What if you don't regard groupID as the standarzation of tax group, Try it use like that. 

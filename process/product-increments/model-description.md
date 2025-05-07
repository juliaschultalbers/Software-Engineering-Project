<!--- 
This document is a template with a proposal for the structure of the model descriptions.  
Feel free to change and adapt the structure of the document!  
---> 

# Models description

## use-case-diagram 

The diagram shows the organisation of the daycare system including the scheduling system for vacation planning for the workers and the favourite food system, where every child can vote for their favourite meals. If there not enough workers for all groups the staffing group receives an alert notification 
Assumptions: 

- User-Accounts exists already
- User-names/devices
- Predetermined choice dishes
- Database is always up to date regarding groups
- Chef/Management already planned plans and organisation is set up, groups created and assigned
- App is already reinstalled and runnable on devices and bug free


## class diagram 
The management, the caregiver and the chef classes are inherited by the employee class and has access to all private attributes of employee. 
All employees use an ipad to use the scheduling system. The chef/ecotrophologist uses the favorite food system to add or update the dishes. 
The child- and parent class are inherited by the customer class. The child class use the favorite food system to vote for their favourite meal.

## ocl-invariants
Defines conditions that must always hold true for all instances of a class, specifying constraints on the object’s state.

## pre- and postconditions
Precondition: restrictions which have to be true before execution
Postcondition: restrictions which have to be true after execution


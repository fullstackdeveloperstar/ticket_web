<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "login";
$route['404_override'] = 'error';


/*********** USER DEFINED ROUTES *******************/

$route['loginMe'] = 'login/loginMe';
$route['dashboard'] = 'user';
$route['logout'] = 'user/logout';
$route['userListing'] = 'user/userListing';
$route['userListing/(:num)'] = "user/userListing/$1";
$route['addNew'] = "user/addNew";

$route['addNewUser'] = "user/addNewUser";
$route['editOld'] = "user/editOld";
$route['editOld/(:num)'] = "user/editOld/$1";
$route['editUser'] = "user/editUser";
$route['deleteUser'] = "user/deleteUser";
$route['loadChangePass'] = "user/loadChangePass";
$route['changePassword'] = "user/changePassword";
$route['pageNotFound'] = "user/pageNotFound";
$route['checkEmailExists'] = "user/checkEmailExists";

$route['forgotPassword'] = "login/forgotPassword";
$route['resetPasswordUser'] = "login/resetPasswordUser";
$route['resetPasswordConfirmUser'] = "login/resetPasswordConfirmUser";
$route['resetPasswordConfirmUser/(:any)'] = "login/resetPasswordConfirmUser/$1";
$route['resetPasswordConfirmUser/(:any)/(:any)'] = "login/resetPasswordConfirmUser/$1/$2";
$route['createPasswordUser'] = "login/createPasswordUser";



// api routes
$route['api/login'] = "apilogin/index";
$route['api/signup'] = "apilogin/signup";
$route['api/forgotpassword'] = 'apilogin/forgotpassword';

// user apis
$route['api/user/myinfo'] = "apiuser/index";
$route['api/user/update'] = "apiuser/update";
$route['api/user/update1'] = "apiuser/update1";
$route['api/user/uploadprofileimage'] = "apiuser/uploadUserProfile";
$route['api/user/changepassword'] = 'apiuser/updatePassword';
$route['api/user/countticketsandliked'] = 'apiuser/getTicketsAndLikedEventsCount';

// event apis
$route['api/event/getall'] = "apievent/index";
$route['api/event/liked'] = "apievent/getLikedEventsList";
$route['api/event/toggle_like'] = "apievent/toggleLike";
$route['api/event/create'] = "apievent/createEvent";
$route['api/event/update'] = "apievent/updateEvent";
$route['api/event/update1'] = "apievent/updateEvent1";
$route['api/event/mylist'] = "apievent/mylist";

// org apis
$route['api/org/create'] = "apiorg/createOrg";
$route['api/org/update'] = "apiorg/updateOrg";
$route['api/org/update1'] = "apiorg/updateOrg1";

// ticket apis
$route['api/ticket/create'] = "apiticket/createTicket";
$route['api/ticket/update'] = "apiticket/updateTicket";
$route['api/ticket/order'] = "apiticket/orderTicket";
$route['api/ticket/pay'] = "apiticket/orderPay";
$route['api/ticket/check'] = "apiticket/check";

// order apis
$route['api/order/getorders'] = "apiorder/getOrders";

// stripe
$route['stripe_test/index'] = "stripe/index";
$route['stripe_test/check'] = "stripe/check";
$route['stripe_test/payment_success'] = 'stripe/payment_success';
$route['stripe_test/payment_error'] = 'stripe/payment_error';
$route['stripe_test/help'] = 'stripe/help';
$route['stripe_test/orderpay'] = 'stripe/order_pay';

$route['api/isloggedin'] = "apilogin/isLoggedIn";
$route['api'] = 'Apiuser/index';
// $route['sendmail'] = "apilogin/sendEmail";

// admin apis

$route['api/admin/user/userinfo'] = "apiadminuser/index";

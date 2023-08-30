/**
* @api {post} /api/admin/auth/login 1. Login
* @apiVersion 1.0.0
* @apiName Login
* @apiGroup Authentication
*
* @apiParam {String} email
* @apiParam {String} password
* @apiParam {String} [player_id]
*
 @apiExample {curl} Example usage:
{
	"email": "user@gmail.com",
	"password": "1234567890",
    "player_id": "{{player_id}}"
}
*
* @apiSuccessExample  Response (example):
HTTP/1.1 200 Success Request
{
    "success": true,
    "data": {
        "access_token": "8|3JLvUbIRtM38R4tG389wenw8gaRJ5BQXfC4Oh7tFyOXLyJmmtCbSkVS4QCudIJFj93LRAzfRqOqEfSlC",
        "user": {
            "id": 2,
            "first_name": null,
            "last_name": null,
            "username": "Nguon Chanhout",
            "email": "chanhoutn@gmail.com",
            "gender": "male",
            "phone": "070 533303",
            "address": null,
            "description": "papa@user.com",
            "enable_status": 1,
            "media_id": 45,
            "created_by": 1,
            "updated_by": null,
            "deleted_at": null,
            "created_at": "2020-05-01 00:30:49",
            "updated_at": "2020-05-01 00:30:49"
        }
    }
}
*/

/**
 * @api {post} /api/admin/auth/logout 2. Logout
 * @apiVersion 1.0.0
 * @apiName Logout
 * @apiGroup Authentication
 * 
 * @apiParam {String} player_id
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
{
    "success": true,
    "data": null
}
 */

/**
 * @api {get} /api/admin/auth/user_per 3. Get User Permission
 * @apiVersion 1.0.0
 * @apiName GetUserPermission
 * @apiGroup Authentication
 *
 * @apiHeader {String} Authorization Access token. Ex: 'Bearer ' + token
 * @apiHeader {String} Accept 'application/json'
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": {
        "dashboard-read": true,
        "user-read": true,
        "user-create": true,
        "user-update": true,
        "user-delete": true,
        "user-active": true,
        "user-export": true,
        "user-import": true,
        "role-read": true,
        "role-create": true,
        "role-update": true,
        "role-delete": true,
        "role-active": true,
        "role-export": true,
        "role-import": true,
        "booking-read": true,
        "booking-export": true,
        "booking-cancel": true,
        "draft-booking-read": true,
        "draft-booking-export": true,
        "task-read": true,
        "task-export": true,
        "operator-read": true,
        "operator-create": true,
        "operator-update": true,
        "operator-delete": true,
        "operator-active": true,
        "operator-export": true,
        "operator-import": true,
        "operator-advance": true,
        "driver-read": true,
        "driver-create": true,
        "driver-update": true,
        "driver-delete": true,
        "driver-active": true,
        "driver-export": true,
        "driver-import": true,
        "driver-advance": true,
        "vehicle-read": true,
        "vehicle-create": true,
        "vehicle-update": true,
        "vehicle-delete": true,
        "vehicle-active": true,
        "vehicle-export": true,
        "vehicle-import": true,
        "customer-read": true,
        "customer-export": true,
        "opt-not-yet-register-read": true,
        "opt-not-yet-register-export": true,
        "customer-no-booking-read": true,
        "customer-no-booking-export": true,
        "customer-missed-booking-read": true,
        "customer-missed-booking-export": true,
        "payment-read": true,
        "payment-export": true,
        "payment-close": true,
        "payment-history-read": true,
        "payment-history-export": true,
        "promo-code-read": true,
        "promo-code-create": true,
        "promo-code-update": true,
        "promo-code-delete": true,
        "promo-code-active": true,
        "promo-code-export": true,
        "promo-code-import": true,
        "pages-read": true,
        "pages-create": true,
        "pages-update": true,
        "pages-delete": true,
        "pages-active": true,
        "pages-export": true,
        "pages-import": true,
        "pages-send": true,
        "page-read": true,
        "page-create": true,
        "page-update": true,
        "page-delete": true,
        "page-active": true,
        "page-export": true,
        "page-import": true,
        "new-read": true,
        "new-create": true,
        "new-update": true,
        "new-delete": true,
        "new-active": true,
        "new-export": true,
        "new-import": true,
        "advertise-read": true,
        "advertise-create": true,
        "advertise-update": true,
        "advertise-delete": true,
        "advertise-active": true,
        "advertise-export": true,
        "advertise-import": true,
        "province-read": true,
        "province-create": true,
        "province-update": true,
        "province-delete": true,
        "province-active": true,
        "province-export": true,
        "province-import": true,
        "district-read": true,
        "district-create": true,
        "district-update": true,
        "district-delete": true,
        "district-active": true,
        "district-export": true,
        "district-import": true,
        "commune-read": true,
        "commune-create": true,
        "commune-update": true,
        "commune-delete": true,
        "commune-active": true,
        "commune-export": true,
        "commune-import": true,
        "village-read": true,
        "village-create": true,
        "village-update": true,
        "village-delete": true,
        "village-active": true,
        "village-export": true,
        "village-import": true
    }
}
 */


/**
 * @api {post} /api/admin/auth/forgot_password 1. Forgot Password
 * @apiVersion 1.0.0
 * @apiName ForgotPassword
 * @apiGroup ForgotPassword
 *
 *
 * @apiParam {String} email              Phone number
 *
 * @apiExample {curl} Example usage:
 {
    "email": "user@gmail.com"
}
 * @apiErrorExample  Response (example): HTTP/1.1 400 Bad
 {
    "success": false,
    "message": "Invalid phone number."
}
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": null
}
 */

/**
 * @api {post} /api/admin/auth/forgot_password/verify 2. Forgot Password Verify
 * @apiVersion 1.0.0
 * @apiName ForgotPasswordVerify
 * @apiGroup ForgotPassword
 *
 *
 * @apiParam {String} email              Phone number
 * @apiParam {String} verify_code              Verify Code
 *
 * @apiExample {curl} Example usage:
{
	"email": "user@gmail.com",
	"verify_code": "l5BR"
}
 * @apiErrorExample  Response (example): HTTP/1.1 400 Bad
{
    "success": false,
    "message": "Invalid verify code"
}
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": {
        "token": "9cc3b0306753ae59604898c1ce1ffaab7fa543c74061bcce6f70ca2b403997f9"
    }
}
 */

/**
 * @api {post} /api/admin/auth/forgot_password/reset 3. Forgot Password Reset
 * @apiVersion 1.0.0
 * @apiName ForgotPasswordReset
 * @apiGroup ForgotPassword
 *
 *
 * @apiParam {String} email              Phone number
 * @apiParam {String} token              Token
 * @apiParam {String} password              Password
 *
 * @apiExample {curl} Example usage:
{
	"email": "user@gmail.com",
	"token" : "95ae7f6b3f90ebb0b3579c1ea5e7277a850c4f2ba004a4986f73af8337d6ea5b",
	"password": "1234567890",
}
 * @apiErrorExample  Response (example): HTTP/1.1 400 Bad
{
    "success": false,
    "message": "Cannot not reset password."
}
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
{
    "success": true,
    "data": "Reset password successfully"
}
 */
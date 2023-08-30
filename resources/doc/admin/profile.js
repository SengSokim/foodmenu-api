/**
 * @api {get} /api/admin/profile Get Profile
 * @apiVersion 1.0.0
 * @apiName GetProfile
 * @apiGroup Profile
 *
 * @apiHeader {String} Authorization Access token. Ex: 'Bearer ' + token
 * @apiHeader {String} Accept 'application/json'
 * @apiHeader {String} Language    Language token for requesting API.
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
{
    "success": true,
    "data": {
        "id": 1,
        "name": "Sokchea Van",
        "gender": "male",
        "phone": "010562019",
        "address": "25 St 273 Sangkat Beoung Kork 1\n, Phnom Penh",
        "media": {
            "id": 7,
            "url": "http://127.0.0.1:4041/uploads/images/46891357161fba84fc29cc1643882575.png",
            "name": "46891357161fba84fc29cc1643882575.png",
            "deleted_at": null,
            "created_at": "2022-02-03T10:02:55.000000Z",
            "updated_at": "2022-02-03T10:02:55.000000Z"
        }
    }
}
 */

/**
 * @api {post} /api/admin/profile Update Profile
 * @apiVersion 1.0.0
 * @apiName UpdateProfile
 * @apiGroup Profile
 *
 * @apiHeader {String} Authorization Access token. Ex: 'Bearer ' + token
 * @apiHeader {String} Accept 'application/json'
 * @apiHeader {String} Language    Language token for requesting API.
 *
 * @apiParam {String} [name]
 * @apiParam {String} [gender]
 * @apiParam {String} [address]
 * @apiParam {String} [image]       base64
 *
 * @apiExample {curl} Example usage:
{
	"name": "Sokchea Van",
	"address": "testing",
	"gender": "Male",
	"image": "{{image_base64}}"
}
 *
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
{
    "success": true,
    "data": {
        "id": 1,
        "name": "Sokchea Van",
        "gender": "Male",
        "phone": "+855966523286",
        "address": "testing",
        "media": {
            "id": 2,
            "url": "http://localhost:6061/uploads/images/56933062460ec575e63f7c1626101598.png",
            "name": "56933062460ec575e63f7c1626101598.png",
            "deleted_at": null,
            "created_at": "2021-07-12T14:53:18.000000Z",
            "updated_at": "2021-07-12T14:53:18.000000Z"
        }
    }
}
 */

/**
 * @api {post} /api/admin/profile/password Update Password
 * @apiVersion 1.0.0
 * @apiName UpdatePassword
 * @apiGroup Profile
 *
 * @apiHeader {String} Authorization Access token. Ex: 'Bearer ' + token
 * @apiHeader {String} Accept 'application/json'
 *
 * @apiParam {string} old_password
 * @apiParam {string} password
 *
 * @apiExample {curl} Example usage:
{
	"old_password": "1234567890",
	"password": "12345678"
}
 *
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": null
}
 */

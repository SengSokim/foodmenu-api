/**
 * @api {get} /api/admin/client/users/all 0. List All
 * @apiVersion 1.0.0
 * @apiName ListAll
 * @apiGroup User
 *
 * @apiHeader {String} Authorization Access token. Ex: 'Bearer ' + token
 * @apiHeader {String} Accept 'application/json'
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
{
    "success": true,
    "data": [
        {
            "id": 1,
            "name": "Papa Deliver"
        }
    ]
}
 */

/**
 * @api {get} /api/admin/users/list 1. List
 * @apiVersion 1.0.0
 * @apiName List
 * @apiGroup User
 *
 * @apiHeader {String} Authorization Access token. Ex: 'Bearer ' + token
 * @apiHeader {String} Accept 'application/json'
 *
 * @apiParam {String} [search]
 * @apiParam {AnyString} [export]       if have value will resonse all data without limit
 * @apiParam {Integer} [offset]
 * @apiParam {Integer} [limit]
 * @apiParam {String} [order]     eg. order=updated_at
 * @apiParam {String} [sort]     eg. sort=asc|desc
 * 
 * @apiSuccessExample  Response (example):
 *
 HTTP/1.1 200 Success Request
{
    "success": true,
    "data": {
        "list": [
            {
                "id": 2,
                "name": "Hun Sovanneth",
                "email": "hunsovanneth@gmail.com",
                "address": "Takhmao, Kandal",
                "gender": "male",
                "is_active": 1,
                "phone": "+855966206029",
                "media": {
                    "id": 12,
                    "url": "http://localhost:8004/uploads/images/1797081006180aa80689d41635822208.png",
                    "name": "1797081006180aa80689d41635822208.png",
                    "deleted_at": null,
                    "created_at": "2021-11-02T03:03:28.000000Z",
                    "updated_at": "2021-11-02T03:03:28.000000Z"
                }
            },
        ],
        "total": 1
    }
}
 */

/**
 * @api {post} /api/admin/users/create 2. Create
 * @apiVersion 1.0.0
 * @apiName Create
 * @apiGroup User
 *
 * @apiHeader {String} Authorization Access token. Ex: 'Bearer ' + token
 * @apiHeader {String} Accept 'application/json'
 * @apiHeader {String} Language    Language token for requesting API.
 *
 * @apiParam {String} name
 * @apiParam {String} phone
 * @apiParam {String} email
 * @apiParam {String} password
 * @apiParam {Boolean} [is_active]
 * @apiParam {String} [gender]
 * @apiParam {String} [address]
 * @apiParam {String} [image]
 *
 @apiExample {curl} Example usage:
{
    "name" : "Hun Sovanneth",
    "phone" : "+855966206029",
    "email" : "hunsovanneth@gmail.com",
    "password" : "1234567890",
    "is_active" : 1,
    "gender" : "male",
    "address" : "Takhmao, Kandal",
    "image" : "{{base64Image}}"
}
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
{
    "success": true,
    "data": {
        "name": "Hun Sovanneth",
        "email": "hunsovanneth@gmail.com",
        "gender": "male",
        "phone": "+855966206029",
        "address": "Takhmao, Kandal",
        "is_active": 1,
        "media_id": 13,
        "created_by_id": 1,
        "created_by_type": "App\\Models\\User",
        "updated_at": "2021-11-02T03:12:23.000000Z",
        "created_at": "2021-11-02T03:12:23.000000Z",
        "id": 4
    }
}
 */

/**
 * @api {get} /api/admin/users/show/{id} 3. Show
 * @apiVersion 1.0.0
 * @apiName Show
 * @apiGroup User
 *
 * @apiHeader {String} Authorization Access token. Ex: 'Bearer ' + token
 * @apiHeader {String} Accept 'application/json'
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
{
    "success": true,
    "data": {
        "id": 2,
        "name": "Hun Sovanneth",
        "address": "Takhmao, Kandal",
        "email": "hunsovanneth@gmail.com",
        "is_active": 1,
        "gender": "male",
        "phone": "+855966206029",
        "media": {
            "id": 12,
            "url": "http://localhost:8004/uploads/images/1797081006180aa80689d41635822208.png",
            "name": "1797081006180aa80689d41635822208.png",
            "deleted_at": null,
            "created_at": "2021-11-02T03:03:28.000000Z",
            "updated_at": "2021-11-02T03:03:28.000000Z"
        }
    }
}
 */

/**
 * @api {post} /api/admin/users/update/{id} 4. update
 * @apiVersion 1.0.0
 * @apiName Update
 * @apiGroup User
 *
 * @apiHeader {String} Authorization Access token. Ex: 'Bearer ' + token
 * @apiHeader {String} Accept 'application/json'
 * @apiHeader {String} Language    Language token for requesting API.
 *
* @apiParam {String} name
 * @apiParam {String} phone
 * @apiParam {String} email
 * @apiParam {String} password
 * @apiParam {Boolean} [is_active]
 * @apiParam {String} [gender]
 * @apiParam {String} [address]
 * @apiParam {String} [image]
 *
@apiExample {curl} Example usage:
{
    "name" : "Hun Sovanneth",
    "phone" : "+855966206029",
    "email" : "hunsovanneth@gmail.com",
    "password" : "1234567890",
    "is_active" : 1,
    "gender" : "male",
    "address" : "Kandal",
    "image" : "{{base64Image}}"
}
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
{
    "success": true,
    "data": null
}
 */

/**
 * @api {post} /api/admin/users/delete/{id} 5. Delete
 * @apiVersion 1.0.0
 * @apiName Delete
 * @apiGroup User
 *
 * @apiHeader {String} Authorization Access token. Ex: 'Bearer ' + token
 * @apiHeader {String} Accept 'application/json'
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
{
    "success": true,
    "data": null
}
 */

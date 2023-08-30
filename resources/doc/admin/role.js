
/**
 * @api {get} /api/admin/role/list/all 0. List All
 * @apiVersion 1.0.0
 * @apiName ListAll
 * @apiGroup Role
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
            "name": "admin"
        }
    ]
}
 */

/**
 * @api {get} /api/admin/role/list 1. List
 * @apiVersion 1.0.0
 * @apiName ListRole
 * @apiGroup Role
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
                "id": 1,
                "name": "admin",
                "created_at": "2021-12-15T07:35:09.000000Z",
                "updated_at": "2021-12-15T07:35:09.000000Z",
                "data": null
            }
        ],
        "total": 1
    }
}
 */


/**
 * @api {post} /api/admin/role/create 2. Create 
 * @apiVersion 1.0.0
 * @apiName CreateRole
 * @apiGroup Role
 *
 * @apiHeader {String} Authorization Access token. Ex: 'Bearer ' + token
 * @apiHeader {String} Accept 'application/json'
 * @apiHeader {String} Language    Language token for requesting API.
 *
 * @apiParam {string} name
 * @apiParam {array} data
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
{
    "success": true,
    "data": null
}
 */

/**
 * @api {get} /api/admin/role/show/{id} 3. Show
 * @apiVersion 1.0.0
 * @apiName ShowRole
 * @apiGroup Role
 *
 * @apiHeader {String} Authorization Access token. Ex: 'Bearer ' + token
 * @apiHeader {String} Accept 'application/json'
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
{
    "success": true,
    "data": {
        "id": 1,
        "name": "staff",
        "created_at": "2021-12-15T08:08:05.000000Z",
        "updated_at": "2021-12-15T08:08:05.000000Z",
        "data": [
            {
                "id": 1,
                "name": "Coca",
                "price": 2.5,
                "description": "Sweet."
            }
        ]
    }
}
 */

/**
 * @api {post} /api/admin/Role/update/{id} 4. Update
 * @apiVersion 1.0.0
 * @apiName UpdateRole
 * @apiGroup Role
 *
 * @apiHeader {String} Authorization Access token. Ex: 'Bearer ' + token
 * @apiHeader {String} Accept 'application/json'
 * @apiHeader {String} Language    Language token for requesting API.
 *
 * @apiParam {string} name
 * @apiParam {array} data
 *
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
{
    "success": true,
    "data": null
}
 */

/**
 * @api {post} /api/admin/role/delete/{id} 5. Delete
 * @apiVersion 1.0.0
 * @apiName DeleteRole
 * @apiGroup Role
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
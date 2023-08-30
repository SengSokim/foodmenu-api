
/**
 * @api {get} /api/admin/member_type/list/all 0. List All
 * @apiVersion 1.0.0
 * @apiName ListAll
 * @apiGroup MemberType
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
 * @api {get} /api/admin/member_type/list 1. List
 * @apiVersion 1.0.0
 * @apiName List
 * @apiGroup MemberType
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
                "name": "admin"
            }
        ],
        "total": 1
    }
}
 */


/**
 * @api {post} /api/admin/member_type/create 2. Create 
 * @apiVersion 1.0.0
 * @apiName Create
 * @apiGroup MemberType
 *
 * @apiHeader {String} Authorization Access token. Ex: 'Bearer ' + token
 * @apiHeader {String} Accept 'application/json'
 * @apiHeader {String} Language    Language token for requesting API.
 *
 * @apiParam {string} name
 * 
 @apiExample {curl} Example usage:
{
    "name" : "General"
}
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
{
    "success": true,
    "data": [
        "id": 1
    ]
}
 */

/**
 * @api {get} /api/admin/member_type/show/{id} 3. Show
 * @apiVersion 1.0.0
 * @apiName Show
 * @apiGroup MemberType
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
        "name": "staff"
}
 */

/**
 * @api {post} /api/admin/member_type/update/{id} 4. Update
 * @apiVersion 1.0.0
 * @apiName Update
 * @apiGroup MemberType
 *
 * @apiHeader {String} Authorization Access token. Ex: 'Bearer ' + token
 * @apiHeader {String} Accept 'application/json'
 * @apiHeader {String} Language    Language token for requesting API.
 *
 * @apiParam {string} name
 *
 @apiExample {curl} Example usage:
{
    "name" : "General"
}
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
{
    "success": true,
    "data": null
}
 */

/**
 * @api {post} /api/admin/member_type/delete/{id} 5. Delete
 * @apiVersion 1.0.0
 * @apiName Delete
 * @apiGroup MemberType
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
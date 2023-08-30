/**
 * @api {get} /api/admin/member_document/list/{member_id} 01. List
 * @apiVersion 1.0.0
 * @apiName List
 * @apiGroup MemberDocument
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
    "data": [
        {
            "id": 1,
            "name": "1597623966795",
            "ext": "txt",
            "type": "general",
            "note": "note",
            "media": null
        },
    ]
}
 */


/**
 * @api {post} /api/admin/member_document/create/{member_id} 02. Create 
 * @apiVersion 1.0.0
 * @apiName Create
 * @apiGroup MemberDocument
 *
 * @apiHeader {String} Authorization Access token. Ex: 'Bearer ' + token
 * @apiHeader {String} Accept 'application/json'
 * @apiHeader {String} Language    Language token for requesting API.
 *
 * @apiParam {string} name
 * @apiParam {string} type
 * @apiParam {string} ext
 * @apiParam {base64_decode} [file]
 * 
 @apiExample {curl} Example usage:
{
    "file" : "1597623966795.jpg",
    "name" : "1597623966795"
    "ext" : "txt",
    "type" : "general",
    "note" : "note",
    "member_id" : "1"
}
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
{
    "success": true,
    "data": {
        "id": 5,
        "name": "beauty_1597623966795",
        "ext": "txt",
        "type": "general",
        "note": "note",
        "media": null
    }
}
 */

/**
 * @api {post} /api/admin/member_document/update/{id} 03. Update
 * @apiVersion 1.0.0
 * @apiName Update
 * @apiGroup MemberDocument
 *
 * @apiHeader {String} Authorization Access token. Ex: 'Bearer ' + token
 * @apiHeader {String} Accept 'application/json'
 * @apiHeader {String} Language    Language token for requesting API.
 *
 * @apiParam {Integer} id
 * @apiParam {string} name
 * @apiParam {string} type
 * @apiParam {base64_decode} [file]

 * 
 @apiExample {curl} Example usage:
{
    "success": true,
    "data": {
        "id": 4,
        "name": "1597623966795",
        "ext": "docx",
        "type": "General",
        "note": "note",
        "media": null
    }
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
 * @api {post} /api/admin/member_document/delete/{id} 04. Delete
 * @apiVersion 1.0.0
 * @apiName Delete
 * @apiGroup MemberDocument
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
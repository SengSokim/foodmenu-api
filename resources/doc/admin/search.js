/**
 * @api {get} /api/admin/search Search
 * @apiVersion 1.0.0
 * @apiName Search
 * @apiGroup Search
 *
 * @apiHeader {String} Authorization Access token. Ex: 'Bearer ' + token
 * @apiHeader {String} Accept 'application/json'
 * @apiHeader {String} Language    Language token for requesting API.
 *
 * @apiParam {String} search
 
* @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
{
    "success": true,
    "data": [
        {
            "url": "/admin/members/show/3",
            "text": "Karly Stephenson (0966523282)"
        }
    ]
}
 */

/**
 * @api {get} /api/admin/search/member_code Search Member Code
 * @apiVersion 1.0.0
 * @apiName MemberCode
 * @apiGroup Search
 *
 * @apiHeader {String} Authorization Access token. Ex: 'Bearer ' + token
 * @apiHeader {String} Accept 'application/json'
 * @apiHeader {String} Language    Language token for requesting API.
 *
 * @apiParam {String} code
 
* @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
{
    "success": true,
    "data": {
        "id": 1
    }
}
 */
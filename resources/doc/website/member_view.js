/**
 * @api {post} /api/web/member_view/allow_location/{id} 1. Aloow Location
 * @apiVersion 1.0.0
 * @apiName Profile
 * @apiGroup MemberView
 *
 * @apiHeader {String} Authorization Access token. Ex: 'Bearer ' + token
 * @apiHeader {String} Accept 'application/json'
 *
 * @apiParam {string} latitude
 * @apiParam {string} longitude
 
* @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
{
    "success": true,
    "data": null
}
 */
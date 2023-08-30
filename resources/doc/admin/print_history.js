/**
 * @api {get} /api/admin/member/print_history/{member_id}/certificate 1. List Certificate
 * @apiVersion 1.0.0
 * @apiName ListCertificate
 * @apiGroup MemberPrintHistory
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
                "created_at": "2022-03-09T01:23:26.000000Z",
                "printer": {
                    "id": 1,
                    "name": "PAPA Deliver"
                }
            }
        ],
        "total": 1
    }
}
 */

/**
 * @api {post} /api/admin/member/print_history/{member_id}/certificate 1. Create Certificate
 * @apiVersion 1.0.0
 * @apiName CreateCertificate
 * @apiGroup MemberPrintHistory
 *
 * @apiHeader {String} Authorization Access token. Ex: 'Bearer ' + token
 * @apiHeader {String} Accept 'application/json'
 *
 * @apiSuccessExample  Response (example):
 *
 HTTP/1.1 200 Success Request
{
    "success": true,
    "data": {
        "id": 1,
        "created_at": "2022-03-09T01:23:26.000000Z",
        "printer": {
            "id": 1,
            "name": "PAPA Deliver"
        }
    }
}
 */
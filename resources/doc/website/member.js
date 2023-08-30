/**
 * @api {get} /api/web/member/profile/{id} 1. Profile
 * @apiVersion 1.0.0
 * @apiName Profile
 * @apiGroup Member
 *
 * @apiHeader {String} Authorization Access token. Ex: 'Bearer ' + token
 * @apiHeader {String} Accept 'application/json'
 *
 * @apiParam {string} token
 
* @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
{
    "success": true,
    "data": {
        "id": 1,
        "name": "Sokchea",
        "name_km": "សុខជា",
        "code": "0966523286",
        "phone": "0966523286",
        "gender": "male",
        "addres": "Phnom Penh",
        "latitude": "15.12546765",
        "longitude": "104.12345678",
        "owner_addres": "Phnom Penh1",
        "owner_latitude": "15.12546765",
        "owner_longitude": "104.12345679",
        "image": "http://127.0.0.1:4041/uploads/images/269814394620c7efe2ba561644986110.png",
        "member_type": "General",
        "leader": null,
        "is_active": 1,
        "is_old_qr_code": false,
        "view_id": 1
    }
}
 */
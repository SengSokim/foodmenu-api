
/**
 * @api {get} /api/admin/member/list/all 0. List All
 * @apiVersion 1.0.0
 * @apiName ListAll
 * @apiGroup Member
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
            "name": "Sokchea"
        },
        {
            "id": 2,
            "name": "Sokchea"
        }
    ]
}
 */


/**
 * @api {get} /api/admin/member/list_leader/all 0. List Leader All
 * @apiVersion 1.0.0
 * @apiName ListLeaderAll
 * @apiGroup Member
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
            "name": "Sokchea"
        },
        {
            "id": 2,
            "name": "Sokchea"
        }
    ]
}
 */

/**
 * @api {get} /api/admin/member/list 01. List
 * @apiVersion 1.0.0
 * @apiName List
 * @apiGroup Member
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
                "name": "Sokchea",
                "name_km": "សុខជា",
                "code": "0966523283",
                "phone": "0966523283",
                "gender": "male",
                "status": null,
                "is_mark_location_by_company": 1,
                "is_active": 1,
                "birthday": "1999-01-01",
                "id_card_number": "DSB16273T",
                "media": {
                    "id": 2,
                    "url": "http://127.0.0.1:4041/uploads/images/1708413839620c7f0b24d5d1644986123.png",
                    "name": "1708413839620c7f0b24d5d1644986123.png",
                    "deleted_at": null,
                    "created_at": "2022-02-16T04:35:23.000000Z",
                    "updated_at": "2022-02-16T04:35:23.000000Z"
                },
                "member_type": {
                    "id": 1,
                    "name": "General"
                },
                "leader": {
                    "id": 1,
                    "name": "Sokchea"
                },
                "token": "77018ce10481ee6d3c89c5b31ca3d0d4f6c0643a03e04ec079cc9ffc776a16b7"
            },
            {
                "id": 1,
                "name": "Sokchea",
                "name_km": "សុខជា",
                "code": "0966523286",
                "phone": "0966523286",
                "gender": "male",
                "is_mark_location_by_company": 1,
                "is_active": 1,
                "media": {
                    "id": 1,
                    "url": "http://127.0.0.1:4041/uploads/images/269814394620c7efe2ba561644986110.png",
                    "name": "269814394620c7efe2ba561644986110.png",
                    "deleted_at": null,
                    "created_at": "2022-02-16T04:35:10.000000Z",
                    "updated_at": "2022-02-16T04:35:10.000000Z"
                },
                "member_type": {
                    "id": 1,
                    "name": "General"
                },
                "leader": null,
                "token": "16ac5372844c27664c5fc3d15d71cac5e567a16fe937aaba46f2c15431b1aea6"
            }
        ],
        "total": 2
    }
}
 */


/**
 * @api {post} /api/admin/member/create 02. Create 
 * @apiVersion 1.0.0
 * @apiName Create
 * @apiGroup Member
 *
 * @apiHeader {String} Authorization Access token. Ex: 'Bearer ' + token
 * @apiHeader {String} Accept 'application/json'
 * @apiHeader {String} Language    Language token for requesting API.
 *
 * @apiParam {string} name
 * @apiParam {string} name_km
 * @apiParam {string} phone
 * @apiParam {string} [phone2]
 * @apiParam {string} [phone3]
 * @apiParam {string} code
 * @apiParam {Integer} member_type_id
 * @apiParam {Integer} [leader_id]
 * @apiParam {string} [leader_note]
 * @apiParam {string} [banner_size]
 * @apiParam {Boolean} is_active
 * @apiParam {Boolean} [is_mark_location_by_company]
 * @apiParam {Base64Image} [certificate_image]
 * @apiParam {Base64Image} [image]
 * @apiParam {string} address
 * @apiParam {Float} [latitude]
 * @apiParam {Float} [longitude]
 * @apiParam {string} [owner_address]
 * @apiParam {Float} [owner_latitude]
 * @apiParam {Float} [owner_longitude]
 * @apiParam {Date} [birthday]
 * @apiParam {string} [id_card_number]
 * 
 @apiExample {curl} Example usage:
{
    "name" : "Sokchea",
    "name_km" : "សុខជា",
    "phone": "0966523286",
    "phone2": "0966523284",
    "phone3": "09665232865",
    "code": "0966523286",
    "member_type_id": 1,
    "leader_id": 1,
    "leader_note": "Note",
    "banner_size": "2048 x 2048",
    "is_mark_location_by_company": 1,
    "is_active": 1,
    "image": "{{base64Image}}",
    "gender": "male",
    "address": "Phnom Penh",
    "birthday": "1999-01-01",
    "id_card_number": "DSB16273T",
    "latitude": 15.125467654,
    "longitude": 104.12345678,
    "owner_address": "Phnom Penh1",
    "owner_latitude": 15.125467653,
    "owner_longitude": 104.12345679
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
 * @api {get} /api/admin/member/show/{id} 03. Show
 * @apiVersion 1.0.0
 * @apiName Show
 * @apiGroup Member
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
        "name": "Sokchea",
        "name_km": "សុខជា",
        "phone": "0966523283",
        "phone2": "0966523284",
        "phone3": "09665232865",
        "code": "0966523283",
        "gender": "male",
        "owner_address": "Phnom Penh1",
        "owner_latitude": "15.12546765",
        "owner_longitude": "104.12345679",
        "member_type_id": 1,
        "leader_note": "Note",
        "leader_id": 1,
        "banner_size": "2048 x 2048",
        "is_mark_location_by_company": 1,
        "birthday": "1999-01-01",
        "id_card_number": "DSB16273T",
        "is_active": 1,
        "status": null,
        "media": {
            "id": 2,
            "url": "http://127.0.0.1:4041/uploads/images/1708413839620c7f0b24d5d1644986123.png",
            "name": "1708413839620c7f0b24d5d1644986123.png",
            "deleted_at": null,
            "created_at": "2022-02-16T04:35:23.000000Z",
            "updated_at": "2022-02-16T04:35:23.000000Z"
        },
        "address": "Phnom Penh",
        "latitude": "15.12546765",
        "longitude": "104.12345678"
    }
}
 */

/**
 * @api {post} /api/admin/member/update/{id} 04. Update
 * @apiVersion 1.0.0
 * @apiName Update
 * @apiGroup Member
 *
 * @apiHeader {String} Authorization Access token. Ex: 'Bearer ' + token
 * @apiHeader {String} Accept 'application/json'
 * @apiHeader {String} Language    Language token for requesting API.
 *
 * @apiParam {string} name
 * @apiParam {string} name_km
 * @apiParam {string} phone
 * @apiParam {string} [phone2]
 * @apiParam {string} [phone3]
 * @apiParam {string} code
 * @apiParam {Integer} member_type_id
 * @apiParam {Integer} [leader_id]
 * @apiParam {string} [leader_note]
 * @apiParam {string} [banner_size]
 * @apiParam {Boolean} is_active
 * @apiParam {Boolean} [is_mark_location_by_company]
 * @apiParam {Base64Image} [certificate_image]
 * @apiParam {Base64Image} [image]
 * @apiParam {string} address
 * @apiParam {Float} [latitude]
 * @apiParam {Float} [longitude]
 * @apiParam {string} [owner_address]
 * @apiParam {Float} [owner_latitude]
 * @apiParam {Float} [owner_longitude]
 * @apiParam {Date} [birthday]
 * @apiParam {string} [id_card_number]
 * 
 @apiExample {curl} Example usage:
{
    "name" : "Sokchea",
    "name_km" : "សុខជា",
    "phone": "0966523286",
    "phone2": "0966523284",
    "phone3": "09665232865",
    "code": "0966523286",
    "member_type_id": 1,
    "leader_id": 1,
    "leader_note": "Note",
    "banner_size": "2048 x 2048",
    "is_mark_location_by_company": 1,
    "is_active": 1,
    "image": "{{base64Image}}",
    "gender": "male",
    "address": "Phnom Penh",
    "latitude": 15.125467654,
    "longitude": 104.12345678,
    "birthday": "1999-01-01",
    "id_card_number": "DSB16273T",
    "owner_address": "Phnom Penh1",
    "owner_latitude": 15.125467653,
    "owner_longitude": 104.12345679
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
 * @api {post} /api/admin/member/delete/{id} 05. Delete
 * @apiVersion 1.0.0
 * @apiName Delete
 * @apiGroup Member
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

/**
 * @api {post} /api/admin/member/activate/{id} 06. activate
 * @apiVersion 1.0.0
 * @apiName activate
 * @apiGroup Member
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

/**
 * @api {post} /api/admin/member/postpone/{id} 07. postpone
 * @apiVersion 1.0.0
 * @apiName postpone
 * @apiGroup Member
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

/**
 * @api {post} /api/admin/member/terminate/{id} 08. terminate
 * @apiVersion 1.0.0
 * @apiName terminate
 * @apiGroup Member
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

/**
 * @api {get} /api/admin/member/detail/{id} 09. Detail
 * @apiVersion 1.0.0
 * @apiName Detail
 * @apiGroup Member
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
        "name": "Sokchea",
        "name_km": "សុខជា",
        "phone": "0966523286",
        "phone2": "0966523284",
        "phone3": "09665232865",
        "code": "0966523286",
        "gender": "male",
        "owner_address": "Phnom Penh1",
        "owner_latitude": "15.12546765",
        "owner_longitude": "104.12345679",
        "leader_note": "Note",
        "banner_size": "2048 x 2048",
        "is_mark_location_by_company": 1,
        "is_active": 1,
        "status": null,
        "birthday": null,
        "id_card_number": null,
        "media": {
            "id": 1,
            "url": "http://127.0.0.1:4041/uploads/images/269814394620c7efe2ba561644986110.png",
            "name": "269814394620c7efe2ba561644986110.png",
            "deleted_at": null,
            "created_at": "2022-02-16T04:35:10.000000Z",
            "updated_at": "2022-02-16T04:35:10.000000Z"
        },
        "member_type": {
            "id": 1,
            "name": "General"
        },
        "leader": null,
        "address": "Phnom Penh",
        "latitude": "15.12546765",
        "longitude": "104.12345678"
    }
}
 */

/**
 * @api {get} /api/admin/member/list/reactivate 10. List Reactivate
 * @apiVersion 1.0.0
 * @apiName ListReactivate
 * @apiGroup Member
 *
 * @apiHeader {String} Authorization Access token. Ex: 'Bearer ' + token
 * @apiHeader {String} Accept 'application/json'
 * 
 * @apiParam {String} type              values: 7day, 3day, today, late
 * @apiParam {String} [search]
 * @apiParam {AnyString} [export]       if have value will resonse all data without limit
 * @apiParam {Integer} [offset]
 * @apiParam {Integer} [limit]
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
                "name": "Sokchea",
                "name_km": "សុខជា",
                "code": "0966523286",
                "phone": "0966523286",
                "reactivate_date": "2022-03-31",
                "postponed_date": "2022-03-31"
            }
        ],
        "total": 2
    }
}
 */
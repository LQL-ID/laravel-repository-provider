<?php

namespace App\Helpers;
use App\Helpers\DateTime;
use App\Helpers\Generate;
use Illuminate\Support\Facades\Request;

class APIResponse
{
    public static function json($json,$code = SUCCESS_CODE){
        switch ($code) {
            case FAILURE_CODE:
                return APIResponse::withoutData([
                    'code' => FAILURE_CODE,
                    'status' => (Request::ip() == '127.0.0.1') ? FAILURE_STATUS : $json['error_uuid'],
                    'message' => ( isset($json['message']) ? $json['message'] : [] ),

                    ]
                );
            break;
            case FORBIDDEN_CODE:
                return APIResponse::withoutData([
                    'code' => FORBIDDEN_CODE,
                    'status' => FORBIDDEN_STATUS,
                    'message' => ( isset($json['message']) ? $json['message'] : [] ),
                    ]
                );
            break;
            case BAD_REQUEST_CODE:
                return APIResponse::withoutData([
                    'code' => BAD_REQUEST_CODE,
                    'status' => BAD_REQUEST_STATUS,
                    'message' => ( isset($json['message']) ? $json['message'] : [] ),
                    ]
                );
            break;
            case UNPROCESSABLE_ENTITY_CODE:
                return APIResponse::withoutData([
                    'code' => UNPROCESSABLE_ENTITY_CODE,
                    'status' => UNPROCESSABLE_ENTITY_STATUS,
                    'message' => ( isset($json['message']) ? $json['message'] : [] ),
                    ]
                );
            break;
            case UNAUTHORIZED_CODE:
                return APIResponse::withoutData([
                    'code' => UNAUTHORIZED_CODE,
                    'status' => UNAUTHORIZED_STATUS,
                    'message' => ( isset($json['message']) ? $json['message'] : [] ),
                    ]
                );
            break;
            case NOT_FOUND_CODE:
                return APIResponse::withoutData([
                    'code' => NOT_FOUND_CODE,
                    'status' => NOT_FOUND_STATUS,
                    'message' => ( isset($json['message']) ? $json['message'] : [] ),
                    ]
                );
            break;
            case NO_CONTENT_CODE:
                return APIResponse::withoutData([
                    'code' => NO_CONTENT_CODE,
                    'status' => NO_CONTENT_STATUS,
                    'message' => ( isset($json['message']) ? $json['message'] : [] ),
                    ]
                );
            break;
            default:
            return APIResponse::withData([
                'code' => SUCCESS_CODE,
                'status' => SUCCESS_STATUS,
                'message' => ( isset($json['message']) ? $json['message'] : [] ),
                'data' => ( isset($json['data']) ? $json['data'] : [] ),
                'pagination' => ( isset($json['pagination']) ? $json['pagination'] : [] )
                ]
            );
        break;

    }
}

public static function defaultCodeResponse($input){
    if ( $input['error'] == null ) {
        if ( $input['data'] == null) {
            $code = NOT_FOUND_CODE;
        }else{
            $code = SUCCESS_CODE;
        }
    } else if( is_int($input['error']) ) {
        $code = $input['error'];
    }else {
        $code = FAILURE_CODE;
    }
    return $code;
}

public static function withData($json)
{
    return response()->json(
        [
            'meta' =>
            [
                'code' => $json['code'],
                'status' => $json['status'] ,
                'message' =>  $json['message'],
                'request_time' => Generate::responseTime(),
                'request_date' => DateTime::getDateTime()
            ],
            'data' => $json['data'] ,
            'pagination' => $json['pagination']
        ],$json['code']
    );
}

public static function withoutData($json)
{
    return response()->json(
        [
            'meta' =>
            [
                'code' => $json['code'],
                'status' => $json['status'],
                'message' => $json['message'],
                'request_time' => Generate::responseTime(),
                'request_date' => DateTime::getDateTime()
            ],
        ],
        $json['code']
    );
}


}



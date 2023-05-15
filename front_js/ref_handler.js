class RefHandler {

    refUserId;

    GetRefUserIdFromCookie(){
        return cookie_handler.getCookie('ref_user_id');
    }


    SetRefCookieUserId(userId){
        console.log("ref_user_id set:" + userId);
        cookie_handler.setCookie('ref_user_id', userId);
    }
}

ref_handler = new RefHandler();
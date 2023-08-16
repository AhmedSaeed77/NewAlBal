
var AVUtil = function(){

    var ajaxErrorHandler = function(err){
        if(err.status == 401){
            swal({
                text: 'You are not Authorized !',
                type: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                confirmButtonClass: "btn font-weight-bold btn-light"
            }).then(function () {
                window.location.reload();
            });
            return;
        }
        KTApp.unblockPage();
        swal({
            text: err,
            type: "error",
            buttonsStyling: false,
            confirmButtonText: "Ok, got it!",
            confirmButtonClass: "btn font-weight-bold btn-light"
        }).then(function () {
            KTApp.scrollTop();
        });
    };

    var redirectionConfirmation = function (url){

        swal({
            title: "Are you sure ?",
            // text: "You will not be able to recover this post!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, Confirm",
            cancelButtonText: "No, cancel",
        }).then(function (isConfirm) {
            console.log(isConfirm);
            if (isConfirm.dismiss != 'cancel') {
                window.location.href =  url;
            } else {
                swal("Don\'t Worry !", "You still here.", "success");
            }
        });

    }


    var deleteConfirmation = function(url, callback){
        swal({
            title: "Are you sure?",
            // text: "You will not be able to recover this post!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it",
            cancelButtonText: "No, cancel",
        }).then(async function(isConfirm) {
            if (isConfirm.dismiss != 'cancel') {
                swal("Deleted!", "Item have been deleted.", "success");
                await callback(url);
            } else {
                swal("Cancelled", "Item is safe.", "error");
            }
        });

    };

    return {
        redirectionConfirmation,
        deleteConfirmation,
        ajaxErrorHandler,
    };
};


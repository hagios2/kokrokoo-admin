
$(document).ready(function () {
 //  acceptButtonClicked();
   blockUserButtonClicked();
   unblockButtonClicked();
   hideApprovedUserNotification();

// approve users
    $('body').on('click', '.accept-user', function () {
        let  user_id = $(this).attr('data-id');
        let status  = $(this).attr('id');
        if (status == 'pending'){
            acceptUser(user_id);

        }
        else{
            $('#message').text('User already approved');
            $('#status').show();
            setTimeout(function () {
                $('#status').hide();
                $('#message').text('');

            },5000);

        }
    });


    //functions
    async  function acceptUser(user_id) {

        const acceptUser =  await swal({
            title: 'Approve user',
            text: 'Do you want to approve user?',
            type: 'info',
            showCancelButton: true,
            buttons: {
                cancel: {
                    text : 'Cancel',
                    value : null,
                    visible : true,
                    closeModal : true,
                },
                confirm: {
                    text : 'Yes,Confirm',
                    value : true,
                    visible : true,
                    closeModal: true,
                }
            },

            confirmButtonColor: '#E44032',
            // closeOnConfirm: true,
            dangerMode : true,
            icon : "warning"
        });

        if (acceptUser) {
            let formData = new FormData();
            formData.append('id', user_id);
            axios.post('/admin/user-account/accept', formData).then(function (res) {
                if (res.data === 'success') {
                    window.location.replace("http://localhost:8000/admin/users");
                } else {
                    swal("Error!", "We encounter an error processing request.Try again later!", "error");

                }
            });
        }
    }

    // unblock user function
    async  function unblockUsers(user_id) {

        const unblockUser =  await swal({
            title: 'Unblock user',
            text: 'Do you want to unblock user?',
            type: 'info',
            showCancelButton: true,
            buttons: {
                cancel: {
                    text : 'Cancel',
                    value : null,
                    visible : true,
                    closeModal : true,
                },
                confirm: {
                    text : 'Yes,Confirm',
                    value : true,
                    visible : true,
                    closeModal: true,
                }
            },

            confirmButtonColor: '#E44032',
            // closeOnConfirm: true,
            dangerMode : true,
            icon : "warning"
        });

        if (unblockUser) {
            let formData = new FormData();
            formData.append('id', user_id);

            axios.post('/admin/user-account/unblock', formData).then(function (res) {
                if (res.data === 'success') {
                    window.location.replace("http://localhost:8000/admin/users");
                } else {
                    swal("Error!", "We encounter an error processing request.Try again later!", "error");

                }
            });
        }
    }


    function unblockButtonClicked(){
        $('body').on('click', '.unblock-user', function () {
            let  user_id = $(this).attr('data-id');
            let status  = $(this).attr('id');

            if (status == 'active'){
                $('#message').text('User already active');
                $('#status').show();
                setTimeout(function () {
                    $('#status').hide();
                    $('#message').text('');

                },5000);

            }
            else if(status == 'pending'){
                $('#message').text('User  not approved ');
                $('#status').show();
                setTimeout(function () {
                    $('#status').hide();
                    $('#message').text('');

                },5000);

            }
            else{
                unblockUsers(user_id);

            }

        });
    }

    // block user function
    async  function blockUser(user_id) {

        const blockUser =  await swal({
            title: 'Block user',
            text: 'Do you want to block user?',
            type: 'info',
            showCancelButton: true,
            buttons: {
                cancel: {
                    text : 'Cancel',
                    value : null,
                    visible : true,
                    closeModal : true,
                },
                confirm: {
                    text : 'Yes,Confirm',
                    value : true,
                    visible : true,
                    closeModal: true,
                }
            },

            confirmButtonColor: '#E44032',
            // closeOnConfirm: true,
            dangerMode : true,
            icon : "warning"
        });

        if (blockUser) {
            let formData = new FormData();
            formData.append('id', user_id);

            axios.post('/admin/user-account/block', formData).then(function (res) {
                if (res.data === 'success') {
                    window.location.replace("http://localhost:8000/admin/users");
                } else {
                    swal("Error!", "We encounter an error processing request.Try again later!", "error");

                }
            });
        }
    }

    function blockUserButtonClicked(){
        $('body').on('click', '.block-user', function () {
            let  user_id = $(this).attr('data-id');
            let status  = $(this).attr('id');

            if (status == 'inactive'){
                $('#message').text('User already block');
                $('#status').show();
                setTimeout(function () {
                    $('#status').hide();
                    $('#message').text('');

                },5000);

            }

            else{
                blockUser(user_id);

            }

        });
    }

   function  hideApprovedUserNotification(){
       setTimeout(function () {
           $("#approve-user").fadeOut();
       },5000);
    }



});







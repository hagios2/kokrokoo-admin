
$(document).ready(function () {
   blockAdminButtonClicked();
   unblockAdminButtonClicked();



    // unblock user function
    async  function unblockAdmin(user_id) {

        const unblockUser =  await swal({
            title: 'Unblock user',
            text: 'Do you want to unblock admin?',
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

            axios.post('/admin/admin-account/unblock', formData).then(function (res) {
                if (res.data === 'success') {
                    window.location.replace("http://localhost:8000/admin/manage/admins");
                } else {
                    swal("Error!", "We encounter an error processing request.Try again later!", "error");

                }
            });
        }
    }


    function unblockAdminButtonClicked(){
        $('body').on('click', '.unblock-admin', function () {
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
                unblockAdmin(user_id);

            }

        });
    }

    // block user function
    async  function blockAdmin(user_id) {

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

            axios.post('/admin/admin-account/block', formData).then(function (res) {
                if (res.data === 'success') {
                    window.location.replace("http://localhost:8000/admin/manage/admins");
                } else {
                    swal("Error!", "We encounter an error processing request.Try again later!", "error");

                }
            });
        }
    }

    function blockAdminButtonClicked(){
        $('body').on('click', '.block-admin', function () {
            let  user_id = $(this).attr('data-id');
            let status  = $(this).attr('id');

            if (status == 'inactive'){
                $('#message').text('Admin already block');
                $('#status').show();
                setTimeout(function () {
                    $('#status').hide();
                    $('#message').text('');

                },5000);

            }

            else{
                blockAdmin(user_id);

            }

        });
    }


});







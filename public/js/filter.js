$(document).ready(function () {


    $('#selected-media').on('click',function () {
        let media_id =  $('#selected-media').val();
        $('#hide-table').show();
     //   tests(media_id);
         getMediaSubs();
    });


    function getMediaSubs(){
        let table = $('#laravel_datatable');
        table.DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "filter",
             //   params : {'id': id},
                type: 'GET',
                dataType : 'json'
            },
            columns: [
                {data: 'id', name: 'id', 'visible': false},
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'subscription_id', name: 'subscription_id'},
                {data: 'title', name: 'title'},
                {data: 'start', name: 'start'},
                {data: 'end', name: 'end'},
                // {data: 'created_ad_data', name: 'created_ad_data'},
                {data: 'status', name: 'status'},
                {data: 'file_name', name: 'file_name'},
                //  {data: 'file_type', name: 'file_type'},
                {data: 'file_size', name: 'file_size'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at',adjust:true, name: 'updated_at'},
                {data: 'action', name: 'action', orderable: false},
            ],
            order: [[0, 'desc']],

        });

        //hide datatable search box and label
        $('input[type=search]').hide();
        $('#laravel_datatable_filter label').hide();

        // key up event for custom search
        oTable = table.DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
        $('#search').keyup(function () {
            oTable.search($(this).val()).draw();
        });
    }

    function tests(id){
        $.ajax({
            method : 'GET',
            url : 'filter',
        //    params: {'id': id},
            dataType : "json",
            success : function (res) {
                console.log(res);
            },
            error : function (res) {
                console.log(res.data);
            }
        });
    }



});
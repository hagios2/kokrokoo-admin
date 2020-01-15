$(document).ready(function () {
    let table = $('#laravel_datatable');
    table.DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "subscriptions",
            type: 'GET',
        },
        columns: [
            {data: 'id', name: 'id', 'visible': false},
            {data: 'media_house_id', name: 'media_house_id', 'visible': false},
            {data: 'client_id', name: 'client_id'},
            {data: 'name', name: 'name', 'visible': false},
        //    {data: 'rate_card_title_id', name: 'rate_card_title_id','visible' : false},
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'subscription_id', name: 'subscription_id'},
            {data: 'title', name: 'title'},
            {data: 'start', name: 'start'},
            {data: 'end', name: 'end'},
           // {data: 'created_ad_data', name: 'created_ad_data'},
            {data: 'status', name: 'status'},
            {data: 'file_name', name: 'file_name'},
          {data: 'durations', name: 'durations'},
            {data: 'media_house', name: 'media_house'},
            {data: 'rate_card_title', name: 'rate_card_title'},
            {data: 'created_at', name: 'created_at'},
            // {data: 'updated_at',adjust:true, name: 'updated_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        order: [[0, 'desc']],
        "pageLength": 25,
        columnDefs: [{
            targets: [1,2,3],
            searchable: true,
            visible: false
        }]

    });


//hide datatable search box and label
    $('input[type=search]').hide();
    $('#laravel_datatable_filter label').hide();



    // key up event for custom search
    oTable = table.DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
    $('#search').keyup(function () {
        oTable.search($(this).val()).draw();


    });


});
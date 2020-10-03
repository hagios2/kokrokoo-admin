$(document).ready(function () {
    let table = $('#laravel_datatable');
    table.DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "transactions",
            type: 'GET',
        },
        columns: [
            {data: 'id', name: 'id', 'visible': false},
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            // {data: 'client_id', name: 'client_id'},
            {data: 'transaction_id', name: 'transaction_id'},
            {data: 'subscription_id', name: 'subscription_id'},
            // {data: 'media_house_id', name: 'media_house_id'},
            {data: 'phone', name: 'phone'},
            {data: 'service', name: 'service'},
            {data: 'amount', name: 'amount'},
            {data: 'transaction_status', name: 'transaction_status'},
            {data: 'payment_source', name: 'payment_source'},
            {data: 'created_at', name: 'created_at'},
            {data: 'created_at', name: 'updated_at'},

            // {data: 'action', name: 'action', orderable: false},
        ],
        order: [[0, 'desc']],
        pageLength : 25,
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
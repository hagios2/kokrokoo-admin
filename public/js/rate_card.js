$(document).ready(function () {
    let table = $('#laravel_datatable');
    table.DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "ratecards",
            type: 'GET',
        },
        columns: [
            { data: 'id', name: 'id', 'visible': false },
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'rate_card_id', name: 'rate_card_id' },
            { data: 'media_house', name: 'media_house' },
            { data: 'rate_card_title', name: 'rate_card_title' },
            // {data: 'media_house_id', name: 'media_house_id'},
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', adjust: true, name: 'updated_at' },
            { data: 'action', name: 'action', orderable: false },
        ],
        order: [[0, 'desc']],
         oLanguage: { sProcessing: "Processing ... <img src='/images/loading.gif' style='height: 20px; width: 20px;padding:20px;' />" }

    });


    //hide datatable search box and label


    // key up event for custom search
    oTable = table.DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
    $('#search').keyup(function () {
        oTable.search($(this).val()).draw();
    });
    // $('input[type=search]').hide();
    // $('#laravel_datatable_filter label').hide();
    //  $('#media_id').hide();

});
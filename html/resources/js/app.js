$(document).ready(function(){
    if($(".module_table").length > 0) {
        $(document).on('click', '.module_table .throw_off_filters', function(e) {
            e.preventDefault();

            let inputs_row = $(this).next().next().children(".table_column").find("input,select,.switcher");

            inputs_row.each(function(index,item){
                $(this).val("");
            });

            reloadTable($(this).next().next().children(".table_column"), $(this).parent().parent(), 1);
        });

        $(document).on('change', '.module_table input, .module_table select', function (e) {
            e.preventDefault();
            let table_wrapper = $(this).closest(".data_table").parent();

            reloadTable($(this).closest(".table_column"), table_wrapper);
        });

        $(document).on('click', '.data_table .pagination span', function(e){
            e.preventDefault();
            let table_wrapper = $(this).closest(".data_table").parent();

            reloadTable(table_wrapper.find(".table_column"), table_wrapper, $(this).attr('data-page'));
        });
    }
});


function reloadTable(table_column, table_wrapper, page = false){
    let inputs_row = table_column.find("input,select,.switcher");
    let current_model = table_column.prev(".model_name").val();
    let table_id = table_wrapper.attr('id').split('arrilot-widget-container-');
    let inputs = {};
    let filters = {};
    let curr_page = 1;
    table_wrapper.find('._loader_wrapper').css('display', 'block');
    table_column.css('opacity','0');

    if(page){
        curr_page = page;
    }else{
        curr_page = table_wrapper.find(".pagination").prev().val();
    }

    inputs_row.each(function(index,item){
        let data_key = $(this).attr("name");
        let data_value = $(this).val();
        let data_type = $(this).attr("data-type");

        inputs[data_key] = data_type;
        filters[data_key] = data_value;
    });

    let data = {
        "id": table_id[1],
        "skip_encryption": 1,
        "name": "App\\Widgets\\Admin\\TableWidget",
        "params": "[" + JSON.stringify({
            "model": current_model,
            "curr_page": curr_page,
            "fields": inputs,
            "filter": filters
        }) + "]",
    };

    $.ajax({
        url: "/arrilot/load-widget",
        type: "GET",
        data: data,
        success:function(response){
            table_wrapper.find('._loader_wrapper').css('display', 'none');
            table_column.css('opacity','1');
            if(response) {
                table_wrapper.html(response);
            }
        },
    });
}

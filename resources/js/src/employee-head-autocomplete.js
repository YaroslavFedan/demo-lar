var parent_name = $('#parent_name');
var parent_id = $("#parent_id");
var error_message = $('#ajax-error');

parent_name.autoComplete({
    resolver: 'custom',
    minLength:3,
    events: {
        search: function (qry, callback){
            error_message.empty();
            parent_id.val(null);
            var employee_id = $("#employee_id").val();

            axios.get(`${window.baseUrl}/employee/head/${qry}/${employee_id}` )
                .then( ({data}) =>{
                    callback(data.data)
                })
                .catch( (error) => {
                    parent_id.val(null);
                    error_message.empty().append(error.response.data.message);
                })
        }
    }
});
parent_name.on('change', function () {
    parent_id.val(null);
});
parent_name.on('autocomplete.select', function (evt, item) {
    if(typeof item !== typeof undefined){
        parent_id.val(item.value);
    }
});


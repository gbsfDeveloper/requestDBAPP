function showData(array){
    // array - must be an array type
    $('#databaseResults').empty();
    if(Array.isArray(array)){
        array.forEach(element => {
            $('#databaseResults').append($(`<pre class="hidden"><code>${JSON.stringify(element,null,'\t')}</code></pre>`));
        });
    }
    else{
        $('#databaseResults').append($(`<p>${array}</p>`))
    }
}

function showQuery(query){
    $('#dataBaseQuery').empty();
    $('#dataBaseQuery').append($(`<b>QUERY</b><pre><code>${query}</code></pre>`));
}

function search(param,query){
    $.get( `./request.php?searchParam=${param}&query=${query}`).done(function(data) {
        array_dataContent = JSON.parse(data)['data']; 
        query_dataContent = JSON.parse(data)['query'];
        showQuery(query_dataContent);
        showData(array_dataContent);
    });
}

$(document).ready(function(){
    search_input = $('#inputSearch');
    search_boton = $('#buttonSearch');
    
    search_boton.on("click",function(){
        search_radioInput = $('input[name="queryType"]:checked');
        search(search_input.val(),search_radioInput.val());
    });
    search_input.on("keyup",function(event){
        if(event.keyCode === 13){
            search_radioInput = $('input[name="queryType"]:checked');
            search(search_input.val(),search_radioInput.val());  
        }
    });
});
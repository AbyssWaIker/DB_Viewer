function key_pressed(event) 
{
    // Number 13 is the "Enter" key on the keyboard
    if (event.keyCode === 13) 
    {
        // Cancel the default action, if needed
        event.preventDefault();
        // Trigger the button element with a click
        $('#active').blur();
    }
}

function activate(element)
{
    $(element).attr('id', 'active')
    element.addEventListener("keydown", key_pressed);
}

function update_in_db(element)
{
    /*классы 0)имя таблицы sql 1) имя изменяемой колнки 2)id 3)имя колонки id*/
    $.ajax(
    {
        url:'php/update.php',
        type:'post',
        data:
        {
            value: element.innerText,
            table_name:element.classList[0],
            column_name: element.classList[1],
            id: element.classList[2],
            id_column_name:element.classList[3]
        },
        success:function(php_results)
        {
            console.log(php_results);
            element.removeEventListener("keydown", key_pressed);
            $('#active').removeAttr('id');;
        }
    });
}

function check_table() 
{
    var checkbox = document.getElementById('table_names');
    var valueSelected = checkbox.value;
    var limit = document.getElementById('limit').value;
    $.ajax(
    {
        url:'php/table.php',
        type:'post',
        data:
        {
            table_name:valueSelected,
            limit:limit
        },
        success:function(php_results)
        {
            $('#here_goes_the_table').html(php_results);
        }
    });
};

function exit()
{
    window.location ="php/exit.php";
}

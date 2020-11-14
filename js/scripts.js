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

function show_new_row()
{
    new_row = document.getElementById("rowToInsert");
    if(new_row.style.visibility == "collapse") new_row.style.visibility = "visible";
    else new_row.style.visibility = "collapse";
}

function hide_new_row()
{
    new_row = document.getElementById("rowToInsert");
    new_row.style.visibility = "collapse";
}

function notify(message) 
{
  if (!("Notification" in window)) 
  {
    alert(message);
    return;
  }

  if (Notification.permission === "default") 
  {
    Notification.requestPermission();
  }

  if (Notification.permission === "granted") 
  {
    var notification = new Notification(message);
  }
}


function update_in_db(element)
{
    /*классы 0)имя таблицы sql 1) имя изменяемой колонки 2)id 3)имя колонки id*/
    $.ajax(
    {
        url:'php/sql/update.php',
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
            notify(php_results);
            element.removeEventListener("keydown", key_pressed);
            $('#active').removeAttr('id');
            check_table();
        }
    });
}
 
function  delete_in_db(element)
{
    /*классы 0)имя таблицы sql 1) имя изменяемой колонки 2)id 3)имя колонки id*/
    $.ajax(
    {
        url:'php/sql/delete.php',
        type:'post',
        data:
        {
            table_name:element.classList[0],
            id: element.classList[1],
            id_column_name:element.classList[2]
        },
        success:function(php_results)
        {
            notify(php_results);
            element.removeEventListener("keydown", key_pressed);
            check_table();
        }
    });
}

function insert_in_db()
{
    /*классы 0)имя таблицы sql 1)имя колонки 2) insert*/
    var elements = Array.from(document.getElementsByClassName("insert"));
    var ArrayLength = elements.length;
    var values = elements.map(function (el) { return el.innerText; });
    var tablenames = elements.map(function (el) { return el.classList[1]; });
    
    $.ajax(
    {
        url:'php/sql/insert.php',
        type:'post',
        data:
        {
            table_name:elements[0].classList[0],
            ArrayLength:ArrayLength,
            tablenames:tablenames,
            insert_values:values
        },
        success:function(php_results)
        {
            notify(php_results);
            check_table();
        }
    });
}

function exit()
{
    window.location ="php/exit.php";
}

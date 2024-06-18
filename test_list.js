let table_header = '<table id="tableres"><thead><tr><td>Id</td><td>Имя</td><td>Фамилия</td><td>Номер телефона</td></tr></thead>';
$("#block").append(table_header);

    function query(beginStr) { 
        //функция делает ajax-запрос и выводит 100 строк таблицы 
        $.ajax({
        method: 'post',
        url: '/././cp/content/control/test_script.php',
        data: {
            beginStr: beginStr,
            numberStrs: 100
        },
            success: function(result) {
                // console.log(result); 
            let rowsHtml = '';
                $.each(result, function(index,value) {
                    rowsHtml += '<tr>';
                    rowsHtml += '    <td>' + value['id'] + '</td>';
                    rowsHtml += '    <td>' + value['name'] + '</td>';
                    rowsHtml += '    <td>' + value['surname'] + '</td>';
                    rowsHtml += '    <td>' + value['phone'] + '</td>';
                    rowsHtml += '</tr>';
                });
            let html = '<table id="tableres"><tbody>' + rowsHtml + '</tbody></table>';
            $("#block").append(html);
            
                },
        error: function(xhr) {
            alert(`Error ${xhr.status} error text ${xhr.statusText}`);
        }
        });
    }

    $(document).ready(function(){
        let bS = 1;
        query(1);
        // console.log(bS);
        
    let $element = $('#block');
    $(window).scroll(function() {
        let scroll = $(window).scrollTop() + $(window).height();
    
        let offset = $element.offset().top + $element.height();
    
            if (scroll > offset) {
            // console.log(bS);
            bS+=100;
            query(bS);   
            }
 
        });
   });
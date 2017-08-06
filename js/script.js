window.onload = function() {
	$("#searchData").submit(function(e) {

    var url = "get-contract.php";

    $.ajax({
           type: "POST",
           url: url,
           data: $("#searchData").serialize(),
           success: function(responseData)
           {
                var jsonResponse =  JSON.parse(responseData);
                if (jsonResponse.number == null) {
                    $('#error_text').css('visibility', 'visible');
                    $('#error_text').text('Нет такого контракта в базе!');
                    $('#table_info').css('visibility', 'hidden');
                }
                else {
                    $('#error_text').css('visibility', 'hidden');
                    $('#table_info').css('visibility', 'visible');
                    $('#name_customer').text(jsonResponse.name_customer);
                    $('#company').text(jsonResponse.company);
                    $('#number').text(jsonResponse.number);
                    $('#date_sign').text(jsonResponse.date_sign);
                    $('#services_name').html(jsonResponse.services_name.replace(/,/g, "<br>"));
                }
                
           }
         });

    e.preventDefault();
    });
}
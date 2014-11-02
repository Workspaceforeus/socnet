    function sendGift(flag,url)
    {
    	jQuery.ajax({
                    url: url,
                    dataType: "html", //Тип данных 
                    success: function(response) { //Если все нормально
                    document.getElementById('qw').innerHTML = response;
                    alert($("#qw").text());
                }
                });
	
    }

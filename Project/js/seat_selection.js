$(document).ready(function () {

    var postHolder = $("#postHolder");
    var tickets = [];

    var seatsArray = new Array(20);
    for (var i = 0; i < seatsArray.length; i++)
        seatsArray[i] = false;


    var screen = parseInt($("#screen_Id").val());
    var date = $("#date").val();
    var time = $("#time").val();
    



    $.getJSON("get_seats.php?screen=" +screen + "&date=" + date + "&time=" + time, function (array) {
        for (var i = 0; i < array.length; i++) {
            //alert(array[i].seats);
            var arry = array[i].seats.split(',');
            for (var j = 0; j < arry.length; j++)
                seatsArray[parseInt(arry[j])] = true;
        }


        var seats = '';
        for (var i = 0; i < seatsArray.length; i++) {
            seats = seats + `<div class='seat ${seatsArray[i] ? 'seat-occupied' : 'seat-vacant'}' id=${i} data-seatid='${i}'></div>`;

        }
        //innerHTML end k lie bcha k rkha hai... marks kte to kte, navabi na ghte
        postHolder.html(
            `
        <div class='ti' style='background-image:url(uploads/screen3.jfif);'>
             </div>
  
        <div class='seat-container container'>
            ${seats}
            </div>
         `);

        $("#btnClick").click(function () {
            alert("Clicked");
            alert("Booking Completed!");
            //postTickets(tickets, t_id, sid);
        });


        var seatElement = [];
        for (var i = 0; i < seatsArray.length; i++) {
            seatElement.push(document.getElementById(i));
            seatElement[i].addEventListener('click', (evt) => {

                let id = evt.target.id;
                if (!seatsArray[id]) 
                {
                        if (tickets.includes(id)) {
                        // Deselect
                        tickets = tickets.filter(i => i != id);
                        seatElement[id].classList.remove('seat-hold');
                    } else
                        if(tickets.length == parseInt($("#seats").val()))
                        alert("You can't book more than "+$("#seats").val()+" tickets!");
                    else
                    {
                        // Select
                        tickets.push(id);
                        seatElement[id].classList.add('seat-hold');
                    }
                    //alert(tickets);
                }

            });
        }


    });
    
    //--------------------
    $("#cancel").click(function(){
        var movie = $("#movie").val();
        window.location = "show_time.php?movie="+movie;
    });
    //-----------------------------------
    
    $("#book").click(function(){
        
        if(tickets.length < parseInt($("#seats").val()))
            alert("Kindly Select "+$("#seats").val()+" tickets!");
        else
        {
            window.location="checkout.php?screen_Id="+screen+"&date="+date+"&time="+time+"&tickets="+tickets.join();
                
        }
        
    });
});

$(document).ready(function() {
                
                var postHolder = $("#postHolder");
                var tickets = [];
            
                var seatsArray = new Array(20);
                for (var i = 0; i < seatsArray.length; i++)
                    seatsArray[i] = false;


                var screen = 1;
                var date = "2021-05-04";
                var time = "13:00";


                $.getJSON("get_seats.php?screen=" + screen + "&date=" + date + "&time=" + time, function(array) {
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
        <div class='ti'>
                 <h3>SCREEN</h3>
             </div>
        <div class='seat-container'>
            ${seats}
        <button type="button" class="btn btn-outline-danger">EXIT</button>
            </div>
        <div class='btnn'>
        <button type="button" class="btn btn-success" id="btnClick">Book Tickets</button>
         </div>
         `);
                        
                        $("#btnClick").click(function(){
                            alert("Clicked");
                            alert("Booking Completed!");
                            //postTickets(tickets, t_id, sid);
                        });
                    
                       
                        var seatElement = [];
                        for (var i = 0; i < seatsArray.length; i++) {
                            seatElement.push(document.getElementById(i));
                            seatElement[i].addEventListener('click', (evt) => {

                                let id = evt.target.id;
                                if (!seatsArray[id]) {
                                    if (tickets.includes(id)) {
                                        // Deselect
                                        tickets = tickets.filter(i => i != id);
                                        seatElement[id].classList.remove('seat-hold');
                                    } else {
                                        // Select
                                        tickets.push(id);
                                        seatElement[id].classList.add('seat-hold');
                                    }
                                    alert(tickets);
                                }

                            });
                        }
                    

                });
        });
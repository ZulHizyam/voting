$(document).ready(function(){
    
    $.ajax({
        url : "http://localhost/latest/admin/homepage.php",
        type : "GET",
        success : function(data) {
            console.log(data);
            
            var votes = {
                Voted : [],
                Not_Voted : [],
            };
            
            var len = data.length;
            
            for (var i = 0; i < len; i++) {
                if (data[i].vote == "Voted") {
                    votes.Voted.push(data[i].votes);
                }
                else if (data[i].vote == "Not Voted") {
                    votes.Not_Voted.push(data[i].votes);
                }
            }
            
            var ctx1 = $("#doughnut-chartcanvas-1");
            var ctx2 = $("#doughnut-chartcanvas-2");
            var data1 = {
                labels : ["Voted"],
                datasets : [
                    {
                        label : "Voted",
                        data : votes.Voted,
                        backgroundColor : [
                            "#DEB887",
                        ],
                        bordorColor : [
                            "#CDA776",
                        ],
                        borderWidth : [1]
                    }
                ]
            };
             var data2 = {
                labels : ["Not Voted"],
                datasets : [
                    {
                        label : "Not Voted",
                        data : votes.Not_Voted,
                        backgroundColor : [
                            "#A9A9A9",
                        ],
                        bordorColor : [
                            "#989898",
                        ],
                        borderWidth : [1]
                    }
                ]
            };
            var chart1 = new Chart(ctx1,{
                type : "doughnut",
                data : data1
            }
                                  )
        },
        
        error : function(data) {
            
            console.log(data);
        }
    });
})
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="jquery-cdn.js"></script>
    <style>
        body{
            padding-top:50px;
            padding-left:50px;
        }
        #date-selection{
            padding-left:200px;
        }
    </style>
 </head>
 <body>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <div class="container-fluid">

                <a class="btn btn-info"  style="background:pink">Restaurant Reservation Table</a>


                <span class="navbar-toggler-icon"></span>

                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home">Home</a>
                    </li>
                    <?php if(isset($_SESSION['name'])){ ?>
                        <li class="nav-item">
                        <a class="nav-link" href="logout">Logout</a>
                    </li>
                    <button><?php echo $_SESSION['name']?></button>
                    <?php } else {?>
                    <li class="nav-item">
                        <a class="nav-link" href="index">Login</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="register">Register</a>
                    </li>
                    <?php } ?>
                </ul>


                <!-- <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->
                </div>
            </div>
            </nav>
        <form>  
            <select id="reservation-type">
                <option hidden>SELECT</option>
                <option value="full-day">Full Day</option>
                <option value="half-day">Half Day</option>
                <option value="custom">Custom</option>
            </select>

            <?php   if(isset($_SESSION['id'])){ ?>
            <input type="text" name="sessionId" id="session" value="<?php echo $_SESSION['id']; ?>" hidden >
                <?php } ?>
            <div id="date-selection">
                <!-- Date and time fields will be displayed here -->
            </div>
                    
            <div style="padding-top:20px;padding-left:20%">
                <button id="book-table">Book Table</button>
            </div>
        </form>

        <div>
            <h3>Reservation Details</h3>

            <h4>Custom</h4>
            <?php $run2 = $this->conn->query("select * from custom where user_id = '$_SESSION[id]'"); $fetch = $run2->fetch_object();?>
            <li><?php echo $fetch->rType  ?></li>
            <li><?php echo $fetch->date  ?></li>
            <li><?php echo $fetch->time  ?></li>


            <h4>Half Day</h4>
            <?php $run3 = $this->conn->query("select * from halfday where user_id = '$_SESSION[id]'"); $fetch = $run3->fetch_object();?>
            <li><?php echo $fetch->rType  ?></li>
            <li><?php echo $fetch->half  ?></li>
            <li><?php echo $fetch->date  ?></li>
            <li><?php echo $fetch->time  ?></li>


            <h4>Full Day</h4>
            <?php $run4 = $this->conn->query("select * from fullday where user_id = '$_SESSION[id]'"); $fetch = $run4->fetch_object();?>
            <li><?php echo $fetch->reserveType  ?></li>
            <li><?php echo $fetch->date  ?></li>
            <li><?php echo $fetch->time  ?></li>
        </div>





    <script>
        $(document).ready(function() 
        {
            $('#reservation-type').on('change', function()
            {
                var selection = $(this).val();

                if(selection === 'full-day') 
                {
                    showDateSelection('date');
                } 
                else if(selection === 'half-day') 
                {
                    showDateSelection('half-day');
                } 
                else if(selection === 'custom') 
                {
                    showDateSelection('date-time');
                }
            });
        });

        $('#book-table').on('click', function(e) {
            e.preventDefault();
            var reservationType = $('#reservation-type').val();
            var date = $('#date').val();
            var time = $('#time').val();
            var half = $('#half-day').val();
            var session = $('#session').val();
            // console.log(reservationType)
            if(reservationType == "full-day")
            {
                $.ajax({
                    url:'fullDay',
                    type:'post',
                    data:{
                        rType:reservationType,
                        dat:date,
                        session:session
                    },
                    success:function(e)
                    {
                        alert(e);
                    }
                })
            }
            if(reservationType == "half-day")
            {
                $.ajax({
                    url:'halfDay',
                    type:'post',
                    data:{
                        rType:reservationType,
                        half:half,
                        date:date,
                        session:session
                    },
                    success:function(e){
                        alert(e);
                    }
                })
            }
            if(reservationType == "custom")
            {
                $.ajax({
                    url:'custom',
                    type:'post',
                    data:{
                        rType:reservationType,
                        date:date,
                        time:time,
                        session:session
                    },
                    success:function(e){
                        alert(e);
                    }
                })
            }

            
            // console.log(half)

            // Send request to backend using AJAX
            // // $.ajax({
            // // type: 'POST',
            // // url: 'data',
            // // data: {
            // //     reservationType: reservationType,
            // //     date: date,
            // //     timed: time,
            // //     half: half
            // // },
            // // success: function(response) {
            // //     alert(response);
            // //     // $('table').html(response);
                
            // // }
            // });
        });
    

        function showDateSelection(type) 
        {
            var html = '';
            if (type === 'date') 
            {
                html += '<input type="date" id="date">';
            } 
            else if(type === 'half-day') 
            {
                html += '<input type="date" id="date"><select id="half-day"><option value="morning">Morning</option><option value="afternoon">Afternoon</option></select>';
            } 
            else if(type === 'date-time') 
            {
                html += '<input type="date" id="date"><select id="time"><option hidden>Select Date and Time</option><option value="8:00 to 9:30">8:00 to 9:30</option><option value="9:30 to 11:00">9:30 to 11:00</option><option value="3:00 to 4:30">3:00 to 4:30</option><option value="4:30 to 6:00">4:30 to 6:00</option></select>';
            }
            $('#date-selection').html(html);
        }

    </script>

 </body>
 </html>
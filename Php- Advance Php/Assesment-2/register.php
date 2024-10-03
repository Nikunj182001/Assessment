<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration Form</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

      <script src="assets\js\jquery-cdn.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  min-height: 100vh;
  background: #4070f4;
}
.hello{
  display: flex;
  justify-content: center;
  position: absolute;
  top: 10%;
  left: 30%;
}

.wrapper{
  position: relative;
  max-width: 430px;
  width: 100%;
  background: #fff;
  padding: 34px;
  border-radius: 6px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.2);
}
.wrapper h2{
  position: relative;
  font-size: 22px;
  font-weight: 600;
  color: #333;
}
.wrapper h2::before{
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 28px;
  border-radius: 12px;
  background: #4070f4;
}
.wrapper form{
  margin-top: 30px;
}
.wrapper form .input-box{
  height: 52px;
  margin: 18px 0;
}
form .input-box input{
  height: 100%;
  width: 100%;
  outline: none;
  padding: 0 15px;
  font-size: 17px;
  font-weight: 400;
  color: #333;
  border: 1.5px solid #C7BEBE;
  border-bottom-width: 2.5px;
  border-radius: 6px;
  transition: all 0.3s ease;
}
.input-box input:focus,
.input-box input:valid{
  border-color: #4070f4;
}
form .policy{
  display: flex;
  align-items: center;
}
form h3{
  color: #707070;
  font-size: 14px;
  font-weight: 500;
  margin-left: 10px;
}
.input-box.button input{
  color: #fff;
  letter-spacing: 1px;
  border: none;
  background: #4070f4;
  cursor: pointer;
}
.input-box.button input:hover{
  background: #0e4bf1;
}
form .text h3{
 color: #333;
 width: 100%;
 text-align: center;
}
form .text h3 a{
  color: #4070f4;
  text-decoration: none;
}
form .text h3 a:hover{
  text-decoration: underline;
}
header{
    padding-top: 20px;
    height:120px;
    background-color: white;
    margin-bottom: 20px;
}
nav{
   display: flex;
}
.nav{
    display:flex;
    gap: 20px;
    padding-left:150px;
    padding-top:20px;
    
}
.text{
    text-decoration: none;
    color: black;
    font-weight: 10hv;
    
}
.r1{
  height: 100%;
  width: 100%;
  outline: none;
  padding: 0 15px;
  font-size: 17px;
  font-weight: 400;
  color: #333;
  border: 1.5px solid #C7BEBE;
  border-bottom-width: 2.5px;
  border-radius: 6px;
  transition: all 0.3s ease;
  padding-top: 10px;
  padding-bottom:10px;
  margin-bottom:15px;
}

    </style>
   </head>
<body>

      
  <div class="hello">
  <div class="wrapper">
    <h2>Registration</h2>
        <form method="post" enctype="multipart/form-data" >
                <div class="input-box">
                  <input type="text" placeholder="Enter your name" name="name" id="name"><!-- pattern="[a-zA-Z]{3,5}" -->
                </div>

                <div class="input-box">
                  <input type="text" placeholder="Enter your email" name="email" id="email">
                </div>

                <div class="input-box">
                  <input type="password" placeholder="Create password" name="password" id="p1" >
                </div>


                
                <div class="policy">
                  <input type="checkbox" >
                  <h3>I accept all terms & condition</h3>
                </div>

                <div class="input-box button">
                  <input type="submit" value="Register Now" name="submit" id="submit">
                </div>

                <div class="text">
                  <h3>Already have an account? <a href="index">Login now</a></h3>
                </div>

        </form>
  </div>
  </div>

  


  
</body>
</html>
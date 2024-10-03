<?php 
        include 'model.php';

        class Control extends Model
        {
            function __construct()
            {
                session_start();
                Model::__construct();

                $url = $_SERVER['PATH_INFO'];

                switch($url)
                {
                    case "/index":
                        if(isset($_POST['submit']))
                        {
                            $name = $_POST['uname'];
                            $pass = $_POST['upass'];

                            if(isset($_POST['chk']))
                            {
                                setcookie('email',$name,time()+10);
                                setcookie('pass',$pass,time()+10);

                            }

                            $data = array('email'=>$name,'password'=>$pass);

                            $run1 = $this->select('user',$data);
                            $fetch = $run1->fetch_object();
                            if(!empty($fetch))
                            {
                                
                                $dbname = $fetch->name;
                                $dbid = $fetch->id;

                                $_SESSION['name'] = $dbname;
                                $_SESSION['id'] = $dbid;


                                echo "<script>
                                    alert('welcome......!');
                                    window.location.href = 'home';
                                </script>";

                                
    
                            }
                            else
                            {
                                echo "<script>
                                alert('wrong email - password......!');
                                window.location.href = 'index';
                            </script>";
                            }
                        }
                        include 'index.php';
                        break;

                    case "/logout":
                        unset($_SESSION['name']);
                        unset($_SESSION['id']);
                        header('location: index');
                        break;

                    case "/register":

                        if(isset($_POST['submit']))
                        {
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $pass = $_POST['password'];

                            $data = array('name'=>$name,'email'=>$email,'password'=>$pass);

                            $this->insert('user',$data);
                        }
                        include 'register.php';
                        break;

                    case "/home":
                        include 'home.php';
                        break;

                    case "/fullDay":
                        if(isset($_POST['session']))
                        {
                            $session = $_POST['session'];
                            $rtp = $_POST['rType'];
                            $dat = $_POST['dat'];
                            $time = time();

                            $run1 = $this->conn->query("select * from fullday where user_id = '$session' and date = '$dat'");

                            if(mysqli_num_rows($run1) > 0)
                            {
                                echo "Already Selected";
                            }
                            else
                            {
                                $sql = "insert into fullDay(date,reserveType,time,user_id) values('$dat','$rtp','$time','$session')";
                                $run = $this->conn->query($sql);
                                if($run)
                                {
                                    echo "Inserted Successfully";
                                }
                                else
                                {
                                    echo "Error";
                                }
                            }
                           
                        }
                        else
                        {
                            echo "login first";
                        }
                        break;

                    case "/halfDay":
                            if(isset($_POST['session']))
                            {

                                $session = $_POST['session'];
                                $rtp = $_POST['rType'];
                                $half = $_POST['half'];
                                $dat = $_POST['date'];
                                $time = time();

                                $run1 = $this->conn->query("select * from halfday where user_id='$session' and half='$half' and date='$dat'");

                                if(mysqli_num_rows($run1) > 0)
                                {
                                    echo "You Already Selected";
                                }
                                else
                                {
                                    $sql = "insert into halfday(half,rType,date,time,user_id) values('$half','$rtp','$dat','$time','$session')";
                                    $run = $this->conn->query($sql);
                                    if($run)
                                    {
                                        echo "Your Record Inserted";
                                    }
                                    else
                                    {
                                        echo "Error";
                                    }
                                }
                                
                            }
                            else
                            {
                                echo "login first";
                            }
                            break;

                        case "/custom":
                                if(isset($_POST['session']))
                                {

                                    $session = $_POST['session'];
                                    $rtp = $_POST['rType'];
                                    $date = $_POST['date'];
                                    $times = $_POST['time'];
                                    $time = time();

                                    $run1 = $this->conn->query("select * from custom where user_id = '$session' and date = '$date' and times = '$times'");

                                    if(mysqli_num_rows($run1) > 0)
                                    {
                                        echo "Already Selected";
                                    }
                                    else
                                    {
                                        $sql = "insert into custom(rType,date,times,time,user_id) values('$rtp','$date','$times','$time','$session')";
                                        $run = $this->conn->query($sql);
                                        if($run)
                                        {
                                            echo "Inserted Successfully";
                                        }
                                        else
                                        {
                                            echo "Error";
                                        }
                                    }
                                    
                                }
                                else
                                {
                                    echo "login first";
                                }
                                break;
                }
            }
        }
        $obj = new Control;
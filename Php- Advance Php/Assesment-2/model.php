<?php
        class Model
        {
            public $conn = "";

            function __construct()
            {
                $this->conn = new mysqli('localhost','root','','ajax_assesment');
                if(!$this->conn)
                {
                    echo "error.......!";
                }
            }
            function insert($tbl,$data)
            {
                $arr_key = array_keys($data);
                $key = implode(',',$arr_key);

                $arr_val = array_values($data);
                $val = implode("','",$arr_val);

                $sql = "insert into $tbl($key) values('$val')";

                // echo $sql;exit();
                $run = $this->conn->query($sql);

                if(!$run)
                {
                    echo "error.....!";exit();
                }


            }
            function select($tbl,$data)
            {
                $key = array_keys($data);
                $val = array_values($data);

                $sql = "select * from $tbl where 1 = 1 ";

                $count = count($data);
                $j = 0;
                while($j<$count)
                {
                    $sql.= "and $key[$j] = '$val[$j]' ";
                    $j++;
                }

                $run = $this->conn->query($sql);

                // echo $run; exit();

                if(!empty($run))
                {
                    return $run;
                }
                

            }
        }
<?php

use LDAP\Result;

    class connec
    {
        public $username= "root";
        public $password= "";
        public $server_name= "localhost";
        public $db_name= "247cinema";

        public $conn;

        function __construct()
        {
            $this->conn = new mysqli($this->server_name, $this->username,$this->password, $this->db_name);
            if($this->conn->connect_error) {
                die("Connection Failed");
            }
            // else{
            //     echo "connected  ";
            // }
        }   

        function select_all($table_name){

            $sql = "SELECT * FROM $table_name";
            $result = $this->conn->query($sql);
            return $result;
        }
        //Hiển thị chi tiết phim
        function select_by_query($query){
            $result = $this ->conn->query($query);
            return $result;
        }

        function select_show_dt(){

            $sql = "SELECT 247cinema.show.id, 247cinema.show.show_date, 247cinema.show.ticket_price, 247cinema.show.no_seat, movie.name AS 'movie_name', show_time.time, cinema.name FROM 247cinema.show, movie, show_time, cinema WHERE 247cinema.show.movie_id = movie.id AND 247cinema.show.show_time_id = show_time.id AND 247cinema.show.cinema_id = cinema.id;";
            $result = $this->conn->query($sql);
            return $result;
        }
        
        function select_show_dt1(){

            $sql = "SELECT 247cinema.movie.id, industry.industry_name AS 'industry_name'
            FROM 247cinema.movie, industry
            WHERE 247cinema.movie.industry_id = industry.id;";
            $result = $this->conn->query($sql);
            return $result;
        }
        function select_show_dt2(){

            $sql = "SELECT DISTINCT genre.genre_name AS 'genre_name' 
            FROM movie,genre
            WHERE 247cinema.movie.genre_id = genre.id;";
            $result = $this->conn->query($sql);
            return $result;
        }
        function select_show_dt3(){

            $sql = "SELECT DISTINCT language.language_name AS 'language_name' 
            FROM movie,language
            WHERE 247cinema.movie.lang_id = language.id;";
            $result = $this->conn->query($sql);
            return $result;
        }

        function select_movie($table_name, $date){

            $sql = "SELECT * FROM $table_name WHERE rel_date > $date";
            $result = $this->conn->query($sql);
            return $result;
        }
        function select_nowmovie($table_name, $date){

            $sql = "SELECT * FROM $table_name WHERE rel_date < $date";
            $result = $this->conn->query($sql);
            return $result;
        }

        function select($table_name, $id){

            $sql = "SELECT * FROM $table_name where id = $id";
            $result = $this->conn->query($sql);
            return $result;
        }
        function find($table_name, $tukhoa){

            $sql = "SELECT * FROM movie WHERE name LIKE '%".$tukhoa."%'";
            $result = $this->conn->query($sql);
            return $result;
        }

        function select_login($table_name, $email){

            $sql = "SELECT * FROM $table_name where email = '$email'";
            $result = $this->conn->query($sql);
            return $result;
        }
        

        function insert($query, $msg){ 
            if($this->conn->query($query) === TRUE){
                // echo "inserted";
                echo '<script>alert("'.$msg.'");</script>';
            }else{
                echo '<script>alert('.$this->conn->error.');</script>';
                // echo $this->conn->error;
            }

        }

        function update($query, $msg){
            if($this->conn->query($query)===TRUE){
                echo '<script> alert("'.$msg.'");</script>';
            }else{
                echo '<script> alert('.$this->conn->error.');</script>';
            }

        }

        function delete($table_name, $id){

            $query = "Delete from $table_name WHERE id = $id";

            if($this->conn->query($query)===TRUE){
               
                echo '<script> alert("Record Deleted");</script>';
            }else{
                echo '<script> alert('.$this->conn->error.');</script>';
               
            }

        }

        function insert_lastid($query){
            if($this->conn->query($query)===TRUE){
                $last_id=$this->conn->insert_id;
            }else{
                echo '<script> alert("'.$this->conn->error.'");</script>';
            }

            return $last_id;
        }


    }   
?>
<?php

include ('database.php');

class News{

    public $con;

    function __construct()
    {
        $this->con = new database();

    }


    public function newsSearch($data)
    {
        $query  = "SELECT tblecatagory.id catid, tblecatagory.catagoryname Catagoryname, tblepost.* 
                    FROM tblepost
                    INNER JOIN tblecatagory ON tblepost.catagory_id = tblecatagory.id
                    WHERE tblepost.post_tittle LIKE '%$data%'";
       $results = $this->con->sql->query($query);

        $row = $results->fetch_all();


        return $row;



    }

    public function newsComment($data){

        $errors = array();

        $postid = $data['postid'];

        if (empty(!$data['Name'])){
            $commenterName = $data['Name'];
        }else{
            $errors['emptyname']= "*";
        }
        if (empty(!$data['Email'])){

            if (filter_var($data['Email'],FILTER_VALIDATE_EMAIL)){
                $commenterEmail = $data['Email'];
            }else{
                $errors['InvaildEmail']= "*";
            }


        }else{
            $errors['emptyEmail']= "*";
        }
        if (empty(!$data['massage'])){

            if (strlen($data['massage']) >= 6){
                $commenterMassage = trim($data['massage']);
            }else{
                $errors['lowerMassage']= "*";
            }


        }else{
            $errors['emptyMassage']= "*";
        }



        if (count($errors) == 0){
            $query = "INSERT INTO tblecmt VALUES (NULL,$postid,'$commenterName','$commenterEmail','$commenterMassage',NULL)";
            $success = $this->con->sql->query($query);
            if ($success){
                return 1;
            }else{
                return 0;
            }


        }else{
            return $errors;
        }

    }

    function repyComment($data){

        $errors = array();

        $postid = $data['postid'];
        $commentid = $data['commentid'];

        if (empty(!$data['Name'])){
            $replyerName = $data['Name'];
        }else{
            $errors['emptyname']= "*";
        }

        if (empty(!$data['Email'])){

            if (filter_var($data['Email'],FILTER_VALIDATE_EMAIL)){
                $replyEmail = $data['Email'];
            }else{
                $errors['InvaildEmail']= "*";
            }


        }else{
            $errors['emptyEmail']= "*";
        }
        if (empty(!$data['text'])){

            if (strlen($data['text']) >= 6){
                $replyMassage = trim($data['text']);
            }else{
                $errors['lowertext']= "*";
            }


        }else{
            $errors['emptytext']= "*";
        }



        if (count($errors) == 0){
            $query = "INSERT INTO tblereply VALUES (NULL,$postid,$commentid,'$replyerName','$replyEmail','$replyMassage',NULL)";
            $success = $this->con->sql->query($query);
            if ($success){
                return 1;
            }else{
                return 0;
            }

        }else{
            return $errors;
        }

    }


    function __destruct()
    {
        $this->con->sql->close();
    }
}

?>
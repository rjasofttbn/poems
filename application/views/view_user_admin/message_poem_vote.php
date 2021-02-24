
<!-- sort message !-->
        <?php
        $message = $this->session->userdata('message');
//echo '-----'.$message;
        if (isset($message)) {
            echo $message;
            $this->session->unset_userdata('message');
        }
        if (isset($_SESSION['exception'])) {
            echo $_SESSION['exception'];
            unset($_SESSION['exception']);
        }
        ?>



<!--/*<div id="poem_edit"> 
   Vote insert complete -------
</div>!-->
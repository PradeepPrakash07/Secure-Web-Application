<?php
    if(isset($_POST["submit_address"]))
    {
        $address = $_POST["address"];
        ?>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2381.6828970906145!2d-6.245181484929932!3d53.34893238221974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48670e8cd86e97e7%3A0x6d51b774ee7fa935!2sNational%20College%20of%20Ireland!5e0!3m2!1sen!2sie!4v1670758177984!5m2!1sen!2sie" width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <?php
    }
?>

<form method = "POST">
    <p>
        <input type = "text" name = "address" placeholder = "Enter address">
    </p>
    <input type = "submit" name = "submit_address">
</form>


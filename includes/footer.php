<?php
if(isset($_POST['emailsubscibe']))
{
$subscriberemail=$_POST['subscriberemail'];
$sql ="SELECT SubscriberEmail FROM tblsubscribers WHERE SubscriberEmail=:subscriberemail";
$query= $dbh -> prepare($sql);
$query-> bindParam(':subscriberemail', $subscriberemail, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<script>alert('Already Subscribed.');</script>";
}
else{
$sql="INSERT INTO  tblsubscribers(SubscriberEmail) VALUES(:subscriberemail)";
$query = $dbh->prepare($sql);
$query->bindParam(':subscriberemail',$subscriberemail,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Subscribed successfully.');</script>";
}
else
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}
}
?>

<footer>
  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-md-6">
          <h6>kuhusu sisi</h6>
          <ul>


          <li><a href="page.php?type=aboutus">kuhusu sisi</a></li>
            
            <li><a href="page.php?type=privacy">Usiri</a></li>
          <li><a href="page.php?type=terms">Vigezo vya matumizi</a></li>
               <li><a href="admin/">Sehem ya msimamizi</a></li>
          </ul>
        </div>

        <div class="col-md-3 col-sm-6">
          <h6>Kujiunga na barua pepe</h6>
          <div class="newsletter-form">
            <form method="post">
              <div class="form-group">
                <input type="email" name="subscriberemail" class="form-control newsletter-input" required placeholder="Weka barua pepe" />
              </div>
              <button type="submit" name="emailsubscibe" class="btn btn-block">Kujiunga <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </form>
            <p class="subscribed-text">*Tunatuma Taarifa za wakati kwa wateja wetu waliojiunga.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-push-6 text-right">
          <div class="footer_widget">
            <p>Ungana na sisi:</p>
            <ul>
              <li><a href="https://code-projects.org/"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
              <li><a href="https://code-projects.org/"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
              <li><a href="https://code-projects.org/"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
              <li><a href="https://code-projects.org/"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
              <li><a href="https://code-projects.org/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-md-pull-6">
          <p class="copy-right">Copyright &copy; 2021 Design corner . Imeletwa kwenu na <a>  Michael O,Sammy N,Joseph A,Faaustine f, Alice M</a></p>
        </div>
      </div>
    </div>
  </div>
</footer>

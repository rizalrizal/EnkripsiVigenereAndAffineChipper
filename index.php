<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enkripsi Vigenere Chiper Dan Caesar Chiper</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="assets/css/custom.css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="">Enkripsi Vigenere Chiper Dan Affine Chiper</a>
    </div>
  </div>
</nav>
<div class="container" style="padding-top: 20px;">
<!-- Ganti Gambar Disini -->
<img src="assets/image/header.png" width="100%" alt="Image Can't Load">
<ul class="nav nav-tabs">
  <li <?php if(isset($_POST["submitenkripsi"]) || !isset($_POST["submitdekripsi"])) echo "class='active';"; ?>><a data-toggle="tab" href="#enkripsi">Enkripsi</a></li>
  <li <?php if(isset($_POST["submitdekripsi"])) echo "class='active';"; ?>><a data-toggle="tab" href="#dekripsi">Dekripsi</a></li>
</ul>

<div class="tab-content">
  <div id="enkripsi" class="tab-pane fade <?php if(isset($_POST['submitenkripsi']) || !isset($_POST['submitdekripsi'])) echo 'in active'; ?>">
    <h1><strong>Enkripsi Vigenere Chiper Dan Affine Chiper</strong></h1>
    <form method="post" action="<?php  echo $_SERVER['PHP_SELF']; ?>">
    <div class="panel panel-default">
    <table class="table table-bordered">
        <tr>
            <td><b>PLAIN TEXT</b></td>
            <td><textarea name="plaintextenkripsi" class="form-control" rows="5" required="required"><?php echo isset($_POST['plaintextenkripsi']) ? $_POST['plaintextenkripsi'] : '' ?></textarea></td>
        </tr>
        <tr>
            <td><b>KEY</b></td>
            <td><input style="width:200px;" type="text" name="keyenkripsi" class="form-control" required="required" value="<?php echo isset($_POST['keyenkripsi']) ? $_POST['keyenkripsi'] : '' ?>"></td>
        </tr>
        <tr>
            <td><b>M</b></td>
            <td><input style="width:200px;" type="number" name="menkripsi" class="form-control" required="required" value="<?php echo isset($_POST['menkripsi']) ? $_POST['menkripsi'] : '' ?>"></td>
        </tr>
        <tr>
            <td><b>B</b></td>
            <td><input style="width:200px;" type="number" name="benkripsi" class="form-control" required="required" value="<?php echo isset($_POST['benkripsi']) ? $_POST['benkripsi'] : '' ?>"></td>
        </tr>
    </table>
    
    </div>
    <div class="row">
        <div class="col-md-12">
            <input class="btn btn-primary btn-block" name="submitenkripsi" type="submit" value="Submit">
        </div>
    </div>
    
    </form>
    <?php 
if(isset($_POST['submitenkripsi'])){
	require_once ('viginere.php');
	echo "<center><h2>Hasil Enkripsi</h2></center>";
	echo "<table class='table'>
		<tr>
			<td width='200px;'>Plain Text</td>
			<td>$_POST[plaintextenkripsi]</td>
		</tr>
		<tr>
			<td>Key</td>
			<td>$_POST[keyenkripsi]</td>
		</tr>
        <tr>
            <td>M</td>
            <td>$_POST[menkripsi]</td>
        </tr>
        <tr>
            <td>B</td>
            <td>$_POST[benkripsi]</td>
        </tr>
		<tr>
			<td>Hasil Enkripsi</td>
			<td>".Encipher($_POST['plaintextenkripsi'],$_POST['keyenkripsi'],$_POST['menkripsi'],$_POST['benkripsi'])."</td>
		</tr>
	  </table>";

}
 ?>
  </div>
  <div id="dekripsi" class="tab-pane fade <?php if(isset($_POST['submitdekripsi'])) echo 'in active'; ?>">
    <h1><strong>Dekripsi Vigenere Chiper Dan Affine Chiper</strong></h1>
    <form method="post" action="<?php  echo $_SERVER['PHP_SELF']; ?>">
    <div class="panel panel-default">
    <table class="table table-bordered">
        <tr>
            <td><b>ENKRIPSI TEXT</b></td>
            <td><textarea name="dekripsitextdekripsi" class="form-control" rows="5" required="required"><?php echo isset($_POST['dekripsitextdekripsi']) ? $_POST['dekripsitextdekripsi'] : '' ?></textarea></td>
        </tr>
        <tr>
            <td><b>KEY</b></td>
            <td><input style="width:200px;" type="text" name="keydekripsi" class="form-control" required="required" value="<?php echo isset($_POST['keydekripsi']) ? $_POST['keydekripsi'] : '' ?>"></td>
        </tr>
             <tr>
            <td><b>M</b></td>
            <td><input style="width:200px;" type="number" name="mdekripsi" class="form-control" required="required" value="<?php echo isset($_POST['mdekripsi']) ? $_POST['mdekripsi'] : '' ?>"></td>
        </tr>
        <tr>
            <td><b>B</b></td>
            <td><input style="width:200px;" type="number" name="bdekripsi" class="form-control" required="required" value="<?php echo isset($_POST['bdekripsi']) ? $_POST['bdekripsi'] : '' ?>"></td>
        </tr>
    </table>
    
    </div>
    <div class="row">
        <div class="col-md-12">
            <input class="btn btn-primary btn-block" name="submitdekripsi" type="submit" value="Submit">
        </div>
    </div>
    </form>
    <?php 
    if(isset($_POST['submitdekripsi'])){
	require_once ('viginere.php');
	echo "<center><h2>Hasil Dekripsi</h2></center>";
	echo "<table class='table'>
		<tr>
			<td width='200px;'>Enkripsi Text</td>
			<td>$_POST[dekripsitextdekripsi]</td>
		</tr>
		<tr>
			<td>Key</td>
			<td>$_POST[keydekripsi]</td>
		</tr>
        <tr>
            <td>M</td>
            <td>$_POST[mdekripsi]</td>
        </tr>
        <tr>
            <td>B</td>
            <td>$_POST[bdekripsi]</td>
        </tr>
		<tr>
			<td>Hasil Dekripsi</td>
			<td>".Decipher($_POST['dekripsitextdekripsi'],$_POST['keydekripsi'],$_POST['mdekripsi'],$_POST['bdekripsi'])."</td>
		</tr>
	  </table>";

	}
     ?>
  </div>
</div>
</div>
<div style="height: 150px">&nbsp</div>   
<div class="footer-bottom">
<div class="container">
                    <div class="row">
                        <div class="col-sm-6 ">
                            <div class="copyright-text">
                                <p>Copyright © 2019 | Asvarizal Filcha</p>
                            </div>
                        </div>
                        <div class="col-sm-6">                          
                            <ul class="social-link pull-right">
                                 <li><a href="https://www.facebook.com/Rizal.chan97" target="_blank"><span class="fab fa-facebook-f"></span></a></li>                       
                                <li><a href="https://www.instagram.com/asvarizal/" target="_blank"><span class="fab fa-instagram"></span></a></li>
                                <li><a href="https://www.linkedin.com/in/asvarizal-filcha-01652910a/" target="_blank"><span class="fab fa-linkedin-in"></span></a></li>
                                <li><a href="https://github.com/rizalrizal" target="_blank"><span class="fab fa-github"></span></a></li>
                                <li><a href="http://belajaraplikasi.com" target="_blank"><span class="fab fa-chrome"></span></a></li>
                            </ul>                           
                        </div>
                    </div>
                </div>
</div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="assets/js/jquery.min.js"></script>
 <!-- Latest compiled and minified JavaScript -->
<script src="assets/js/bootstrap.min.js"></script>   
</body>
</html>
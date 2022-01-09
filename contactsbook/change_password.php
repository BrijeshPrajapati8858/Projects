<?php 
include_once "common/header.php";

require_once 'includes/db.php';

if (empty($_SESSION['user'])){
	$currentPage = !empty($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
    $_SESSION['request_url']= $currentPage;
	header('loaction:' .SITEURL. "login.php");
	exit(); 
}


?>

<style>
.wrapper { padding-top:30px; }
</style>
<div class="row justify-content-center wrapper">
<div class="col-md-6"> 

         
<?php 
if (!empty($_SESSION['success'])){

?>
<div class="alert alert-success text-center">
	<ul>
		<?php
		echo $_SESSION['success']; ?>
	
	</ul>

</div>
<?php
unset ($_SESSION['success']);
	}
?>

<?php 
if (!empty($_SESSION['errors'])){

?>
<div class="alert alert-danger">
	<ul>
		<?php
		foreach ($_SESSION ['errors'] as $error){
			print '<li>' . $error .'</li>';

		}
		?>
	</ul>

</div>
<?php
unset ($_SESSION['errors']);
	}
?>


<div class="card">
<header class="card-header">
	<h4 class="card-title mt-2">Change Password</h4>
</header>
<article class="card-body">
<form method="POST" action="<?php echo SITEURL . '/actions/update_password_action.php'; ?>" enctype="multipart/form-data" >
	
	<div class="form-group">
		<label>Old Password</label>
		<input type="password" name="old_password" class="form-control" placeholder="Old Password" value="">
		<small class="form-text text-muted"></small>
	</div>
    <div class="form-group">
		<label>New Password</label>
		<input type="password" name="new_password" class="form-control" placeholder="New Password" value="">
		<small class="form-text text-muted"></small>
	</div>

    <div class="form-group">
		<label>Confirm Password</label>
		<input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" value="">
		<small class="form-text text-muted"></small>
	</div>


 
	 
    <div class="form-group">
        <button type="submit" name="update_profile" class="btn btn-success btn-block"> UPDATE</button>
    </div>   
                                         
</form>
</article> 

</div> 
</div> 

</div>



<?php
  include_once "common/footer.php";
?>

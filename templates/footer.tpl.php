</div></div> <!-- main-container end (starts in header) -->
<?php require_once("classes/changeFooter.class.php"); ?>

<div class="wrapper" id="wrapper-footer">

		<div class="col-md-12">
			  
			<div class="row">
				
				<div class="col-md-6">
					<p>About Clogstore</p>
					<p>  
						<?php foreach($loadFooter as $data){
							echo $data->aboutus;
						} ?>
					</p>
				</div>
					
				<div class="col-md-3">
					<p>Find us</p>
                    <p>Toffelvägen 1</p>
                    <p>342 60 MOHEDA</p>
                    <p>SWEDEN</p>
				</div>

                	<div class="col-md-3">
					<p>Contact us</p>
					<p>+46736357000</p>
                    <p>hej@clogstore.se</p>
				</div>
				
				
			</div>
				
				<div class="row">
				  		<div class="col-md-12">
                          <p>&copy; 2018 Clogstore AB<p>
						</div>
				</div> 
				
		</div> <!-- col end -->
</div> <!-- wrapper end -->


</body>
</html>
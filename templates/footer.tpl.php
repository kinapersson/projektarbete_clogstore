</div></div> <!-- main-container end (starts in header) -->
<?php require_once("classes/changeFooter.class.php"); ?>

<div class="col-md-12 wrapper" id="wrapper-footer">
			
			<div class="row">
				<div class="col-md-5">
					<h3>About Clogstore</h3>
					<h5>  
						<?php foreach($loadFooter as $data){
							echo $data->aboutus;
						} ?>
					</h5>
				</div>

				<div class="col-md-5">
					<h3>Contact us</h3>
						<h5>Phone: 08-123 123</h5>
						<h5>E-mail: info@clogstore.se</h5>
				</div>

				<div class="col-md-2">
					<h3>Follow us!</h3>
				</div>


			</div>

	<div class="col-md-12 text-right">
            <h5>&copy; 2018 Clogstore AB<h5>
	</div>	
				 				
</div> <!-- wrapper-footer end -->

</body>
</html>
<div id="wrapper">
		<main id="main" class="login-align-center">
			<div class="container">
				<div class="main-content-login ">
					<div class="form-login">
						<h2>Log in with your account</h2>
                                                  <?php echo $this->Flash->render('flash'); ?>
						<form action="#" method="POST" id="loginForm" class="clearfix">
			  				<div class="field">
                                                            <input type="text" value="" name="username" id="phone" placeholder="Enter Your Phone" />
			  				</div>
			  				<div class="field">
                                                            <input type="password" value="" name="password" id="password" placeholder="Password" />
			  				</div>
			  				<div class="inline clearfix">
                                                            <input type="submit" name="submit" value="Send Messager" class="btn-primary" value="Login"/>
						  		<p>Not a member yet? <a href="register">Register Now</a></p>
							  </div>
							
					  	</form>
					</div>
					<i class="icon-lock"></i>
				</div>
			</div>	
		</main><!-- .site-main -->
		
	</div>

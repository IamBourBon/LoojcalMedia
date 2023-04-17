<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	
	<link rel="stylesheet" href="/../../assest/ModalEmail/css/ionicons.min.css">
	<link rel="stylesheet" href="/../../assest/ModalEmail/css/style.css">
  </head>
  <body>
		<div class="modal fade" id="emailModal" tabindex="1" role="dialog" aria-labelledby="emailModal" aria-hidden="false">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header ftco-degree-bg">
		      </div>
		      <div class="modal-body pt-md-0 pb-md-5 text-center">
		      	<h2>You've Got Mail!</h2>
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<img src="/../../assest/ModalEmail/images/email.svg" alt="" class="img-fluid">
		      	</div>
		      	<h4 class="mb-2">We sent confirmation link to:</h4>
		      	<h3><?php echo $data['Email']?></h3>

		      </div>
		    </div>
		  </div>
		</div>
	
	<script type="text/javascript">
		$(window).on('load', function() {
			$('#emailModal').modal('show');
			setTimeout(() => {
				location.href = '/login';
			}, 5000);
		});
	</script>

	<script src="/../../assest/ModalEmail/js/jquery.min.js"></script>
    <script src="/../../assest/ModalEmail/js/popper.js"></script>
    <script src="/../../assest/ModalEmail/js/bootstrap.min.js"></script>
    <script src="/../../assest/ModalEmail/js/main.js"></script>
  </body>
</html>
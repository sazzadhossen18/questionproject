<!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
	<footer class="footer-area">
		<!--Footer Upper-->
		<div class="footer-content">
			<div class="container">
				<div class="row clearfix">
					<div class="col-md-8 col-md-offset-2">
						<div class="footer-content text-center no-padding margin-bottom-40">
							<div class="logo-footer">
								<img id="logo-footer" class="center-block" src="https://templates.scriptsbundle.com/knowledge/demo/images/logo-1.png" alt="">
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus illo vel dolorum soluta consectetur doloribus sit. Delectus non tenetur odit dicta vitae debitis suscipit doloribus. Lorem ipsum dolor sit amet, illo vel.</p>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<!--Footer Bottom-->
		<div class="footer-copyright">
			<div class="auto-container clearfix">
				<!--Copyright-->
				<div class="copyright text-center">Copyright 2016 &copy; All Rights Reserved</div>
			</div>
		</div>
	</footer>
	<!-- =-=-=-=-=-=-= JQUERY =-=-=-=-=-=-= -->
	<script src="https://templates.scriptsbundle.com/knowledge/demo/js/jquery.min.js"></script>
<script src="{{asset('public/assets/js/bootstrap.min.js')}}"></script>
	<!-- Template Core JS -->
	<script src="{{asset('public/assets/js/custom.js')}}"></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
$(function(){
    $(document).on('click','#delete',function(e){
    e.preventDefault();
    var link = $(this).attr("href");


    Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = link;
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})

});

});
</script>


	
</body>
</html>
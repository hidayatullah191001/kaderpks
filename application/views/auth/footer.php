<!-- Core scripts -->
<script src="<?=base_url('assets/template/')?>assets/js/pace.js"></script>
<script src="<?=base_url('assets/template/')?>assets/js/jquery-3.3.1.min.js"></script>
<script src="<?=base_url('assets/template/')?>assets/libs/popper/popper.js"></script>
<script src="<?=base_url('assets/template/')?>assets/js/bootstrap.js"></script>
<script src="<?=base_url('assets/template/')?>assets/js/sidenav.js"></script>
<script src="<?=base_url('assets/template/')?>assets/js/layout-helpers.js"></script>
<script src="<?=base_url('assets/template/')?>assets/js/material-ripple.js"></script>

<!-- Libs -->
<script src="<?=base_url('assets/template/')?>assets/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<!-- Demo -->
<script src="<?=base_url('assets/template/')?>assets/js/analytics.js"></script>

<script type="text/javascript">
	const togglePassword = document.querySelector('#togglePassword');
	const password = document.querySelector('#id_password');

	togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>
</body>

</html>
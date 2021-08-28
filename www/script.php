<script src="../js/travelblock.js"></script>
<script>
	document.addEventListener('DOMContentLoaded', function () {
	document.body.classList.add('loaded_hiding');
	window.setTimeout(function () {
		document.body.classList.add('loaded');
		document.body.classList.remove('loaded_hiding');
	}, 2000);
	});
</script>




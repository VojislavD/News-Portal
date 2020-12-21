<div id="loading" class="fixed flex items-center justify-center w-full h-screen bg-primary z-50">
	<style>
	.loader {
	  border-top-color: #3498db;
	  -webkit-animation: spinner 1.5s linear infinite;
	  animation: spinner 1.5s linear infinite;
	}

	@-webkit-keyframes spinner {
	  0% { -webkit-transform: rotate(0deg); }
	  100% { -webkit-transform: rotate(360deg); }
	}

	@keyframes spinner {
	  0% { transform: rotate(0deg); }
	  100% { transform: rotate(360deg); }
	}
	</style>

	<div class="loader ease-linear rounded-full border-8 border-t-8 border-gray-200 h-32 w-32"></div>
</div>
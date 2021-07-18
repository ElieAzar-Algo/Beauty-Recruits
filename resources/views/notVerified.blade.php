@isset($message)
		<div>
			<div id="alertMessage" class="alert alert-danger" role="alert" onclick="closeAlert(this.id)">
				{{$message}}
			  </div>
		</div>
        @endisset
        <script>
        function closeAlert(id)
			{
				document.getElementById(id).hidden = true;	
			}
		</script>
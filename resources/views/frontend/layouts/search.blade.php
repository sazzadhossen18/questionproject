<!-- =-=-=-=-=-=-= HOME =-=-=-=-=-=-= -->
	<div class="full-section search-section">
		<div class="search-area container">
			<h3 class="search-title">Have a Question?</h3>
			<p class="search-tag-line">If you have any question you can ask below or enter what you are looking for!</p>

			<form  method="GET" action="{{route('search.questions')}}" class="search-form clearfix" id="search-form">
				@csrf
				<input type="text" name="search" title="* Please enter a search term!" placeholder="Type your search terms here" class="search-term " autocomplete="off">
				<input type="submit" value="Search" class="search-btn">
			</form>


		</div>
  </div>
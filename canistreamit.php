<?php
	
	/*--------------------------------------
	search() - See if the movie exists at all
	@param str - the name of the movie
	@return - an array of results from the can i stream it database
	---------------------------------------*/
	function search( $__movie ) {

		$handle = curl_init();
			curl_setopt( $handle, CURLOPT_URL, 'http://www.canistream.it/services/search/?movieName=' . urlencode($__movie) );
			curl_setopt( $handle, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.94 Safari/537.36' );
			curl_setopt($handle, CURLOPT_RETURNTRANSFER, 1 );
			$result = curl_exec( $handle );
			curl_close( $handle );


		return json_decode($result);

	}



	/*--------------------------------------
	movie() - get details about a single movie, including streaming options
	@param int - the id of the movie
	@param str - media type (search | streaming | rental | purchase | dvd | xfinity )
	@return - 
	---------------------------------------*/	
	function movie( $__movie_id, $__media_type='streaming' ) {

		$handle = curl_init();
			//curl_setopt( $handle, CURLOPT_URL, 'http://www.canistream.it/services/query?movieId=553698e0f5f807816f44cb79&attributes=1&mediaType=streaming');
			curl_setopt( $handle, CURLOPT_URL, 'http://www.canistream.it/services/query?movieId=' . $__movie_id . '&attibutes=1&mediaType=' . $__media_type);
			curl_setopt( $handle, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.94 Safari/537.36' );
			curl_setopt( $handle, CURLOPT_RETURNTRANSFER, 1 );
			$result = curl_exec( $handle );
			curl_close( $handle );

		return json_decode( $result );

	}
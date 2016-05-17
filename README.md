PHP API for CanIStream.It
============

A simple file to search CanIStream.It

### Install

Just clone or download the file.

### Usage Examples

#### Movie Search
```php


// First, see if canistreamit.com can find your movie.
$movie_results = search("You've Got Mail");
	// the first one is often the right one. other results
	// are typically soundtrack titles
	// or alternate years
	$movie_obj = $movie_results[0]; 

		// these attributes are now available to you if the movie exists	
		$movie_id 		= $movie_obj->_id;
		$movie_actors 	= $movie_obj->actors;
		$movie_rating	= $movie_obj->rating;
		$movie_year		= $movie_obj->year;
		$movie_description = $movie_obj->description;
		$movie_title	= $movie_obj->title;
		$movie_image	= $movie_obj->image;

```

#### Media Services

```php
// Use the movie's ID to find which services
// are making it available for streaming or purchase.
$services = movie( $movie_id, $media_type='streaming' );
```
`$services` will now contain an object of options. Example:

#### Media Services Result
```php
object(stdClass)#13 (3) {
  ["hulu_movies"]=>
  string(57) "1ttp://www.canistream.it/link/go/572fe016f5f8071424cd139f"
  ["youtube_free"]=>
  string(57) "1ttp://www.canistream.it/link/go/570e602af5f807731cafe901"
  ["epix"]=>
  string(57) "1ttp://www.canistream.it/link/go/56ba62fff5f807936bfa7fa2"
}
```

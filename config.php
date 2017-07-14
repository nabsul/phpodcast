<?php
$title = 'Some Test Title';
$summary = 'my summary';
$description = 'my description';
$url = 'https://mydomain.com/location/index.php';
$author = 'Author Name';
$email = "x@x.com";
$language = 'en-us';
$imageUrl = 'https://mydomain.com/location/image.png';
$episodesDirectory = __DIR__ . '/episodes/';
$episodeBaseUrl = 'https://mydomain.com/location/episodes/';

$categories = [
	'Technology',
];

function getFileDate($file) {
	$date = date_create( "2017-07-14" );
	return date_format( $date, 'D, d M Y H:i:s' ) . ' GMT';
}

function getFileTitle($file) { return $file; }

// Get a list of files
$files = array_filter(scandir($episodesDirectory), function($file) {
	return '.' !== $file && '..' !== $file;
} );

$episodes = [];
foreach($files as $file) {
	$episodes[] = [
		'url' => $episodeBaseUrl . $file,
		'length' => filesize($episodesDirectory . $file),
		'title' => getFileTitle($file),
		'author' => $author,
		'subtitle' => 'some subtitle',
		'summary' => 'some summary',
		'date' => getFileDate($file),
	];
};

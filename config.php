<?php
$title = 'PHPodcast Test Podcast';
$summary = 'This is a test podcast using PHPodcast. Check out the code at httsp://github.com/nabsul/phpodcast.';
$description = 'This is a test podcast using PHPodcast. Check out the code at httsp://github.com/nabsul/phpodcast.';
$url = 'https://phpodcast.nabeel.us/';
$author = 'Nabeel Sulieman';
$email = "me@nabeel.us";
$language = 'en-us';
$imageUrl = 'https://phpodcast.nabeel.us/image.png';
$episodesDirectory = __DIR__ . '/audio/';
$episodeBaseUrl = 'https://phpodcast.nabeel.us/audio/';

$categories = [
	'Technology',
];

function getFileDate($file) {
	$date = date_create( "2017-07-14" );
	return date_format( $date, 'D, d M Y H:i:s' ) . ' GMT';
}

function getFileTitle($file) { 
	return "Episode with file name: $file"; 
}

// Get a list of files
$files = array_filter(scandir($episodesDirectory), function($file) {
	return '.' !== $file && '..' !== $file;
} );

$episodes = [];
foreach($files as $file) {
	$episodes[] = [
		'url' => $episodeBaseUrl . rawurlencode($file),
		'length' => filesize($episodesDirectory . $file),
		'title' => getFileTitle($file),
		'author' => $author,
		'subtitle' => 'some subtitle',
		'summary' => 'some summary',
		'date' => getFileDate($file),
	];
};

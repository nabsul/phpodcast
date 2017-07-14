<?php 
	header('Content-type: application/rss+xml; charset=utf-8');
	echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
?>
<rss xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" xmlns:atom="http://www.w3.org/2005/Atom" version="2.0">
	<channel>
		<atom:link href="<?php echo $url ?>" rel="self" type="application/rss+xml"></atom:link>
		<title><?php echo $title ?></title>
		<link><?php echo $url ?></link>
		<language><?php echo $language ?></language>
		<copyright><?php echo $author ?></copyright>
		<itunes:subtitle><?php echo $title ?></itunes:subtitle>
		<itunes:author><?php echo $author ?></itunes:author>
		<itunes:summary><?php echo $summary ?></itunes:summary>
		<description><?php echo $description ?></description>
		<itunes:owner>
			<itunes:name><?php echo $author ?></itunes:name>
			<itunes:email><?php echo $email ?></itunes:email>
		</itunes:owner>
		<itunes:image href="<?php echo $imageUrl ?>"></itunes:image>
		<itunes:explicit>no</itunes:explicit>
<?php foreach( $categories as $category ) { ?>
		<itunes:category text="<?php echo $category ?>"></itunes:category>
<?php } ?>
<?php foreach( $episodes as $episode ) { ?>
		<item>
			<title><?php echo $episode['title'] ?></title>
			<itunes:author><?php echo $author ?></itunes:author>
			<itunes:subtitle><?php echo $episode['subtitle'] ?></itunes:subtitle>
			<itunes:summary><?php echo $episode['summary'] ?></itunes:summary>
			<itunes:image href="<?php echo $episode['url'] ?>"></itunes:image>
			<enclosure url="<?php echo $episode['url'] ?>" length="<?php echo $episode['length'] ?>" type="audio/mp3"></enclosure>
			<guid><?php echo $episode['url'] ?></guid>
			<pubDate><?php echo $episode['date'] ?></pubDate>
		</item>
<?php } ?>
	</channel>
</rss>

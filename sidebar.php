<div class="col-md-3 col-sm-4 blog-sidebar">
	<h3>Featured Match</h3>
	<div class="top-news">
		<a href="#" class="btn green">
		<h4>oBsolete vs compLexity</h4>
		<span>CS:GO Open </span>
		<em>August 1st, 2014</em>
		</a>
	</div>

	<h3>Recent Matches</h3>
<?php 
	$recent_matches = $ez_frontend->get_recent_matches();
	$matches = 0; 
	if( $recent_matches ) {
		foreach( $recent_matches as $match ) { ?>
	<div class="top-news">
		<a href="view-result.php?league=<?php echo $match['league_id']; ?>&id=<?php echo $match['id']; ?>" class="btn <?php echo ( $matches % 2 == 0 ? 'grey-cararra' : 'grey' ); ?>">
		<h4 class="recent_matches_teams">
			<?php echo ( $match['winner'] == $match['home_id'] ? '<strong>' . $match['home'] . '</strong>' : '' . $match['home'] . '' ); ?>
			<em>versus</em>
			<?php echo ( $match['winner'] == $match['away_id'] ? '<strong>' . $match['away'] . '</strong>' : '' . $match['away'] . '' ); ?>
		</h4>
		<span><?php echo $match['league']; ?> </span>
		<small class="recent_matches_date"><?php echo date( 'F d, Y', strtotime( $match['date'] ) ); ?></small>
		</a>
	</div>
<?php $matches++;
		}
	}
?>
	
	<div class="space20">
	</div>
	<h3>Recent Tweets</h3>
	<div class="blog-twitter">
	<?php $now = date('Y-m-d H:i:s', time()); ?>
	<?php foreach( $tweets as $tweet ) { $tweet_time = date( 'Y-m-d H:i:s', strtotime( $tweet->created_at ) ); ?>
	<?php if( $tweet->text != '' ) { ?>
		<div class="blog-twitter-block">
			<a href="http://www.twitter.com/ezLeagueGaming" target="_blank">
			@ezLeagueGaming </a>
			<p>
				 <?php echo $tweet->text; ?>
			</p>
			<span>
			<?php echo $ez->dateDiff($tweet_time, $now) . "\n"; ?> </span>
			<i class="fa fa-twitter blog-twiiter-icon"></i>
		</div>
	<?php } ?>
	<?php } ?>
	</div>
</div>
<!--end col-md-3-->
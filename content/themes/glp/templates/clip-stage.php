<?php while(have_posts()) : the_post(); ?>
		<article class="participant-clip" id="participant-clip">
                        <iframe class="participant-video-embed" id="participant-video-embed-<?php the_ID(); ?>" src="http://www.youtube.com/embed/<?php the_field('youtube_id'); ?>?showinfo=0&modestbranding=1&rel=0&enablejsapi=1origin=<?php home_url(); ?>&controls=0" allowfullscreen="" frameborder="0"></iframe>
                        <div class="participant-video-controls">
                            <div class="control-slider-area-cntnr">
                                <div class="control-slider-cntnr">
                                    <a class="taggable-area" data-toggle="popover" data-placement="top">
                                        <span><?php _e('(Click to tag or comment)', 'glp'); ?></span>
                                    </a>
                                    <div class="popover-data hide">
                                        <div class="title"><div class="inner">Comments/Tags (<span class="time"></span>)<a class="icon-remove-circle icon-white close"></a></div></div>
                                        <div class="content">
                                            <div class="inner">
                                                <div class="comment-box">
                                                    <input type="text" name="comment" placeholder="Comment" />
                                                </div>
                                            </div>
                                            <div class="tags-box">
                                                <div class="tags">Tags: <span>open field</span> <span>night</span></div>
                                                <div class="add-tag">&#43; Tag</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-slider"></div>
                                </div>
                                <div class="control-time">
                                    <span class="control-time-current"><span class="time-m"></span>:<span class="time-s"></span></span>
                                    <span class="control-time-sep">&#47;</span>
                                    <span class="control-time-total"><span class="time-m"></span>:<span class="time-s"></span></span>
                                </div>
                            </div>
                            <div class="control-buttons-cntnr">
                                <a data-control="play" class="controls-play controls"><span class="icon-play icon-white"></span></a>
                                <a data-control="pause" class="controls-pause controls"><span class="icon-pause icon-white"></span></a>
                            </div>
                        </div>
			<div class="participant-video-buttons">
				<a class="btn addthis_button"><i class="icon icon-white icon-share"></i> Share</a>
				<a class="btn" href="#embed-<?php the_field('youtube_id'); ?>" data-toggle="modal">&lt;&gt; Embed</a>
				<?php if ($download_url = get_field('download_url')) : ?><a class="btn"><i class="icon icon-white icon-arrow-down"></i> Download</a><?php endif; ?>
			</div>
			<div class="modal hide" class="embed-<?php the_field('youtube_id'); ?>">
				<div class="modal-header"><?php _e('Embed code','glp'); ?></div>
				<div class="modal-body">
					<pre>&lt;iframe width=&quot;560&quot; height=&quot;315&quot; src=&quot;http://www.youtube.com/embed/<?php the_field('youtube_id'); ?>&quot; frameborder=&quot;0&quot; allowfullscreen&gt;&lt;/iframe&gt;</pre>
				</div>
				<div class="modal-footer">
				    <button class="btn" data-dismiss="modal" aria-hidden="true"><?php _e('Close','glp'); ?></button>
				</div>
			</div>
		</article>
<?php endwhile; ?>
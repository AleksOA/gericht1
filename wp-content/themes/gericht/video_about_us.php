<div class="video-wrapper">
    <div class="video">
        <video class="video-media"
               loop
               controls
               src="<?php echo $args['video_url'] ?>"
        >
        </video>
    </div>
    <button class="video_button"></button>
    <?php if($args['placeholder_url']) : ?>
    <div class="video__placeholder" style="background-image: url('<?php echo $args['placeholder_url'] ?>')">
        <?php else : ?>
            <div class="video__placeholder" style="background-image: url('<?php echo get_template_directory_uri() . '/assets/images/sestions_free/video/image_for_video.png' ?>')">
    <?php endif; ?>
    </div>
</div>



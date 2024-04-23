<html lang="en">
    <head>
        <!-- Default meta data -->
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- Main application title-->
        <title>Hiyield Challenge - Image Gallery</title>

        <!-- Call wp_head to include styles -->
        <?php wp_head(); ?>
    </head>
    <body>
        <!-- Responsive container -->
        <div class="container mx-auto px-0">
            <!-- Flex wrapper to default to center when a row is not filled -->
            <div class="flex flex-wrap justify-center items-center text-left">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <!-- I experimented with the line below for a while since when the title breaks two lines, it moves the flex wrapper upwards
                    so the images aren't aligned horizontally. I found out that setting minimum and maximums is very important and is good for being responsive -->
                    <a href="<?php the_permalink() ?>" class="w-full md:w-1/2 lg:w-1/3 mb-10 px-4 py-8 flex flex-col lg:max-h-[400px] md:max-h-[300px]"> <!-- Change to an A tag to encapsulate the object so it becomes clickable -->
                        <div style="font-weight: 700;" class="absolute rounded-full text-5xl text-pink-400 z-50">
                            <?php echo ($wp_query->current_post + 1 > 9) ? $wp_query->current_post + 1 : "0" . ($wp_query->current_post + 1); ?>
                        </div>
                        <!-- Organizing the content into columns, taking up full height available -->
                        <!-- Stuck on zooming in on just the image, not enlarging the image as a whole including the border etc -->
                        <div class="flex flex-col h-full justify-start zoom-image">
                            <?php if (has_post_thumbnail()) : ?>
                                <!-- Set a border to let the photo stand out, a bit of margin to seperate text from image -->
                                <img class="border-solid border-2 border-white-700 mb-2 w-full object-cover" src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>" />
                            <?php endif; ?>
                            <!-- This is key for ensuring the text takes up all available space after the image -->
                            <!-- Stuck on changing text color on hover of the object as a whole -->
                            <div class="flex-1">
                                <h2 style="color: lightgrey; font-weight: 400;">
                                    <!-- Concatenation of the author, date and reading time. Delimiter: &middot--> 
                                    <?php 
                                        echo get_the_author() . " &middot; " . get_the_date() . " &middot; " . 
                                        (reading_time() == 0 ? "No post content yet!" : reading_time() . " min read");
                                    ?>
                                </h2>
                                <h3 style="font-weight: 700;" class="text-pink-400 text-lg"><?php the_title(); ?></h3>
                            </div>
                        </div>
                    </a>
                <?php endwhile; endif ?>
            </div>
        </div>
        
        <!-- Call wp_footer to include scripts and any other end-of-body html that is included from wordpress -->
        <?php wp_footer(); ?>
    </body>
</html>
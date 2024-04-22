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
        <!-- Responsive container with slight padding for centering-->
        <div class="container mx-auto px-0">
            <!-- Flex wrapper to default to center when a row is not filled -->
            <div class="flex flex-wrap justify-center items-center text-left">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <!-- I experimented with the line below for a while since when the title breaks two lines, it moves the flex wrapper upwards
                    so the images aren't aligned horizontally. I found out that setting minimum and maximums is very important and is good for being responsive -->
                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 py-8 flex flex-col max-h-[400px]">
                        <!-- Organizing the content into columns, taking up full height available -->
                        <div class="flex flex-col h-full justify-start">
                            <?php if (has_post_thumbnail()) : ?>
                                <!-- Set a border to let the photo stand out, a bit of margin to seperate text from image -->
                                <img class="border-solid border-2 border-white-700 mb-2 w-full" src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>" />
                            <?php endif; ?>
                            <!-- This is key for ensuring the text takes up all available space after the image -->
                            <div class="flex-1">
                                <h2><?php echo get_the_date() ?></h2>
                                <h3><?php the_title(); ?></h3>
                                <p><a href="<?php the_permalink(); ?>" class="text-red-500 hover:text-blue-500">View Portfolio</a></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; endif ?>
            </div>
        </div>
        
        <!-- Call wp_footer to include scripts and any other end-of-body html that is included from wordpress -->
        <?php wp_footer(); ?>
    </body>
</html>
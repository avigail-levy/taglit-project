<footer class="site-footer bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <?php if( have_rows('footer_left_links','option') ): ?>
                    <ul class="list-unstyled">
                        <?php while( have_rows('footer_left_links','option') ): the_row(); 
                            $link = get_sub_field('link');
                        ?>
                            <?php if($link): ?>
                                <li>
                                    <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>">
                                        <?php echo esc_html($link['title']); ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <div class="col-md-4">
                <?php if( have_rows('footer_middle_links','option') ): ?>
                    <ul class="list-unstyled">
                        <?php while( have_rows('footer_middle_links','option') ): the_row(); 
                            $link = get_sub_field('link');
                        ?>
                            <?php if($link): ?>
                                <li>
                                    <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>">
                                        <?php echo esc_html($link['title']); ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </div>


            <div class="col-md-4 text-center">

                <p class="fw-bold">
                    <?php the_field('footer_social_title','option'); ?>
                </p>

                <?php get_template_part('template-parts/social-links'); ?>

                   
                    <?php  wp_reset_postdata();?>   
                    
                </div>


                <p>
                    <?php echo esc_html(get_field('footer_powered_text','option')); ?>

                    <?php 
                    $link = get_field('footer_powered_link','option'); 
                    if($link):
                    ?>
                        <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>">
                            <?php echo esc_html($link['title']); ?>
                        </a>
                    <?php endif; ?>
                </p>

            </div>

        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
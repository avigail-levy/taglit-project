<footer class="site-footer bg-white py-5">
    <div class="container">
        <div class="row align-items-start">
            
            <?php 
            $all_links = get_field('footer_links', 'option');
            
            if( $all_links ): 
                $chunks = array_chunk($all_links, 5); 
                ?>
                
                <div class="col-md-8">
                    <div class="footer-links-wrapper">
                        <?php foreach ( $chunks as $chunk ) : ?>
                            <ul class="footer-links-column list-unstyled">
                                <?php foreach ( $chunk as $row ) : 
                                    $link = $row['link'];
                                    if($link): ?>
                                        <li class="footer-link-item">
                                            <a href="<?php echo esc_url($link['url']); 
                                            ?>" target="<?php echo esc_attr($link['target'] ?: '_self'); ?>">
                                                <?php echo esc_html($link['title']); ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="col-md-4 d-flex flex-column align-items-end text-end">
                <div class="footer-social-section">
                    <p class="footer-social-title fw-bold">
                        <?php the_field('footer_social_title','option'); ?>
                    </p>
                    <div class="footer-social-icons">
                        <?php 
                        $footer_socials = get_field('footer_selected_socials', 'option'); 
                        if (!empty($footer_socials)) {
                            get_template_part('template-parts/social-links', null, [
                                'selected_socials' => $footer_socials
                            ]); 
                        } 
                        ?>
                    </div>
                </div>

                <div class="footer-credit-side mt-auto pt-5">
                    <p class="mb-0">
                        <span class="powered-by-text"><?php echo esc_html(get_field('footer_powered_text','option')); ?></span>
                        <?php 
                        $p_link = get_field('footer_powered_link','option'); 
                        if($p_link):
                        ?>
                            <a href="<?php echo esc_url($p_link['url']); ?>" target="<?php echo esc_attr($p_link['target'] ?: '_self');
                             ?>" class="credit-link">
                                <?php echo esc_html($p_link['title']); ?>
                            </a>
                        <?php endif; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
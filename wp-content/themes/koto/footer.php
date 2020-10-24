            <!-- instagram feed -->
            <div class="feed">
                <a href="<?php the_field('instagram', 'option') ?>" class="feed-link" target="_blank">
                    <span><i class="icon-instagram"></i>instagram</span>
                    <h3>milica.m.pantovic</h3>
                </a>
                <?php echo do_shortcode( '[instagram-feed]' ); ?>    
            </div>
            <!-- /instagram feed -->
            </main>
            <!-- /main -->

            <!-- footer -->
            <footer class="footer">
                <div class="cookies">
                    <div class="container">
                        <div class="row middle between">
                            <div class="col-lg-10">
                                <p><?php the_field('cookies', 'option') ?></p>
                            </div>
                            <div class="col-lg-2">
                                <a href="#" class="button cookie-button">Ok</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row center middle">   
                        <div class="col-lg-4">
                            <p>Pišite mi na mejl <a href="mailto:milica.m.pantovic@gmail.com" target="_blank">milica.m.pantovic@gmail.com</a> - radujem se da čujem vaše utiske!</p>
                        </div>
                        <div class="col-lg-4">
                            <p class="align-center">
                                <a href="/privacy-policy">Uslovi korišćenja</a>
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <ul class="footer-social list-reset">
                                <li>
                                    <a href="<?php the_field('youtube', 'option') ?>" target="_blank">
                                        <i class="icon-youtube"></i>youtube
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php the_field('facebook', 'option') ?>" target="_blank">
                                        <i class="icon-facebook"></i>facebook
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php the_field('instagram', 'option') ?>" target="_blank">
                                        <i class="icon-instagram"></i>instagram
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </footer>
            <!-- /footer -->

            <?php wp_footer(); ?>

            </body>

            </html>
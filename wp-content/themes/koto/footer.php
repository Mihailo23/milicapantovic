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
                        <div class="row center middle">
                            <div class="col-lg-10">
                                <p>Ovaj sajt koristi kolačiće koji omogućavaju bolje korisničko iskustvo. Dalje korišćenje ovog sajta znači da se slažete sa Politikom privatnosti i korišćenja kolačića.</p>
                            </div>
                            <div class="col-lg-2">
                                <a href="#" class="button cookie-button">Ok</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row center middle">
                        <div class="col-lg-6">
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
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="copyright align-center">Copyright <?php echo date('Y')?> by Milica Pantovic</p>
                        </div>
                    </div>
                </div>

            </footer>
            <!-- /footer -->

            <?php wp_footer(); ?>

            </body>

            </html>
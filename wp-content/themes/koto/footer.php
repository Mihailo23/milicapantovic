            <!-- instagram feed -->
            <div class="feed">
                <a href="#" class="feed-link">
                    <span>Find us on instagram</span>
                    <h3>milica.m.pantovic</h3>
                </a>
                <div class="feed-images">
                    <a href="#" style="background-image: url('https://placehold.it/200x300')"></a>
                    <a href="#" style="background-image: url('https://placehold.it/200x300')"></a>
                    <a href="#" style="background-image: url('https://placehold.it/200x300')"></a>
                    <a href="#" style="background-image: url('https://placehold.it/200x300')"></a>
                    <a href="#" style="background-image: url('https://placehold.it/200x300')"></a>
                </div>
            </div>
            <!-- /instagram feed -->
        </main>
	    <!-- /main -->

        <!-- footer -->
        <footer class="footer">
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
                        <p class="copyright align-center">Copyright <?php the_date('Y')?> by Milica Pantovic</p>
                    </div>
                </div>
            </div>
            
        </footer>
        <!-- /footer -->

		<?php wp_footer(); ?>

	</body>
</html>
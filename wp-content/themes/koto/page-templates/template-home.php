<?php /* Template Name: Home Page Template */ get_header(); 
$featured_args = array(
    'posts_per_page' => -1,
    'category__not_in' => array(6),
    'meta_query' => array(
        array(
        'key' => 'featured',
        'value' => '1',
        )
    )
);
$vlog_featured_args = array(
    'posts_per_page' => -1,
    'category_name' => 'vlog',
    'meta_query' => array(
        array(
        'key' => 'featured',
        'value' => '1',
        )
    )
);
$featured_posts_query = new WP_Query($featured_args);
$vlog_featured_posts_query = new WP_Query($vlog_featured_args);

$subscribe_image = get_field('subscribe_image');
$subscribe_image_url = $subscribe_image['url'];
?>
    <!-- owl-carousel -->
    <?php
        if ($featured_posts_query->have_posts()) {
    ?>
    <div class="owl-carousel">
        <?php 
            while ($featured_posts_query->have_posts()) {
                $featured_posts_query->the_post();
        ?>
        <a href="<?php echo get_permalink() ?>" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')" class="owl-slide item">
            <div class="overlay"></div>
            <div class="owl-slide-content">
                <span class="owl-slide-category">u <span><?php echo get_the_category()[0]->name ?></span></span>
                <h2><?php echo get_the_title() ?></h2>
                <span class="owl-slide-category"><?php echo get_the_date(); ?> od <span><?php echo get_author_name(); ?></span></span>
            </div>
        </a>
        <?php
            }
        ?>
    </div>
    <?php
        }
    ?>
    <!-- /owl-carousel -->
    <!-- about -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="home-section align-center">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="48" height="52">
                        <image data-name="quill-drawing-a-line copy" width="48" height="52" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAA0CAMAAAD7TUujAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAACplBMVEXilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLYAAAD9vVJ4AAAA4HRSTlMADUeAraULEBgSaLv5T2kbXQg2obesfHsCbwq+3fFhKaIGqeNWScAxDoJ4U35i3vyTSwVu7C7g35CncPbY7y3a8pS/nfCHEx9B4fqXm9L3y56MtW3zrnLmjmb09avXxdREqJUgGtDEkUjk1rKZd2QyJOLuzMg0/vsEIXNUFNnVUkDOxqRR5x6g/XG6HRFVdAw7UNMJRtFb6A9ZyVcZ3D19Iq9NB4NaetvHilxCw5ZlnLhn7RVqf4imwcqGhXZDws9FmF/qOviwj1jphLxgP7k4tkqzowE3jScsF5p1HCYlqvFMpe8AAAABYktHROFfCM+mAAAACXBIWXMAAAsSAAALEgHS3X78AAAAB3RJTUUH4wsNEBY5hgW07wAAA7dJREFUSMeN1vs/U2EYAPC3dEG2qLDFlJRSRmZYtspYJbKQWraS1BnDKlO6ISrRTZFLlJTWjaSL7veSLrqodFV6/pTOOdt0lveM54ft3ft8z3Oe877nnM8QGlIMG243YuSo0ch+SNrBcYwTAHC4Y51dhsDHjac0wARXN3cef+KgvXiAOTwFXpMmg5dt7o2mWDz4TJ3mC57TbfEZfjNn9XtXf2FA4GxhEDsXBYshJNTMwyRzwqUgmwvhrH7efACZu4lHyCPdoqiBYsFCFr4oejGZHymmVEzskjhOHIByaXxCIg/vlyXNpijtl69QrUxWkwMNeawzfilXwWqZuXkZN2VN6lrTWJO2DuvXEwBaE3HyT9e4Z+gA1JlZ2foNURtxflMOKQ20zxWGbd6SRg/ztpIfqm0Yv11nWXknO7lyx87+n2TswPj8Aku2cFdhQdFyBodi0UDvstuSjeIr9+wtYXrdPswJ0s1JtbC0bH8Ck8OBgxh/SGpKxhUVGw5H/sN5nonlR3ArlGzKTziqWlzhw6ieV7n/GHYLTDuUVSWorklitlObU47jx+syqWxilbR+WZlV/4oTWF8voW6elFSpx0wrHhh/EucnaqGU3OCGUwKPRiYXS05j2+edIYtXQlK0T70do/n4prMIH0YyXRYG56orz0PZhRSCuJh1qXkSYo2WPLqi8YyOD5pqgrjcyq2omHXFrU2I994NtL/qL7gWY3XB12/gD2insyU1Wx0jrDxwWDraTO9nneFmqLVvZ/E36Owt7e07Vry2ie2S91Lpu/fWyJmcCB7Gukb3ybyyRsD/p1UJIexLivIPkEQf8EBhejlkujY+DMrwZvdn61QAkdmuF+knueCRr2/u4yc26rtkPCXLPntu7O8nolxkw6OORvJB1ocGO5n5C0k+shkPOskVejmHMFe/tJ1n26MlOgh89foNXbzrrX3yu0E8eg/wslgvld1ubf+wa3zkPFZoX+TlxyW/CSgJ13Yr6NuvwQvfj8PHe13PAz6lBx+lD+DWhlNa8DkIx3u++N1Vd7m1HLJMPCJisxtA1VqF3aqNX3Ny5KlWqdTD16MlzbgXMzrOjzPEdvT8P+1xC3+R356qfc8NfKS9a/ibcLyjU9n2HVunQHx6wCSPkyI2/sCf+Kcd5/8mF/YGyBzxL1OEOADNVhOiplXS7mk9iC26S2N+MZZl5x5D5fmxyEZ8DdOa2/49NSFX09Xbh2yHccW7V9f06Z2EovBP76kh/IH6IkqT39c7t/RtG9xS8Rd8fpcrrnwg0wAAAABJRU5ErkJggg=="/>
                    </svg>
                    <h2>O meni</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla quo dolores tempora eum quasi sint odit hic nemo fugit, placeat quis eaque exercitationem dignissimos deserunt. Eum aliquid delectus non voluptatibus?</p>
                    <a href="<?php the_permalink(13); ?>" class="button right">Pročitaj više</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /about -->
    <!--  featured posts -->
    <?php
        if ($featured_posts_query->have_posts()) {
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="home-section">
                    <div class="align-center">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="48" height="52">
                            <image data-name="quill-drawing-a-line copy" width="48" height="52" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAA0CAMAAAD7TUujAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAACplBMVEXilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLYAAAD9vVJ4AAAA4HRSTlMADUeAraULEBgSaLv5T2kbXQg2obesfHsCbwq+3fFhKaIGqeNWScAxDoJ4U35i3vyTSwVu7C7g35CncPbY7y3a8pS/nfCHEx9B4fqXm9L3y56MtW3zrnLmjmb09avXxdREqJUgGtDEkUjk1rKZd2QyJOLuzMg0/vsEIXNUFNnVUkDOxqRR5x6g/XG6HRFVdAw7UNMJRtFb6A9ZyVcZ3D19Iq9NB4NaetvHilxCw5ZlnLhn7RVqf4imwcqGhXZDws9FmF/qOviwj1jphLxgP7k4tkqzowE3jScsF5p1HCYlqvFMpe8AAAABYktHROFfCM+mAAAACXBIWXMAAAsSAAALEgHS3X78AAAAB3RJTUUH4wsNEBY5hgW07wAAA7dJREFUSMeN1vs/U2EYAPC3dEG2qLDFlJRSRmZYtspYJbKQWraS1BnDKlO6ISrRTZFLlJTWjaSL7veSLrqodFV6/pTOOdt0lveM54ft3ft8z3Oe877nnM8QGlIMG243YuSo0ch+SNrBcYwTAHC4Y51dhsDHjac0wARXN3cef+KgvXiAOTwFXpMmg5dt7o2mWDz4TJ3mC57TbfEZfjNn9XtXf2FA4GxhEDsXBYshJNTMwyRzwqUgmwvhrH7efACZu4lHyCPdoqiBYsFCFr4oejGZHymmVEzskjhOHIByaXxCIg/vlyXNpijtl69QrUxWkwMNeawzfilXwWqZuXkZN2VN6lrTWJO2DuvXEwBaE3HyT9e4Z+gA1JlZ2foNURtxflMOKQ20zxWGbd6SRg/ztpIfqm0Yv11nWXknO7lyx87+n2TswPj8Aku2cFdhQdFyBodi0UDvstuSjeIr9+wtYXrdPswJ0s1JtbC0bH8Ck8OBgxh/SGpKxhUVGw5H/sN5nonlR3ArlGzKTziqWlzhw6ieV7n/GHYLTDuUVSWorklitlObU47jx+syqWxilbR+WZlV/4oTWF8voW6elFSpx0wrHhh/EucnaqGU3OCGUwKPRiYXS05j2+edIYtXQlK0T70do/n4prMIH0YyXRYG56orz0PZhRSCuJh1qXkSYo2WPLqi8YyOD5pqgrjcyq2omHXFrU2I994NtL/qL7gWY3XB12/gD2insyU1Wx0jrDxwWDraTO9nneFmqLVvZ/E36Owt7e07Vry2ie2S91Lpu/fWyJmcCB7Gukb3ybyyRsD/p1UJIexLivIPkEQf8EBhejlkujY+DMrwZvdn61QAkdmuF+knueCRr2/u4yc26rtkPCXLPntu7O8nolxkw6OORvJB1ocGO5n5C0k+shkPOskVejmHMFe/tJ1n26MlOgh89foNXbzrrX3yu0E8eg/wslgvld1ubf+wa3zkPFZoX+TlxyW/CSgJ13Yr6NuvwQvfj8PHe13PAz6lBx+lD+DWhlNa8DkIx3u++N1Vd7m1HLJMPCJisxtA1VqF3aqNX3Ny5KlWqdTD16MlzbgXMzrOjzPEdvT8P+1xC3+R356qfc8NfKS9a/ibcLyjU9n2HVunQHx6wCSPkyI2/sCf+Kcd5/8mF/YGyBzxL1OEOADNVhOiplXS7mk9iC26S2N+MZZl5x5D5fmxyEZ8DdOa2/49NSFX09Xbh2yHccW7V9f06Z2EovBP76kh/IH6IkqT39c7t/RtG9xS8Rd8fpcrrnwg0wAAAABJRU5ErkJggg=="/>
                        </svg>    
                    </div>
                    <h2 class="align-center">Pravo iz mog mastila</h2>
                    <div class="row">
                    <?php 
                        while ($featured_posts_query->have_posts()) {
                            $featured_posts_query->the_post();
                    ?>
                        <div class="col-lg-6">
                            <div class="article">
                                <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
                                <p class="article-category">u <a href="<?php echo get_category_link(get_the_category()[0]->term_id) ?>"><?php echo get_the_category()[0]->name ?></a></p>
                                <h2 class="article-title"><?php the_title() ?></h2>
                                <p class="article-excerpt"><?php echo get_the_excerpt() ?></p>
                                <a href="<?php echo get_permalink() ?>" class="read-more">Pročitaj više</a>
                                <ul class="article-social-share list-reset">
                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="icon-facebook"></i></a></li>
                                    <li><a href="https://twitter.com/home?status=<?php the_title(); ?>"><i class="icon-twitter"></i></a></li>
                                    <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&summary=<?php echo get_the_excerpt() ?>&source=<?php echo get_home_url(); ?>"><i class="icon-instagram"></i></a></li>
                                    <li><a href="#"><i class="icon-tumblr"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
    <!-- /featured posts -->
    <!-- about the book -->
    <div class="container">
        <div class="row center">
            <div class="col-lg-8">
                <div class="home-section align-center">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="48" height="52">
                        <image data-name="quill-drawing-a-line copy" width="48" height="52" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAA0CAMAAAD7TUujAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAACplBMVEXilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLYAAAD9vVJ4AAAA4HRSTlMADUeAraULEBgSaLv5T2kbXQg2obesfHsCbwq+3fFhKaIGqeNWScAxDoJ4U35i3vyTSwVu7C7g35CncPbY7y3a8pS/nfCHEx9B4fqXm9L3y56MtW3zrnLmjmb09avXxdREqJUgGtDEkUjk1rKZd2QyJOLuzMg0/vsEIXNUFNnVUkDOxqRR5x6g/XG6HRFVdAw7UNMJRtFb6A9ZyVcZ3D19Iq9NB4NaetvHilxCw5ZlnLhn7RVqf4imwcqGhXZDws9FmF/qOviwj1jphLxgP7k4tkqzowE3jScsF5p1HCYlqvFMpe8AAAABYktHROFfCM+mAAAACXBIWXMAAAsSAAALEgHS3X78AAAAB3RJTUUH4wsNEBY5hgW07wAAA7dJREFUSMeN1vs/U2EYAPC3dEG2qLDFlJRSRmZYtspYJbKQWraS1BnDKlO6ISrRTZFLlJTWjaSL7veSLrqodFV6/pTOOdt0lveM54ft3ft8z3Oe877nnM8QGlIMG243YuSo0ch+SNrBcYwTAHC4Y51dhsDHjac0wARXN3cef+KgvXiAOTwFXpMmg5dt7o2mWDz4TJ3mC57TbfEZfjNn9XtXf2FA4GxhEDsXBYshJNTMwyRzwqUgmwvhrH7efACZu4lHyCPdoqiBYsFCFr4oejGZHymmVEzskjhOHIByaXxCIg/vlyXNpijtl69QrUxWkwMNeawzfilXwWqZuXkZN2VN6lrTWJO2DuvXEwBaE3HyT9e4Z+gA1JlZ2foNURtxflMOKQ20zxWGbd6SRg/ztpIfqm0Yv11nWXknO7lyx87+n2TswPj8Aku2cFdhQdFyBodi0UDvstuSjeIr9+wtYXrdPswJ0s1JtbC0bH8Ck8OBgxh/SGpKxhUVGw5H/sN5nonlR3ArlGzKTziqWlzhw6ieV7n/GHYLTDuUVSWorklitlObU47jx+syqWxilbR+WZlV/4oTWF8voW6elFSpx0wrHhh/EucnaqGU3OCGUwKPRiYXS05j2+edIYtXQlK0T70do/n4prMIH0YyXRYG56orz0PZhRSCuJh1qXkSYo2WPLqi8YyOD5pqgrjcyq2omHXFrU2I994NtL/qL7gWY3XB12/gD2insyU1Wx0jrDxwWDraTO9nneFmqLVvZ/E36Owt7e07Vry2ie2S91Lpu/fWyJmcCB7Gukb3ybyyRsD/p1UJIexLivIPkEQf8EBhejlkujY+DMrwZvdn61QAkdmuF+knueCRr2/u4yc26rtkPCXLPntu7O8nolxkw6OORvJB1ocGO5n5C0k+shkPOskVejmHMFe/tJ1n26MlOgh89foNXbzrrX3yu0E8eg/wslgvld1ubf+wa3zkPFZoX+TlxyW/CSgJ13Yr6NuvwQvfj8PHe13PAz6lBx+lD+DWhlNa8DkIx3u++N1Vd7m1HLJMPCJisxtA1VqF3aqNX3Ny5KlWqdTD16MlzbgXMzrOjzPEdvT8P+1xC3+R356qfc8NfKS9a/ibcLyjU9n2HVunQHx6wCSPkyI2/sCf+Kcd5/8mF/YGyBzxL1OEOADNVhOiplXS7mk9iC26S2N+MZZl5x5D5fmxyEZ8DdOa2/49NSFX09Xbh2yHccW7V9f06Z2EovBP76kh/IH6IkqT39c7t/RtG9xS8Rd8fpcrrnwg0wAAAABJRU5ErkJggg=="/>
                    </svg>
                    <h2>Knjiga "Ljubav je budna"</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla quo dolores tempora eum quasi sint odit hic nemo fugit, placeat quis eaque exercitationem dignissimos deserunt. Eum aliquid delectus non voluptatibus?</p>
                    <a href="<?php the_permalink(79) ?>" class="button right">Pročitaj više</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /about the book -->
    <!--  vlog featured posts -->
    <?php
        if ($vlog_featured_posts_query->have_posts()) {
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="home-section">
                    <div class="align-center">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="48" height="52">
                            <image data-name="quill-drawing-a-line copy" width="48" height="52" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAA0CAMAAAD7TUujAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAACplBMVEXilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLbilLYAAAD9vVJ4AAAA4HRSTlMADUeAraULEBgSaLv5T2kbXQg2obesfHsCbwq+3fFhKaIGqeNWScAxDoJ4U35i3vyTSwVu7C7g35CncPbY7y3a8pS/nfCHEx9B4fqXm9L3y56MtW3zrnLmjmb09avXxdREqJUgGtDEkUjk1rKZd2QyJOLuzMg0/vsEIXNUFNnVUkDOxqRR5x6g/XG6HRFVdAw7UNMJRtFb6A9ZyVcZ3D19Iq9NB4NaetvHilxCw5ZlnLhn7RVqf4imwcqGhXZDws9FmF/qOviwj1jphLxgP7k4tkqzowE3jScsF5p1HCYlqvFMpe8AAAABYktHROFfCM+mAAAACXBIWXMAAAsSAAALEgHS3X78AAAAB3RJTUUH4wsNEBY5hgW07wAAA7dJREFUSMeN1vs/U2EYAPC3dEG2qLDFlJRSRmZYtspYJbKQWraS1BnDKlO6ISrRTZFLlJTWjaSL7veSLrqodFV6/pTOOdt0lveM54ft3ft8z3Oe877nnM8QGlIMG243YuSo0ch+SNrBcYwTAHC4Y51dhsDHjac0wARXN3cef+KgvXiAOTwFXpMmg5dt7o2mWDz4TJ3mC57TbfEZfjNn9XtXf2FA4GxhEDsXBYshJNTMwyRzwqUgmwvhrH7efACZu4lHyCPdoqiBYsFCFr4oejGZHymmVEzskjhOHIByaXxCIg/vlyXNpijtl69QrUxWkwMNeawzfilXwWqZuXkZN2VN6lrTWJO2DuvXEwBaE3HyT9e4Z+gA1JlZ2foNURtxflMOKQ20zxWGbd6SRg/ztpIfqm0Yv11nWXknO7lyx87+n2TswPj8Aku2cFdhQdFyBodi0UDvstuSjeIr9+wtYXrdPswJ0s1JtbC0bH8Ck8OBgxh/SGpKxhUVGw5H/sN5nonlR3ArlGzKTziqWlzhw6ieV7n/GHYLTDuUVSWorklitlObU47jx+syqWxilbR+WZlV/4oTWF8voW6elFSpx0wrHhh/EucnaqGU3OCGUwKPRiYXS05j2+edIYtXQlK0T70do/n4prMIH0YyXRYG56orz0PZhRSCuJh1qXkSYo2WPLqi8YyOD5pqgrjcyq2omHXFrU2I994NtL/qL7gWY3XB12/gD2insyU1Wx0jrDxwWDraTO9nneFmqLVvZ/E36Owt7e07Vry2ie2S91Lpu/fWyJmcCB7Gukb3ybyyRsD/p1UJIexLivIPkEQf8EBhejlkujY+DMrwZvdn61QAkdmuF+knueCRr2/u4yc26rtkPCXLPntu7O8nolxkw6OORvJB1ocGO5n5C0k+shkPOskVejmHMFe/tJ1n26MlOgh89foNXbzrrX3yu0E8eg/wslgvld1ubf+wa3zkPFZoX+TlxyW/CSgJ13Yr6NuvwQvfj8PHe13PAz6lBx+lD+DWhlNa8DkIx3u++N1Vd7m1HLJMPCJisxtA1VqF3aqNX3Ny5KlWqdTD16MlzbgXMzrOjzPEdvT8P+1xC3+R356qfc8NfKS9a/ibcLyjU9n2HVunQHx6wCSPkyI2/sCf+Kcd5/8mF/YGyBzxL1OEOADNVhOiplXS7mk9iC26S2N+MZZl5x5D5fmxyEZ8DdOa2/49NSFX09Xbh2yHccW7V9f06Z2EovBP76kh/IH6IkqT39c7t/RtG9xS8Rd8fpcrrnwg0wAAAABJRU5ErkJggg=="/>
                        </svg>    
                    </div>
                    <h2 class="align-center">Za one koji više vole da slušaju - Vlog</h2>
                    <div class="row">
                    <?php 
                        while ($vlog_featured_posts_query->have_posts()) {
                            $vlog_featured_posts_query->the_post();
                    ?>
                        <div class="col-lg-6">
                            <div class="article">
                            <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php echo get_field('video_url')?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <p class="article-category">u <a href="<?php echo get_category_link(get_the_category()[0]->term_id) ?>"><?php echo get_the_category()[0]->name ?></a></p>
                                <h2 class="article-title"><?php the_title() ?>.</h2>
                                <p class="article-excerpt"><?php echo get_the_excerpt() ?></p>
                                <ul class="article-social-share list-reset">
                                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                                    <li><a href="#"><i class="icon-instagram"></i></a></li>
                                    <li><a href="#"><i class="icon-tumblr"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
    <!-- /vlog featured posts -->
    <!-- subscribe -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="subscribe" style="background-image: url('<?php echo $subscribe_image_url; ?>')">
                    <div class="overlay"></div>
                    <div class="subscribe-content">
                        <h2>Budite u toku</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, accusamus.</p>
                        <div class="subscribe-form"><input type="text"><button class="button right">Pošalji</button></div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /subscribe -->
<?php get_footer(); ?>
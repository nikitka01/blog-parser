<?php

use App\Services\Crawl\Crawler;
use App\Services\Crawl\CrawlResult;
use App\Services\Parse\SearchQueryParser;
use DiDom\Document;

$content = '
    <html>
        <body>
            <section class="content-container">

      
              <section class="widg_news_common_style widg_news_simple_blog" id="widg_news_simple_blog">

    <svg style="display: none;">
        <symbol viewBox="0 0 14 14" id="view_eye">
            <path d="M13.911 6.72772C13.786 6.55663 10.8059 2.53848 6.99993 2.53848C3.19392 2.53848 0.213774 6.55663 0.08884 6.72755C-0.0296133 6.88987 -0.0296133 7.11001 0.08884 7.27232C0.213774 7.44341 3.19392 11.4616 6.99993 11.4616C10.8059 11.4616 13.786 7.44339 13.911 7.27246C14.0296 7.11018 14.0296 6.88987 13.911 6.72772ZM6.99993 10.5385C4.1964 10.5385 1.76824 7.87156 1.04946 6.99971C1.76731 6.12708 4.19038 3.46155 6.99993 3.46155C9.80333 3.46155 12.2313 6.12801 12.9504 7.00033C12.2326 7.87293 9.80948 10.5385 6.99993 10.5385Z"></path>
            <path d="M6.99993 4.23077C5.473 4.23077 4.23069 5.47308 4.23069 7.00002C4.23069 8.52695 5.473 9.76926 6.99993 9.76926C8.52686 9.76926 9.76917 8.52695 9.76917 7.00002C9.76917 5.47308 8.52686 4.23077 6.99993 4.23077ZM6.99993 8.84616C5.98192 8.84616 5.15379 8.018 5.15379 7.00002C5.15379 5.98203 5.98195 5.15387 6.99993 5.15387C8.01791 5.15387 8.84607 5.98203 8.84607 7.00002C8.84607 8.018 8.01794 8.84616 6.99993 8.84616Z"></path>
        </symbol>
        <symbol viewBox="0 0 52 44" id="comments">
            <path d="M6.64408 0.234806C5.42667 0.781766 5.21467 1.26194 5.18128 3.43971L5.15902 5.11451L3.52874 5.15904C2.14385 5.19243 1.83115 5.23695 1.45167 5.43835C0.92697 5.71766 0.50244 6.15279 0.212 6.70028C0.01113 7.07976 0 7.63837 0 20.7707V34.4505L0.24592 34.8973C0.52523 35.422 0.96036 35.8466 1.50785 36.137C1.85394 36.3267 2.25621 36.3601 4.91363 36.4052L7.9288 36.4608L12.9315 39.9117C15.6785 41.8101 17.9458 43.3397 17.9681 43.3174C17.9792 43.2952 18.2362 42.1673 18.5267 40.8158C18.8171 39.4643 19.1632 37.9236 19.2862 37.3873L19.5093 36.4047L32.1392 36.3824L44.7802 36.349L45.227 36.1147C45.8302 35.7909 46.277 35.333 46.5223 34.786C46.6898 34.4177 46.7343 34.0488 46.7343 32.7535V31.1789L48.4431 31.1343C49.9281 31.1009 50.1963 31.0676 50.5986 30.855C51.1572 30.5535 51.5812 30.0733 51.7709 29.5152C51.9941 28.8787 51.9941 2.25623 51.7821 1.64196C51.5589 1.02769 51.1233 0.558635 50.4756 0.268195L49.917 1.42637e-05H28.5315C7.24722 1.42637e-05 7.14652 0.0111458 6.64408 0.234806ZM49.3027 15.5783V28.5882H48.0185H46.7343V17.8902V7.19211L46.4439 6.61124C46.2876 6.28741 45.986 5.89626 45.774 5.73991C44.9477 5.10338 45.8969 5.13678 26.0527 5.13678H7.76079V3.85259V2.56839H28.532H49.3033V15.5783H49.3027ZM44.166 20.7712V33.725H30.8211C20.2455 33.725 17.454 33.7584 17.4206 33.8591C17.3872 33.9375 17.119 35.1766 16.8286 36.6061L16.2927 39.219L12.6744 36.472L9.05611 33.725H5.84007H2.6235V20.7712V7.81751H23.3947H44.166V20.7712Z"></path>
        </symbol>
    </svg>

    <span style="display: none;"></span>

    <div class="header_news_block">
        <div class="container">

            <div class="newsTitleWrap">
                
                <h1 class="active">Блог</h1>

                <a href="/blog/_list/analytics">Аналитика</a>

                
            </div>

            <!-- Вывод первой статьи -->
            <article class="widg_newsblock_element">
                <div class="left_block">
                                        <h3><a class="widg_news_link" href="/blog_article/11592901056"><span itemprop="name headline">Расширения браузера Chrome шпионят за пользователями</span></a>
                    </h3>
                    

                    <div class="widg_news_info_wrap">
                        <div class="widg_news_pub_time">23 июня 2020 г. 11:31</div>
                        <div class="widg_news_icons">
                            <span class="widg_news_views" title="Просмотров"><svg class="disabled"><use xlink:href="#view_eye"></use></svg>&nbsp;7831</span>
                                                    </div>
                    </div>

                    <div class="widg_news_short_doc" itemprop="description">Обнаружено более 100 новых расширений браузера Chrome, шпионящих за пользователями.</div>

                                        <a href="/blog_article/11592901056" class="widg_news_btn">Читать</a>
                                    </div>
                <div class="right_block">
                                        <img class="" src="https://is-systems.org/shared/lib_imgs/mod_newsblock/news_article/112e72c61b43990a613341aca5390d188a97eb011e4ecf8dbf983a1cbbb34169.jpg" alt="" itemprop="url image" style="width: auto; height: 101%;">
                                    </div>
            </article>


        </div>

    </div>

    <div class="container">

        <h2>Последние статьи</h2>

        <div class="articles_wrapper">

                                                            <article class="widg_newsblock_element">

                <div class="widg_newsblock_element_img_block">
                                        <a class="widg_news_left_sided_img_link" href="/blog_article/11592822043">
                        <span>
                            <img class="widg_news_left_sided_img" src="https://is-systems.org/shared/lib_imgs/mod_newsblock/news_article/9ca1dd3339878dd54fae8eef7c960339d0e4438c90a1275d3885f3fe40c5a98a.jpg" alt="" itemprop="url image" style="width: 100%; height: auto;">
                        </span>
                        <div class="widg_news_left_sided_data">
                            <div class="widg_news_left_sided_data_item">
                                <span class="widg_news_data_day">22  </span>
                                <span class="widg_news_data_month"> июня </span>
                                <span class="widg_news_data_year">  2020 </span>
                            </div>
                            <span class="widg_news_btn">Читать</span>
                        </div>
                    </a>
                                    </div>
                <div class="widg_newsblock_element_content_block">
                                        <h3><a class="widg_news_link" href="/blog_article/11592822043"><span itemprop="name headline">Кибермошенники использовали бренд «Илон Маск»</span></a></h3>
                    
                    <div class="widg_news_icons_wrap">
                        
                        <div class="widg_news_pub_time">22 июня 2020 г. 13:34</div>
                        <div class="widg_news_icons">
                            <!--  -->
                            <span class="widg_news_views" title="Просмотров"><svg class="disabled"><use xlink:href="#view_eye"></use></svg>&nbsp;9892</span>
                                                    </div>

                        
                    </div>

                    <!-- <div class="channel_link">
                        Новостной канал: <a href="/blog/_list/articles">Статьи</a>
                    </div> -->

                    <div class="widg_news_short_doc" itemprop="description">Уже несколько раз киберпреступники использовали схему со сбором Bitcoin с незадачливых пользователей, обещая вернуть сумму в двойном размере.</div>

                </div>

            </article>
                                                
                    
                                                
                                </div>

        <div class="newsUnoBlock newsUnoListBlock newsPgLinks_wrapper">

                        <div class="newsPgLinks">
                                                <a class="pgPrevLink" href="/blog/_list/_all/2"></a>
                                                                <a class="pgLinks" href="/blog/_list/_all/51">1</a>
                                                                <span>···</span>
                                                                <a class="pgLinks" href="/blog/_list/_all/4">48</a>
                                                                <a class="pgLinks" href="/blog/_list/_all/3">49</a>
                                                                <a class="pgLinks" href="/blog/_list/_all/2">50</a>
                                                                <a class="pgLinkSelected" href="/blog/_list/_all/1">51</a>
                <a class="pgNextLink pgLinkUnactive" href="javascript:void(0);"></a>
                                                <div class="clearer">&nbsp;</div>
            </div>
            
        </div>

    </div>

</section>

      
    </section>
        </body>
    </html>
';

test('crawler спарсил ссылки и получил ссылку на след. страницу', function () {
    $content = '
            <html>
                <body>
                    <section class="content-container">

            
                    <section class="widg_news_common_style widg_news_simple_blog" id="widg_news_simple_blog">

            <svg style="display: none;">
                <symbol viewBox="0 0 14 14" id="view_eye">
                    <path d="M13.911 6.72772C13.786 6.55663 10.8059 2.53848 6.99993 2.53848C3.19392 2.53848 0.213774 6.55663 0.08884 6.72755C-0.0296133 6.88987 -0.0296133 7.11001 0.08884 7.27232C0.213774 7.44341 3.19392 11.4616 6.99993 11.4616C10.8059 11.4616 13.786 7.44339 13.911 7.27246C14.0296 7.11018 14.0296 6.88987 13.911 6.72772ZM6.99993 10.5385C4.1964 10.5385 1.76824 7.87156 1.04946 6.99971C1.76731 6.12708 4.19038 3.46155 6.99993 3.46155C9.80333 3.46155 12.2313 6.12801 12.9504 7.00033C12.2326 7.87293 9.80948 10.5385 6.99993 10.5385Z"></path>
                    <path d="M6.99993 4.23077C5.473 4.23077 4.23069 5.47308 4.23069 7.00002C4.23069 8.52695 5.473 9.76926 6.99993 9.76926C8.52686 9.76926 9.76917 8.52695 9.76917 7.00002C9.76917 5.47308 8.52686 4.23077 6.99993 4.23077ZM6.99993 8.84616C5.98192 8.84616 5.15379 8.018 5.15379 7.00002C5.15379 5.98203 5.98195 5.15387 6.99993 5.15387C8.01791 5.15387 8.84607 5.98203 8.84607 7.00002C8.84607 8.018 8.01794 8.84616 6.99993 8.84616Z"></path>
                </symbol>
                <symbol viewBox="0 0 52 44" id="comments">
                    <path d="M6.64408 0.234806C5.42667 0.781766 5.21467 1.26194 5.18128 3.43971L5.15902 5.11451L3.52874 5.15904C2.14385 5.19243 1.83115 5.23695 1.45167 5.43835C0.92697 5.71766 0.50244 6.15279 0.212 6.70028C0.01113 7.07976 0 7.63837 0 20.7707V34.4505L0.24592 34.8973C0.52523 35.422 0.96036 35.8466 1.50785 36.137C1.85394 36.3267 2.25621 36.3601 4.91363 36.4052L7.9288 36.4608L12.9315 39.9117C15.6785 41.8101 17.9458 43.3397 17.9681 43.3174C17.9792 43.2952 18.2362 42.1673 18.5267 40.8158C18.8171 39.4643 19.1632 37.9236 19.2862 37.3873L19.5093 36.4047L32.1392 36.3824L44.7802 36.349L45.227 36.1147C45.8302 35.7909 46.277 35.333 46.5223 34.786C46.6898 34.4177 46.7343 34.0488 46.7343 32.7535V31.1789L48.4431 31.1343C49.9281 31.1009 50.1963 31.0676 50.5986 30.855C51.1572 30.5535 51.5812 30.0733 51.7709 29.5152C51.9941 28.8787 51.9941 2.25623 51.7821 1.64196C51.5589 1.02769 51.1233 0.558635 50.4756 0.268195L49.917 1.42637e-05H28.5315C7.24722 1.42637e-05 7.14652 0.0111458 6.64408 0.234806ZM49.3027 15.5783V28.5882H48.0185H46.7343V17.8902V7.19211L46.4439 6.61124C46.2876 6.28741 45.986 5.89626 45.774 5.73991C44.9477 5.10338 45.8969 5.13678 26.0527 5.13678H7.76079V3.85259V2.56839H28.532H49.3033V15.5783H49.3027ZM44.166 20.7712V33.725H30.8211C20.2455 33.725 17.454 33.7584 17.4206 33.8591C17.3872 33.9375 17.119 35.1766 16.8286 36.6061L16.2927 39.219L12.6744 36.472L9.05611 33.725H5.84007H2.6235V20.7712V7.81751H23.3947H44.166V20.7712Z"></path>
                </symbol>
            </svg>

            <span style="display: none;"></span>

            <div class="header_news_block">
                <div class="container">

                    <div class="newsTitleWrap">
                        
                        <h1 class="active">Блог</h1>

                        <a href="/blog/_list/analytics">Аналитика</a>

                        
                    </div>

                    <!-- Вывод первой статьи -->
                    <article class="widg_newsblock_element">
                        <div class="left_block">
                                                <h3><a class="widg_news_link" href="/blog_article/11592901056"><span itemprop="name headline">Расширения браузера Chrome шпионят за пользователями</span></a>
                            </h3>
                            

                            <div class="widg_news_info_wrap">
                                <div class="widg_news_pub_time">23 июня 2020 г. 11:31</div>
                                <div class="widg_news_icons">
                                    <span class="widg_news_views" title="Просмотров"><svg class="disabled"><use xlink:href="#view_eye"></use></svg>&nbsp;7831</span>
                                                            </div>
                            </div>

                            <div class="widg_news_short_doc" itemprop="description">Обнаружено более 100 новых расширений браузера Chrome, шпионящих за пользователями.</div>

                                                <a href="/blog_article/11592901056" class="widg_news_btn">Читать</a>
                                            </div>
                        <div class="right_block">
                                                <img class="" src="https://is-systems.org/shared/lib_imgs/mod_newsblock/news_article/112e72c61b43990a613341aca5390d188a97eb011e4ecf8dbf983a1cbbb34169.jpg" alt="" itemprop="url image" style="width: auto; height: 101%;">
                                            </div>
                    </article>


                </div>

            </div>

            <div class="container">

                <h2>Последние статьи</h2>

                <div class="articles_wrapper">

                                                                    <article class="widg_newsblock_element">

                        <div class="widg_newsblock_element_img_block">
                                                <a class="widg_news_left_sided_img_link" href="/blog_article/11592822043">
                                <span>
                                    <img class="widg_news_left_sided_img" src="https://is-systems.org/shared/lib_imgs/mod_newsblock/news_article/9ca1dd3339878dd54fae8eef7c960339d0e4438c90a1275d3885f3fe40c5a98a.jpg" alt="" itemprop="url image" style="width: 100%; height: auto;">
                                </span>
                                <div class="widg_news_left_sided_data">
                                    <div class="widg_news_left_sided_data_item">
                                        <span class="widg_news_data_day">22  </span>
                                        <span class="widg_news_data_month"> июня </span>
                                        <span class="widg_news_data_year">  2020 </span>
                                    </div>
                                    <span class="widg_news_btn">Читать</span>
                                </div>
                            </a>
                                            </div>
                        <div class="widg_newsblock_element_content_block">
                                                <h3><a class="widg_news_link" href="/blog_article/11592822043"><span itemprop="name headline">Кибермошенники использовали бренд «Илон Маск»</span></a></h3>
                            
                            <div class="widg_news_icons_wrap">
                                
                                <div class="widg_news_pub_time">22 июня 2020 г. 13:34</div>
                                <div class="widg_news_icons">
                                    <!--  -->
                                    <span class="widg_news_views" title="Просмотров"><svg class="disabled"><use xlink:href="#view_eye"></use></svg>&nbsp;9892</span>
                                                            </div>

                                
                            </div>

                            <!-- <div class="channel_link">
                                Новостной канал: <a href="/blog/_list/articles">Статьи</a>
                            </div> -->

                            <div class="widg_news_short_doc" itemprop="description">Уже несколько раз киберпреступники использовали схему со сбором Bitcoin с незадачливых пользователей, обещая вернуть сумму в двойном размере.</div>

                        </div>

                    </article>
                                                        
                            
                                                        
                                        </div>

                <div class="newsUnoBlock newsUnoListBlock newsPgLinks_wrapper">

                                <div class="newsPgLinks">
                                                        <a class="pgPrevLink" href="/blog/_list/_all/2"></a>
                                                                        <a class="pgLinks" href="/blog/_list/_all/51">1</a>
                                                                        <span>···</span>
                                                                        <a class="pgLinks" href="/blog/_list/_all/4">48</a>
                                                                        <a class="pgLinks" href="/blog/_list/_all/3">49</a>
                                                                        <a class="pgLinks" href="/blog/_list/_all/2">50</a>
                                                                        <a class="pgLinkSelected" href="/blog/_list/_all/1">51</a>
                        <a class="pgNextLink" href="/blog/_list/_all/1"></a>
                                                        <div class="clearer">&nbsp;</div>
                    </div>
                    
                </div>

            </div>

        </section>

            
            </section>
                </body>
            </html>
    ';
    $doc = new Document($content);
    $parser = new SearchQueryParser();
    $parser->loadDocument($doc)
           ->setSearchQuery('chrome');

     $crawler = new Crawler();
     $crawler->loadDocument($doc)
             ->loadParser($parser);
             
    $res = $crawler->crawlAndParse();
    $next = $res->getNextPage();
    $parsed = $res->getResult();

    expect($res)->toBeInstanceOf(CrawlResult::class);
    expect($next)->toBe('/blog/_list/_all/1');
    expect($parsed)->toBe([
        [
            "title" => "Расширения браузера Chrome шпионят за пользователями",
            "description" => "Обнаружено более 100 новых расширений браузера Chrome, шпионящих за пользователями.",
            "link" => "/blog_article/11592901056",
        ]
    ]);
});

test('crawler спарсил ссылки и не нашел ссылку на след. страницу', function () use ($content) {
    $doc = new Document($content);
    $parser = new SearchQueryParser();
    $parser->loadDocument($doc)
           ->setSearchQuery('chrome');

     $crawler = new Crawler();
     $crawler->loadDocument($doc)
             ->loadParser($parser);
             
    $res = $crawler->crawlAndParse();
    $next = $res->getNextPage();
    $parsed = $res->getResult();

    expect($res)->toBeInstanceOf(CrawlResult::class);
    expect($next)->toBeNull();
    expect($parsed)->toBe([
        [
            "title" => "Расширения браузера Chrome шпионят за пользователями",
            "description" => "Обнаружено более 100 новых расширений браузера Chrome, шпионящих за пользователями.",
            "link" => "/blog_article/11592901056",
        ]
    ]);
});

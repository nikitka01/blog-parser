<?php

use App\Exceptions\DocumentHasNoBodyException;
use App\Exceptions\SearchQueryIsEmptyException;
use App\Services\Parse\SearchQueryParser;
use DiDom\Document;

$content = '
    <body>
        <article class="widg_newsblock_element">
            <div class="left_block">
                                    <h3><a class="widg_news_link" href="/blog_article/11685961389"><span itemprop="name headline">Исследователи обнаружили 3 уязвимости в службе управления API Microsoft Azure</span></a>
                </h3>
                

                <div class="widg_news_info_wrap">
                    <div class="widg_news_pub_time">5 мая 2023 г. 13:36</div>
                    <div class="widg_news_icons">
                        <span class="widg_news_views" title="Просмотров"><svg class="disabled"><use xlink:href="#view_eye"></use></svg>&nbsp;492</span>
                                                </div>
                </div>

                <div class="widg_news_short_doc" itemprop="description">В службе Microsoft Azure API Management были обнаружены три новых дефекта безопасности, которыми могут воспользоваться злоумышленники для получения доступа к конфиденциальной информации или внутренним службам.</div>

                                    <a href="/blog_article/11685961389" class="widg_news_btn">Читать</a>
                                </div>
            <div class="right_block">
                                    <img class="" src="https://is-systems.org/shared/lib_imgs/mod_newsblock/news_article/c8b274621d896890ebba84790902c1c364fbe0c19a5ac38ab4293e2d6fe8aa61.png" alt="" itemprop="url image" style="width: auto; height: 101%;">
                                </div>
        </article>
        <article class="widg_newsblock_element">

                <div class="widg_newsblock_element_img_block">
                                        <a class="widg_news_left_sided_img_link" href="/blog_article/11685961002">
                        <span>
                            <img class="widg_news_left_sided_img" src="https://is-systems.org/shared/lib_imgs/mod_newsblock/news_article/5cbec87990e3b42a0738006f6b912d5bbf9042009c6f5465d6041dd2311117b1.jpg" alt="" itemprop="url image" style="width: 100%; height: auto;">
                        </span>
                        <div class="widg_news_left_sided_data">
                            <div class="widg_news_left_sided_data_item">
                                <span class="widg_news_data_day">4  </span>
                                <span class="widg_news_data_month"> мая </span>
                                <span class="widg_news_data_year">  2023 </span>
                            </div>
                            <span class="widg_news_btn">Читать</span>
                        </div>
                    </a>
                                    </div>
                <div class="widg_newsblock_element_content_block">
                                        <h3><a class="widg_news_link" href="/blog_article/11685961002"><span itemprop="name headline">PrivateGPT борется с раскрытием конфиденциальной информации в ChatGPT</span></a></h3>
                    
                    <div class="widg_news_icons_wrap">
                        
                        <div class="widg_news_pub_time">4 мая 2023 г. 13:30</div>
                        <div class="widg_news_icons">
                            <!--  -->
                            <span class="widg_news_views" title="Просмотров"><svg class="disabled"><use xlink:href="#view_eye"></use></svg>&nbsp;523</span>
                                                    </div>

                        
                    </div>

                    <!-- <div class="channel_link">
                        Новостной канал: <a href="/blog/_list/articles">Статьи</a>
                    </div> -->

                    <div class="widg_news_short_doc" itemprop="description">В попытке предотвратить попадание личных данных в ИИ, ChatGPT блокирует получение более 50+ типов персональных данных и другой конфиденциальной информации.</div>

                </div>

            </article>
            <article class="widg_newsblock_element">

                <div class="widg_newsblock_element_img_block">
                                        <a class="widg_news_left_sided_img_link" href="/blog_article/11685950832">
                        <span>
                            <img class="widg_news_left_sided_img" src="https://is-systems.org/shared/lib_imgs/mod_newsblock/news_article/86b432660c2c877a508bfd712e98163e9d8fa29b635fe30e508771c9286c8f90.jpg" alt="" itemprop="url image" style="width: 100%; height: auto;">
                        </span>
                        <div class="widg_news_left_sided_data">
                            <div class="widg_news_left_sided_data_item">
                                <span class="widg_news_data_day">25  </span>
                                <span class="widg_news_data_month"> апреля </span>
                                <span class="widg_news_data_year">  2023 </span>
                            </div>
                            <span class="widg_news_btn">Читать</span>
                        </div>
                    </a>
                                    </div>
                <div class="widg_newsblock_element_content_block">
                                        <h3><a class="widg_news_link" href="/blog_article/11685950832"><span itemprop="name headline">Переосмысление безопасности ИИ: может ли существовать «TruthGPT»?</span></a></h3>
                    
                    <div class="widg_news_icons_wrap">
                        
                        <div class="widg_news_pub_time">25 апреля 2023 г. 10:41</div>
                        <div class="widg_news_icons">
                            <!--  -->
                            <span class="widg_news_views" title="Просмотров"><svg class="disabled"><use xlink:href="#view_eye"></use></svg>&nbsp;438</span>
                                                    </div>

                        
                    </div>

                    <!-- <div class="channel_link">
                        Новостной канал: <a href="/blog/_list/articles">Статьи</a>
                    </div> -->

                    <div class="widg_news_short_doc" itemprop="description">Достижим ли «максимально правдивый ИИ» Элона Маска? Преодоление предвзятости в ИИ-технологиях имеет решающее значение для кибербезопасности, но сделать это может быть непросто.</div>

                </div>

            </article>
    </body>
    ';

test('парсер нашел статьи по запросу', function () use ($content) {
    $doc = new Document($content);
    $parser = new SearchQueryParser();
    $parser->loadDocument($doc);
    $parser->setSearchQuery('azure');
    $links = $parser->parse();

    expect($links)->toBe([[
        'title' => 'Исследователи обнаружили 3 уязвимости в службе управления API Microsoft Azure',
        'description' => 'В службе Microsoft Azure API Management были обнаружены три новых дефекта безопасности, которыми могут воспользоваться злоумышленники для получения доступа к конфиденциальной информации или внутренним службам.',
        'link' => '/blog_article/11685961389'
    ]]);
});

test('поиск по выражению из нескольких слов', function () use ($content) {
    $doc = new Document($content);
    $parser = new SearchQueryParser();
    $parser->loadDocument($doc);
    $parser->setSearchQuery('были обнаружены');
    $links = $parser->parse();

    expect($links)->toBe([[
        'title' => 'Исследователи обнаружили 3 уязвимости в службе управления API Microsoft Azure',
        'description' => 'В службе Microsoft Azure API Management были обнаружены три новых дефекта безопасности, которыми могут воспользоваться злоумышленники для получения доступа к конфиденциальной информации или внутренним службам.',
        'link' => '/blog_article/11685961389'
    ]]);
});

test('статьи не найдены', function() use ($content) {
    $doc = new Document($content);
    $parser = new SearchQueryParser();
    $parser->loadDocument($doc);
    $parser->setSearchQuery('несуществующая строка');
    $links = $parser->parse();

    expect($links)->toBe([]);
});

test('не задан поисковый запрос', function() use ($content) {

    $doc = new Document($content);
    $parser = new SearchQueryParser();
    $parser->loadDocument($doc);
    
    $links = $parser->parse();
})->throws(SearchQueryIsEmptyException::class);
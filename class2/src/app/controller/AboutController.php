<?php

    class AboutController{

        public function about(){ ?>
            
            <p id="feed_title">Sobre o Site:</p>
            <div id="feed_container">
                <div id="feed">  
                    <div class="post_container">
                        <div class="post">
                            <div class="content_container">
                                <div class="content">
                                    <p>Esse site foi feito como um teste para aprender mais sobre a metodologia MVC.
                                        O meu repositório com estudos sobre a metodologia pode ser acessado pelo seguinte link:
                                        <a id="about_link" href="https://github.com/gfloriano11/studying-mvc">Repositório</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php   }
    }
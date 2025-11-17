@extends('frontend.layout')


@section('content')
    <style>
        .header-wrap {
            position: relative;     /* 讓子元素可以使用絕對定位 */
            width: 100%;
        }

        .header-img {
            width: 100%;
            object-fit: contain;
            background-color: #000;
        }

        /* 第二張圖固定位置 */
        .overlay-img {
            position: absolute;
            width: 40%;     /* 你之前要求的大小 */
            height: auto;     /* 等比例 */
            
            left: 55%;        /* 依需要調整位置 */
            top: 83%;         /* 依需要調整位置 */

            transform: translate(-50%, -50%); /* 使圖片中心點定位在中心 */
            pointer-events: none; /* 可選：讓點擊不影響底層圖片 */
        }

    </style>
    <main>
        <section class="bg-gradient-to-br from-indigo-50 to-white dark:from-slate-800 dark:to-slate-900">
            
            <div class="header-wrap">
                <img src="image/av/圖.png" alt="Header" class="header-img">

                <!-- 疊在上面的圖片 -->
                <img src="image/hahaha黑金.png" alt="image 4" class="overlay-img">
            </div>
               
            <div class="carousel">
                <div class="slides">
                    <div class="slide"><img src="image/av/冬月楓.jpg" alt="image 3"></div>
                    <div class="slide"><img src="image/av/輝月あんり.jpg" alt="image 3"></div>
                    <div class="slide"><img src="image/av/明里紬.jpg" alt="image 3"></div>
                    <div class="slide"><img src="image/av/七沢みあ.jpg" alt="image 3"></div>
                    <div class="slide"><img src="image/av/希咲那奈.jpg" alt="image 2"></div>
                    <div class="slide"><img src="image/av/倉本蓳.jpg" alt="image 3"></div>
                    <div class="slide"><img src="image/av/五十嵐清華.jpg" alt="image 1"></div>
                    <div class="slide"><img src="image/av/白上咲花.jpg" alt="image 3"></div>
                </div>
                <div class="nav">
                    <button id="prev">&#10094;</button>
                    <button id="next">&#10095;</button>
                </div>
            </div>
            <script>
                const slides = document.querySelector('.slides');
                const slideCount = document.querySelectorAll('.slide').length;
                let index = 0;
                
                document.getElementById('next').addEventListener('click', () => {
                index = (index + 1) % slideCount;
                slides.style.transform = `translateX(-${index * 100}%)`;
                });
                
                document.getElementById('prev').addEventListener('click', () => {
                index = (index - 1 + slideCount) % slideCount;
                slides.style.transform = `translateX(-${index * 100}%)`;
                });
                
                // 自動播放
                setInterval(() => {
                index = (index + 1) % slideCount;
                slides.style.transform = `translateX(-${index * 100}%)`;
                }, 4000);
            </script>
        </section>
        <section class="overview-section py-5 bg-dark text-light">
            <div class="container">
                <div class="row align-items-center">
                    
                    <!-- 左圖 -->
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <div class="overview-image">
                            <img src="image/php.jpg" style="width:100%;height:auto;" class="img-fluid rounded" alt="服務項目">
                        </div>
                    </div>

                    <!-- 右文字 -->
                    <div class="col-lg-6">
                        <div class="overview-content">
                            <h2 class="fw-bold mb-3">
                                hahaha官網<br>hello hahaha
                            </h2>

                            <p class="text-muted mb-4">
                                無論是系統整合、APP開發等的問題，我們對流程皆相當熟知。
                                透過客製化的方式，協助您完成恰到好處的數位升級服務，
                                是您最值得信賴的夥伴！
                            </p>

                            <!-- 特色列表 -->
                            <ul class="list-unstyled features-list">
                                <li class="mb-2"><span>C++</span></li>
                                <li class="mb-2"><span>PHP</span></li>
                                <li class="mb-2"><span>C#</span></li>
                                <li class="mb-2"><span>ASP.NET MVC Core</span></li>
                                <li class="mb-2"><span>HTML</span></li>
                                <li class="mt-3">
                                    <a href="/" class="btn btn-dark px-4">
                                        選我選我~~~~~~ \ ^ O ^ /
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- Features -->
        <section id="features" class="features-section">
            <h2 class="section-title">hahaha</h2>

            <div class="features-container">

                <div class="feature-box">
                    <h3>UI 設計</h3>
                    <p>Win form</p>
                    <p>Web form</p>
                    <p>\ ^ O ^ /</p>
                </div>

                <div class="feature-box">
                    <h3>系統開發</h3>
                    <p>hahahalib(c++，php，c#，asp.net)</p>
                    <p>後端套版</p>
                    <p>前端產生</p>
                    <p>O .O</p>
                </div>

                <div class="feature-box">
                    <h3>專案整合</h3>
                    <p>h_from</p>
                    <p>^ O &lt;</p>
                </div>

            </div>
        </section>

        <style>
            .features-section {
                max-width: 1200px;
                margin: 0 auto;
                padding: 40px 20px;
            }

            .section-title {
                font-size: 24px;
                font-weight: bold;
                margin-bottom: 24px;
            }

            /* ⭐ 讓 3 個方塊水平排列 */
            .features-container {
                display: flex;
                justify-content: space-between;
                gap: 20px;
            }

            /* ⭐ 每個方塊 1/3 寬度 */
            .feature-box {
                background: #fff;
                padding: 24px;
                border-radius: 16px;
                width: calc(33.333% - 14px);
                box-shadow: 0 4px 12px rgba(0,0,0,0.1);
                transition: 0.3s;
            }

            /* hover 陰影 */
            .feature-box:hover {
                box-shadow: 0 6px 20px rgba(0,0,0,0.15);
            }

            /* 文字樣式 */
            .feature-box h3 {
                margin-bottom: 8px;
                font-size: 18px;
                font-weight: bold;
                color: rgba(0,0,0,1);
            }
            .feature-box p {
                font-size: 14px;
                color: rgba(0,0,0,1);
            }
        </style>

        <div class="container py-5">

            <div class="row align-items-center g-3 ">

                <h3 class="ms-2">Q & A</h3>

        

            </div>

            <!-- Q1 -->
            <div class="question-item">
                <div class="question-header">
                    <div class="d-flex align-items-center">
                        <span class="question-badge">Q1</span>
                        <span class="question-title">提供接案服務嗎?</span>
                    </div>
                    <span class="question-icon">&gt;</span>
                </div>
                <div class="question-body">
                    確定做得出來可以
                </div>
            </div>

            <!-- Q2 -->
            <div class="question-item">
                <div class="question-header">
                    <div class="d-flex align-items-center">
                        <span class="question-badge">Q2</span>
                        <span class="question-title">接案位置在哪</span>
                    </div>
                    <span class="question-icon">&gt;</span>
                </div>
                <div class="question-body">
                    桃園
                </div>
            </div>

            

        </div>

        <?php \hahaha\view\frontend\component\counter::instance()->view(); ?>

        <?php \hahaha\view\frontend\component\rect_image_hover::instance()->view(); ?>

        
    </main>

    

    <style>
    * { box-sizing: border-box; }
    body { font-family: sans-serif; margin: 0; }

    .carousel {
        position: relative;
        width: 600px;
        height: 350px;
        margin: 30px auto;
        overflow: hidden;
        border-radius: 12px;
        box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }

    .slides {
        display: flex;
        transition: transform 0.5s ease-in-out;
        width: 100%;
    }

    .slide {
        min-width: 100%;
        transition: opacity 0.5s;
    }

    .slide img {
        width: 100%;
        height: 350px;
        object-fit: cover;
    }

    .nav {
        position: absolute;
        top: 50%;
        width: 100%;
        display: flex;
        justify-content: space-between;
        transform: translateY(-50%);
    }

    .nav button {
        background-color: rgba(0,0,0,0.5);
        border: none;
        color: #fff;
        font-size: 2em;
        padding: 5px 15px;
        cursor: pointer;
        border-radius: 6px;
    }

    .nav button:hover {
        background-color: rgba(0,0,0,0.8);
    }
    </style>
@endsection
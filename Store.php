<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        />

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap"
            rel="stylesheet"
        />
        <link rel="stylesheet" href="Store.css" />
    </head>
    <body>
        <div class="nav-bar">
            <div class="link">
                <div class="logo">
                    <a href="./index.html"
                        ><img src="Assets/Images/logo1.png" alt="Giimns"
                    /></a>
                </div>
                <div class="pages">
                    <div class="store">
                        <a href="./">STORE</a>
                    </div>

                    <a href="./">LIBRARY</a>
                </div>
            </div>
            <div class="right_nav">
                <div class="search">
                    <i class="bi bi-search"></i>
                    <input type="search" placeholder="Search" />
                </div>
                <div class="signout">
                    <a href="Sign_Out.php"
                        ><i class="bi bi-box-arrow-right"></i
                    ></a>
                </div>
            </div>
        </div>

        
        <div class="pop" id="card-1" popover>
            <div class="card">
                <div class="image">
                    <img
                        src="Assets/Images/poppy_banner.png"
                        alt="Poppy Playtime banner"
                    />
                </div>


                
                <div class="about">
                    <button
                        class="close-btn"
                        popovertarget="card-1"
                        popovertargetaction="hide"
                        aria-label="Close"
                    >
                        ✕
                    </button>
                    <h2>Poppy Playime</h2>

                    <p class="desc">
                        You must stay alive in this horror/puzzle adventure. Try
                        to survive the vengeful toys waiting for you in the
                        abandoned toy factory. Use your GrabPack to hack
                        electrical circuits or nab anything from afar. Explore
                        the mysterious facility... and don't get caught.
                    </p>

                     <button class="close-btn" popovertarget="game-<?= $id ?>" popovertargetaction="hide" aria-label="Close">✕</button>

                        <h3><?= e( $game['name'] ) ?></h3>
                        <p class="genres"><?= e( $game['genres'] ?? '' ) ?></p>

                        <div class="rating-row">
                            <span class="stars" style="--rating: <?= $avg ?>" role="img" aria-label="<?= $avg ?> out of 5"></span>
                            <span class="muted"><?= $reviews ? $avg . ' (' . count( $reviews ) . ')' : 'No reviews yet' ?></span>
                            <button type="button" class="bookmark-btn <?= $saved ? 'active' : '' ?>"
                                    data-game="<?= $id ?>" <?= isGuest() ? 'data-guest' : '' ?>
                                    aria-pressed="<?= $saved ? 'true' : 'false' ?>" aria-label="Add to wishlist">
                                <i class="bi <?= $saved ? 'bi-bookmark-fill' : 'bi-bookmark' ?>"></i>
                            </button>
                        </div>

                        <p class="desc"><?= e( $game['description'] ) ?></p>

                </div>
            </div>
            <div class="form">
                
            </div>
        </div>
        
    </body>
</html>

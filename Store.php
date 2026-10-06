
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
                <div class="profile">
                    <a href="">
                    <i class="bi bi-person-fill"></i>
                    </a>
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
                                <div class="pop" id="game-<?= $id ?>" popover>
                <div class="card">
                    <div class="image">
                        <img src="Assets/Images/<?= e( $game['banner'] ?? $game['image'] ) ?>" alt="<?= e( $game['name'] ) ?> banner" />
                    </div>

                    <div class="about">
                        <button class="close-btn" popovertarget="game-<?= $id ?>" popovertargetaction="hide" aria-label="Close">✕</button>
                        <h2><?= e( $game['name'] ) ?></h2>
                        <?php if ( $tags ): ?><p class="genres"><?= e( implode( ' · ', $tags ) ) ?></p><?php endif; ?>

                        <p class="desc"><?= e( $game['description'] ) ?></p>

                        <div class="rating-row">
                            <strong>Rating</strong>
                            <span class="stars" style="--rating: <?= $avg ?>" role="img" aria-label="<?= $avg ?> out of 5"></span>
                            <span class="rating-num"><?= $reviews ? number_format( $avg, 1 ) . ' / 5' : 'No ratings yet' ?></span>
                        </div>

                        <p class="created">
                            <svg viewBox="0 0 24 24" width="20" height="20" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
                            Created: <?= e( date( 'j F Y', strtotime( $game['created_at'] ) ) ) ?>
                        </p>

                        <div class="actions">
                            <?php $link = $game['link'] ?? ''; if ( preg_match( '#^https?://#i', $link ) ): ?>
                                <a class="view-btn" href="<?= e( $link ) ?>" target="_blank" rel="noopener noreferrer">
                                    <svg viewBox="0 0 24 24" width="20" height="20" aria-hidden="true"><path d="M10 6H6a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4M14 4h6v6M20 4l-9 9"/></svg>
                                    View Game
                                    <svg viewBox="0 0 24 24" width="16" height="16" aria-hidden="true"><path d="M7 17 17 7M8 7h9v9"/></svg>
                                </a>
                            <?php endif; ?>
                            <button type="button" class="bookmark-btn <?= $saved ? 'active' : '' ?>"
                                    data-game="<?= $id ?>" <?= isGuest() ? 'data-guest' : '' ?>
                                    aria-pressed="<?= $saved ? 'true' : 'false' ?>" aria-label="Add to wishlist">
                                <svg viewBox="0 0 24 24" width="22" height="22" aria-hidden="true"><path d="M6 3h12a1 1 0 0 1 1 1v17l-7-4-7 4V4a1 1 0 0 1 1-1z"/></svg>
                            </button>
                        </div>

                        <section class="comments" aria-label="Comments">
                            <h3>Comments</h3>

                            <?php if ( isGuest() ): ?>
                                <p class="c-time"><a href="Sign_In.php">Sign in</a> to leave a comment.</p>
                            <?php else: ?>
                                <form class="comment-form" method="POST" action="review_save.php">
                                    <input type="hidden" name="game_id" value="<?= $id ?>" />
                                    <div class="star-input" aria-label="Your rating">
                                        <?php for ( $i = 5; $i >= 1; $i-- ): ?>
                                            <input type="radio" id="s<?= $id ?>-<?= $i ?>" name="rating" value="<?= $i ?>" required />
                                            <label for="s<?= $id ?>-<?= $i ?>" title="<?= $i ?> stars">★</label>
                                        <?php endfor; ?>
                                    </div>
                                    <div class="comment-row">
                                        <input type="text" name="comment" maxlength="500" placeholder="Write a comment..." aria-label="Write a comment" />
                                        <button type="submit" class="post-btn">Post</button>
                                    </div>
                                </form>
                            <?php endif; ?>

                            <ul class="comment-list">
                                <?php foreach ( $reviews as $r ): ?>
                                    <li class="comment">
                                        <span class="avatar" aria-hidden="true"><?= e( mb_strtoupper( mb_substr( $r['name'], 0, 1 ) ) ) ?></span>
                                        <div class="c-body">
                                            <strong><?= e( $r['name'] ) ?></strong>
                                            <span class="stars small" style="--rating: <?= (int) $r['rating'] ?>"></span>
                                            <p><?= $r['comment'] ? e( $r['comment'] ) : '<span class="c-time">Rated without a comment</span>' ?></p>
                                            <span class="c-time"><?= e( timeAgo( $r['created_at'] ) ) ?></span>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                                <?php if ( ! $reviews ): ?><li class="comment"><div class="c-body c-time">Be the first to leave a comment.</div></li><?php endif; ?>
                            </ul>
                        </section>
                    </div>
                </div>
            </div>
                </div>
            </div>
            <div class="form">
                
            </div>
        </div>
        
    </body>
</html>

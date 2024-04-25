<?php $this->_t = 'IN PALESTINE';

foreach($articles as $articles): ?>
<h2><?= $aarticle->titre() ?></h2>
<time><?= $article->date() ?></time>
<?php endforeach; ?>
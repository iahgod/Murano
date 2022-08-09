<div class="pagetitle">
    <h1><?=$title;?></h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=$base;?>">Home</a></li>
        <?php foreach($breadcrumb as $item):?>
            <li class="breadcrumb-item"><?=$item;?></li>
        <?php endforeach;?>
    </ol>
    </nav>
</div><!-- End Page Title -->
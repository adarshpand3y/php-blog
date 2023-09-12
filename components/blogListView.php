<div class="p-3 my-2 d-block card">
    <h1><?php echo ( isset ( $title ) ? $title : '' ); ?></h1>
    <p><?php echo ( isset ( $description ) ? $description : '' ); ?></p>
    <a href="/phpblog/blog.php/<?php echo ( isset ( $id ) ? $id : '' ); ?>" class="btn btn-primary" >Read More</a>
</div>
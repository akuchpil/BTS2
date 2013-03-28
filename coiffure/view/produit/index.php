<section>
	<article id="img_hover">
    <?php
    foreach($prod as $data)
    {
		$slug = slug($data->title);
		?>
		<a href="<?php echo Trace::url("produit/view/id:".$data->id."/slug:$slug"); ?>"> 
               <span class="title"><?php echo $data->title; ?></span> 
               <span class="descr"><?php echo number_format($data->prix, 2, ',', '').'€'; ?></span> 
               <span class="bg"></span> 
               <?php echo Image::resize(ROOT.DS.'webroot'.DS.'img'.DS.'exemle.jpg',180,180); ?>
           </a>
		<?php
    }
    ?>
    </article>
</section>

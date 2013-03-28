<section>
	<?php $slug = slug($prod[0]->title); ?>
  <h1 id="ProdTitle"><?php echo $prod[0]->title; ?><span><?php echo $prod[0]->category; ?></span></h1>
  <div class="cartouche-produit">
    <div class="colonne_Prod"> <a href="?color=green" class="color"></a> <a href="?color=red" class="color"></a> <a href="?color=yellow" class="color"></a> <a href="?color=black" class="color"></a> </div>
    <div class="ProdImg"><?php echo Image::resize(ROOT.DS.'webroot'.DS.'img'.DS.'exemle.jpg',250,272); ?></div>
    <div class="ProdDt">
      <h5>prix</h5>
      <div class="Price"><?php echo number_format($prod[0]->prix, 2, ',', '').'€'; ?> TTC</div>
      <form method="post" action="<?php echo Trace::url("panier/index/id:".$prod[0]->id."/slug:$slug"); ?>" name="inscription">
        <label>Quantité : </label><input id="ProdQte" type="text" value="1" style="width:30px; text-align:center;" maxlength="5" name="qt">
        <input type="hidden" name="color" value="<?php if(isset($color)) echo $color; ?>">
        <input type="submit" value ="Ajouter au panier">
      </form>
    </div>
  </div>
</section>

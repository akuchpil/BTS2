<section id="checkout">
<div class="rowtitle">
    <span class="name">Product name</span>
    <span class="price">Price</span>
    <span class="quantity">Quantity</span>
    <span class="subtotal">Prix avec TVA</span>
    <span class="action">Actions</span>
</div>
<?php
if(isset($prod)){
	$total = 0;
	foreach($prod as $data=>$v):
		if(!empty($v) && isset($v))
		{
			?>
			<div class="row">
				<span class="color"><?php echo $_SESSION['color']; ?></span>
				<span class="name"><?php echo $v[0]->title; ?></span>
				<span class="price"><?php echo number_format(($v[0]->prix*$_SESSION['Panier'][$v[0]->id]),2,',',' '); ?> €</span>
				<span class="quantity"><input type="text" name="panier[quantity][<?php echo $v[0]->id; ?>]" value="<?php echo $_SESSION['Panier'][$v[0]->id]; ?>"></span>
				<span class="subtotal"><?php echo number_format(($v[0]->prix*$_SESSION['Panier'][$v[0]->id]) * 1.196,2,',',' '); ?> €</span>
				<span class="action">
				<a href="#" class="del"><img src="#"></a>
				</span>
			</div>
    <?php 
		}
	endforeach; 
}
?>
</section>
<style>
#content-right{
	display:none;
}
</style>
<?php
$total = 0;
foreach($prod as $data=>$v)
{
	if(!empty($v) && isset($v))
	{
		echo $v[0]->title;
		echo '<br/>';
		echo 'Quantité '.$_SESSION['Panier'][$v[0]->id];
		echo '<br/>';
		echo number_format(($v[0]->prix*$_SESSION['Panier'][$v[0]->id])*1.196, 2, ',', '').'€';
		echo '<br/>';
		$total += ($v[0]->prix*$_SESSION['Panier'][$v[0]->id])*1.196;
	}
}
echo number_format($total,2,',','').'€';
?>
<br />
<a href="<?php echo Trace::url('test/view2/id:3/slug:hello'); ?>">plus</a>
<a href="<?php echo Trace::url('test/view3/id:3/slug:hello'); ?>">moins</a>
<a href="<?php echo Trace::url('test/view4/id:3/slug:hello'); ?>">del</a>
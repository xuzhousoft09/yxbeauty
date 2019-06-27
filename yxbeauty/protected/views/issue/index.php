<?php
$this->breadcrumbs=array(
	'Issues',
);




		
?>

<h1>交易</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

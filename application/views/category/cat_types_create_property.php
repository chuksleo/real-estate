

<?php 

if(!$types){
	print("No Property Type Mapping For this Category");

}else{

	foreach ($types as $typ): ?>
	<option value="<?= $typ->ptypeid ?>"><?= $typ->title ?></option>
   

<?php 
	endforeach ;

	}
?>

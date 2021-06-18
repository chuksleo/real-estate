

<?php 

if(!$types){
	print("No Property Type Mapping For this Category");

}else{

	foreach ($types as $typ): ?>

    <span class="badge badge-success tag-btn"><?= $typ->title ?>
        <button type="button" onclick="deleteType(<?= $typ->ptypeid ?>)"  class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
     </span>

<?php 
	endforeach ;

	}
?>

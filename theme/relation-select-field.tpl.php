<?php 
  global $iter;
  global $relations;
  global $current_print;
  global $run_has_printed; 
  $print = FALSE;

  if (!$iter) {
  	$iter = 1;
  }

  $total = count($entity->{$field_name}[LANGUAGE_NONE]);
  if ($iter % $total == 1) {
  	$run_has_printed = FALSE;
  	$iter = 1;
  }

  // load relations
  $ids = entity_extract_ids($entity_type, $entity);
  $relations = relation_select_entity_get_relations($entity_type, $ids[0], $relation->relation_type, array("field_name" => $field_name));

  if (!$current_print) {
  	$current_print = 0;
  }
  
  $delta = $relations[$relation->vid]['delta'];
  if ($delta == $current_print && !$run_has_printed) {
  	$print = TRUE;
  	$current_print++;
  	$run_has_printed = TRUE;
  }

  $iter++;
?>
<?php if ($prefix) : ?>
   <div class="relation-select-field-prefix"><?php print $prefix; ?></div>
<?php endif; ?>

<? if($print): ?>
	<<?php print $list_type; ?>>  
	  <?php foreach ($items as $item): ?>
	    <li><?php print $item; ?></li>
	  <?php endforeach; ?>
	</<?php print $list_type; ?>>
<? endif; ?>

<?php if ($suffix) : ?>
    <div class="relation-select-field-suffix"><?php print $suffix; ?></div>
<?php endif; ?>

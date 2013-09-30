<?php
  global $rendered_nodes;
  global $relations;
  global $iteration;
  global $print;

  // get count of all items from entity.
  $total = count($entity->{$field_name}[LANGUAGE_NONE]);

  // get entity id
  $ids = entity_extract_ids($entity_type, $entity);

  if (!$relations) {
    $relations = relation_select_entity_get_relations($entity_type, $ids[0], array($relation->relation_type), array("field_name" => $field_name));
  }
  
  if (!isset($rendered_nodes[$related_entities[0]->vid])) {
    $rendered_nodes[$related_entities[0]->vid] = TRUE;
    if (($iteration + 1) % $total == 0) {
      $print = TRUE;
    }     
  }
  dpm($iteration);
  $iteration++;
?>
<?php if ($prefix) : ?>
   <div class="relation-select-field-prefix"><?php print $prefix; ?></div>
<?php endif; ?>

<<?php print $list_type; ?>>  
  <?php if ($print): ?>
    <?php foreach ($items as $item): ?>
      <li><?php print $iteration; ?></li>
    <?php endforeach; ?>
 <?php endif; ?>
</<?php print $list_type; ?>>

<?php if ($suffix) : ?>
    <div class="relation-select-field-suffix"><?php print $suffix; ?></div>
<?php endif; ?>

<?php $print = FALSE; ?>
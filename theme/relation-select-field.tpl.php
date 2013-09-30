<?php
  global $rendered_nodes;
  global $relations;

  // get count of all items from entity.
  $total = count($entity->{$field_name}[LANGUAGE_NONE]);

  // get entity id
  $ids = entity_extract_ids($entity_type, $entity);

  if (!$relations) {
    $relations = relation_select_entity_get_relations($entity_type, $ids[0], array($relation->relation_type), array("field_name" => $field_name));
  }

  $related_ids = entity_extract_ids($related_entity[0]->entity_type, $related_entity[0]);
  if (!isset($rendered_nodes[$related_ids[0]])) {
    $rendered_nodes[$related_ids[0]] = TRUE;
    dpm($rendered_nodes);
  }
?>
<?php if ($prefix) : ?>
   <div class="relation-select-field-prefix"><?php print $prefix; ?></div>
<?php endif; ?>

<<?php print $list_type; ?>>
  <?php dpm($variables); ?>
   <?php foreach ($items as $item): ?>
      <li><?php print $item; ?></li>
   <?php endforeach; ?>
</<?php print $list_type; ?>>

<?php if ($suffix) : ?>
    <div class="relation-select-field-suffix"><?php print $suffix; ?></div>
<?php endif; ?>
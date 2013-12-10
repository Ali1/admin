<?php if ($options = $this->Admin->getModelCallbacks($model)) { ?>

<div class="button-group round">
	<button type="button" data-toggle="#process-model" class="button last js-dropdown">
		<span class="icon-cog"></span>
		<?php echo __d('admin', 'Process'); ?>
		<span class="caret-down"></span>
	</button>

	<ul class="dropdown dropdown--right" id="process-model">
		<?php foreach ($options as $method => $title) { ?>
			<li>
				<?php echo $this->Html->link(__d('admin', $title, $model->singularName), array(
					'controller' => 'crud',
					'action' => 'process_model',
					$model->id,
					$method,
					'model' => $model->urlSlug
				)); ?>
			</li>
		<?php } ?>
	</ul>
</div>

<?php }

if ($links = $this->Admin->getModelLinks($model)) { ?>

<div class="button-group round">
	<button type="button" data-toggle="#links" class="button last js-dropdown">
		<span class="icon-link"></span>
		<?php echo __d('admin', 'Links'); ?>
		<span class="caret-down"></span>
	</button>

	<ul class="dropdown dropdown--right" id="links">
		<?php foreach ($links as $title => $url) { 
			if (!isset($url['plugin'])) {
				$url['plugin'] = false;
			}
			?>
			<li>
				<?php echo $this->Html->link(
					__d('admin', $title, $model->singularName),
					$url + array($model->id),
					array('target' => '_blank')
				); ?>
			</li>
		<?php } ?>
	</ul>
</div>

<?php }
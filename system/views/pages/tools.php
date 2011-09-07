<?php require( DIR_VIEWS . '/header.php' ) ?>
<?php require( DIR_VIEWS . '/widgets/navigation.php' ) ?>

<h1>Tools</h1>
<?php require( DIR_VIEWS . '/widgets/page_status_message.php' ) ?>


<h2>Backup</h2>
<?php if( $vars->backup_dir_perms == '777' ): ?>
<form action="" method="post">
<fieldset>
	<p>Backup your table</p>
	<label for="backup_file_name">File name</label>
	<input type="text" name="backup_file_name" value="<?php e( $vars->backup_file_name_suggestion ) ?>" id="backup_file_name">
	<input type="submit" value="Backup" class="btn primary">
</fieldset>
</form>
<?php else: ?>
<p>You must chmod the backup directory to 777.</p>
<?php endif; ?>

<hr>

<h2>Existing Backups</h2>
<?php if ( count( $vars->backup_file ) ): ?>
<form action="" method="post">
<fieldset>
	<p>Restore from backup. This will delete all existing data.</p>
	<label for="backup_filee">Backup File</label>
	<select name="backup_file" id="backup_file">
	<?php foreach( $vars->backup_file as $backup_file ): ?>
		<option value="<?php e( $backup_file ) ?>"><?php e( $backup_file ) ?></option>
	<?php endforeach; ?>
	</select>
	<input type="submit" name="restore_backup" value="Restore Backup" class="btn primary">
	<input type="submit" name="delete_backup" value="Delete backup" class="btn danger">
</fieldset>
</form>
<?php else: ?>
<p>No backups exist</p>
<?php endif; ?>

<hr>

<h2>Geocode All Stores</h2>
<dl id="geocode_stats">
	<dt>Geocoded</dt><dd id="geocode_stats_geocoded"><?php echo $vars->count_geocoded ?></dd>
	<dt>Ungeocoded</dt><dd id="geocode_stats_ungeocoded"><?php echo $vars->count_ungeocoded ?></dd>
</dl>
<p><?php if( $vars->count_ungeocoded == 0 ): ?>All stores are geocoded!<?php endif; ?></p>
<form action="" method="post">
	<input type="submit"<?php if( $vars->count_ungeocoded == 0 ): ?> disabled="true"<?php endif; ?> class="btn success<?php if( $vars->count_ungeocoded == 0 ): ?> disabled<?php endif; ?>" name="geocode_all" id="geocode_all" value="Geocode All">
</form>
<?php require( DIR_VIEWS . '/footer.php' ) ?>
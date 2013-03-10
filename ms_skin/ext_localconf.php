<?php
// hook is called after Caching / pages with COA_/USER_INT objects.
$TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-output'][] = 'EXT:ms_skin/class.ms_skin.php:&user_ms_skin->noCache';
// hook is called before Caching / pages on their way in the cache.
$TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-all'][] = 'EXT:ms_skin/class.ms_skin.php:&user_ms_skin->cache';

?>

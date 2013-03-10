{namespace k=Tx_ExtensionBuilder_ViewHelpers}
\TYPO3\CMS\Core\Utility\GeneralUtility::loadTCA('{domainObject.databaseTableName}');
if (!isset($TCA['{domainObject.databaseTableName}']['ctrl']['type'])) {
	// no type field defined, so we define it here. This will only happen the first time the extension is installed!!
	$TCA['{domainObject.databaseTableName}']['ctrl']['type'] = 'tx_extbase_type';
	$tempColumns = array();
	$tempColumns[$TCA['{domainObject.databaseTableName}']['ctrl']['type']] = array(
		'exclude' => 1,
		'label'   => 'LLL:EXT:{domainObject.extension.extensionKey}/Resources/Private/Language/locallang_db.xlf:{domainObject.labelNamespace}.tx_extbase_type',
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('LLL:EXT:{domainObject.extension.extensionKey}/Resources/Private/Language/locallang_db.xlf:{domainObject.labelNamespace}.tx_extbase_type.0','0'),
			),
			'size' => 1,
			'maxitems' => 1,
			'default' => '{domainObject.recordType}'
		)
	);
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('{domainObject.databaseTableName}', $tempColumns, 1);
}

<k:recordType domainObject="{domainObject}" >
$TCA['{domainObject.databaseTableName}']['types']['{domainObject.recordType}']['showitem'] = $TCA['{domainObject.databaseTableName}']['types']['{parentRecordType}']['showitem'];
$TCA['{domainObject.databaseTableName}']['columns'][$TCA['{domainObject.databaseTableName}']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:{domainObject.extension.extensionKey}/Resources/Private/Language/locallang_db.xlf:{domainObject.labelNamespace}','{domainObject.recordType}');
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('{domainObject.databaseTableName}', $TCA['{domainObject.databaseTableName}']['ctrl']['type'],'','after:hidden');
</k:recordType>
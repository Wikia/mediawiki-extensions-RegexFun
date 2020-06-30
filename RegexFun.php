<?php
/**
 * 'Regex Fun' is a MediaWiki extension which adds parser functions for performing regular
 * expression searches and replacements.
 *
 * Documentation: https://www.mediawiki.org/wiki/Extension:Regex_Fun
 * Support:       https://www.mediawiki.org/wiki/Extension_talk:Regex_Fun
 * Source code:   https://phabricator.wikimedia.org/diffusion/ERXU/
 *
 * @license: ISC license
 * @author:  Daniel Werner < danweetz@web.de >
 *
 * @file RegexFun.php
 * @ingroup RegexFun
 */

// entry point:
if ( !defined( 'MEDIAWIKI' ) ) {
    die( 'This is an extension to MediaWiki and cannot be run standalone.' );
}

// extension info:
$wgExtensionCredits['parserhook'][] = array(
	'path' => __FILE__,
	'name' => 'Regex Fun',
	'descriptionmsg' => 'regexfun-desc',
	'version' => ExtRegexFun::VERSION,
	'author' => array(
		'[https://www.mediawiki.org/wiki/User:Danwe Daniel Werner]',
		'...'
	),
	'url' => 'https://www.mediawiki.org/wiki/Extension:Regex_Fun',
	'license-name' => 'ISC'
);

// language files:
$wgMessagesDirs['RegexFun'] = __DIR__ . '/i18n';
$wgExtensionMessagesFiles['RegexFunMagic'] = ExtRegexFun::getDir() . '/RegexFun.i18n.magic.php';

// hooks registration:
$wgHooks['ParserFirstCallInit'][] = 'ExtRegexFun::init';
$wgHooks['ParserClearState'   ][] = 'ExtRegexFun::onParserClearState';
$wgHooks['ParserLimitReport'  ][] = 'ExtRegexFun::onParserLimitReport';

// Include the settings file:
require_once ExtRegexFun::getDir() . '/RegexFun_Settings.php';

// parser tests registration:
$wgParserTestFiles[] = ExtRegexFun::getDir() . '/tests/parser/regexfunParserTests.txt';

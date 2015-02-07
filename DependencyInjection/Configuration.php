<?php

namespace KRSolutions\Bundle\KRCMSBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;


/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{

	/**
	 * {@inheritdoc}
	 */
	public function getConfigTreeBuilder()
	{
		$treeBuilder = new TreeBuilder();
		$rootNode = $treeBuilder->root('kr_solutions_krcms');

		$rootNode->children()
			->arrayNode('model')
				->addDefaultsIfNotSet()
					->children()
						->scalarNode('category_class')->defaultValue('KRSolutions\\Bundle\\KRCMSBundle\\Entity\\Category')->cannotBeEmpty()->end()
						->scalarNode('file_class')->defaultValue('KRSolutions\\Bundle\\KRCMSBundle\\Entity\\File')->cannotBeEmpty()->end()
						->scalarNode('menu_class')->defaultValue('KRSolutions\\Bundle\\KRCMSBundle\\Entity\\Menu')->cannotBeEmpty()->end()
						->scalarNode('page_class')->defaultValue('KRSolutions\\Bundle\\KRCMSBundle\\Entity\\Page')->cannotBeEmpty()->end()
						->scalarNode('page_type_class')->defaultValue('KRSolutions\\Bundle\\KRCMSBundle\\Entity\\PageType')->cannotBeEmpty()->end()
						->scalarNode('site_class')->defaultValue('KRSolutions\\Bundle\\KRCMSBundle\\Entity\\Site')->cannotBeEmpty()->end()
						->scalarNode('tag_class')->defaultValue('KRSolutions\\Bundle\\KRCMSBundle\\Entity\\Tag')->cannotBeEmpty()->end()
						->scalarNode('user_class')->defaultValue('KRSolutions\\Bundle\\KRCMSBundle\\Entity\\User')->cannotBeEmpty()->end()
						->scalarNode('upload_dir')->defaultValue('uploads')->cannotBeEmpty()->end()
				->end()
			->end()
			->arrayNode('helpdesk')
				->addDefaultsIfNotSet()
					->children()
						->booleanNode('enabled')->defaultValue(true)->end()
						->scalarNode('contact_name')->defaultValue('webmaster')->cannotBeEmpty()->end()
						->scalarNode('contact_email')->defaultValue('webmaster@example.com')->cannotBeEmpty()->end()
						->scalarNode('from_name')->defaultValue('Helpdesk - example.com')->cannotBeEmpty()->end()
						->scalarNode('noreply_email')->defaultValue('noreply@example.com')->cannotBeEmpty()->end()
				->end()
			->end()
			->arrayNode('management_roles')
				->addDefaultsIfNotSet()
					->children()
						->scalarNode('categories')->defaultValue('ROLE_ADMIN')->cannotBeEmpty()->end()
						->scalarNode('menus')->defaultValue('ROLE_ADMIN')->cannotBeEmpty()->end()
						->scalarNode('page_types')->defaultValue('ROLE_ADMIN')->cannotBeEmpty()->end()
						->scalarNode('sites')->defaultValue('ROLE_ADMIN')->cannotBeEmpty()->end()
				->end()
			->end()
			->scalarNode('upload_dir')->defaultValue('uploads')->cannotBeEmpty()->end();

		// Here you should define the parameters that are allowed to
		// configure your bundle. See the documentation linked above for
		// more information on that topic.

		return $treeBuilder;
	}

}

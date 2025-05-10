// Импорты React и WordPress-компонентов
import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	InspectorControls,
	RichText,
	InnerBlocks,
} from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';

// Стили
import './editor.scss';

/**
 * Gutenberg edit block
 */
export default function Edit({ attributes, setAttributes }) {
	const { brandTitle } = attributes;
	const blockProps = useBlockProps({ className: 'my-block-wrapper' });

	return (
		<div {...blockProps}>
			<header className="my-block-header">
				<div className="my-block-container">
					<nav className="my-block-navigation">
						<div className="my-block-logo" data-block="logo">
							<InnerBlocks
								template={[[
									'core/site-logo',
									{ width: 40, height: 40 }
								]]}
								allowedBlocks={['core/site-logo']}
								templateLock="all"
							/>
						</div>

						<div className="my-block-brand-title" data-block="brand">
							<RichText
								tagName="span"
								value={brandTitle}
								onChange={(value) => setAttributes({ brandTitle: value })}
								placeholder={__('Введите название сайта')}
								className="my-block-brand-text"
							/>
						</div>

						<div className="my-block-nav" data-block="navigation">
							<InnerBlocks
								template={[[
									'core/navigation',
									{ label: __('Главное меню') }
								]]}
								allowedBlocks={['core/navigation']}
							/>
						</div>
					</nav>
				</div>
			</header>
		</div>
	);
}

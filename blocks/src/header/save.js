// Импорты React и WordPress-компонентов
import { useBlockProps, InnerBlocks, RichText } from '@wordpress/block-editor'; // Компоненты редактора Gutenberg
import { __ } from '@wordpress/i18n'; // Для интернационализации

/**
 * Save function: Сохранение блока
 */
export default function Save({ attributes }) {
	const blockProps = useBlockProps.save();
	const { brandTitle } = attributes;

	return (
		<div {...blockProps}>
			<header className="header">
				<div className="container">
					<nav className="main-navigation">
						<div className="logo-wrapper">
							<InnerBlocks.Content />
						</div>

						<div className="brand-title">
							<RichText.Content 
								tagName="span"
								value={ brandTitle }
								className="brand-title__text header-title"
							/>
						</div>

						<div className="main-nav">
							<InnerBlocks.Content />
						</div>
					</nav>
				</div>
			</header>
		</div>
	);
}
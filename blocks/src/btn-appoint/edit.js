// Импорты React и WordPress-компонентов
import{useBlockProps, RichText} from '@wordpress/block-editor';
import './editor.scss';


// Стили
import './editor.scss';

/**
 * Gutenberg edit block
 */
export default function Edit({ attributes, setAttributes }) {
	const { text } = attributes;
	return (
		<RichText
			{...useBlockProps()}
			tagName='a'
			className="btn-appointment alignfull"
			href="#appointment"
			value={text}
			onChange={(value) => setAttributes({ text: value })}
		/>
	);
}

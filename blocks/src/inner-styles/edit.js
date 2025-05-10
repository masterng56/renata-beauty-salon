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

	const innerStyles = {
		backgroundColor: '#ff7777',
		color: '#fff',
		padding: '10px 20px',
		borderRadius: '25px',
		textAlign: 'center',
		fontFamily: 'Raleway',
		fontStyle: 'normal',
		fontWeight: 'normal',
		fontSize: '18px',
		lineHeight: '21px',
		letterSpacing: '2px',
		textTransform: 'uppercase',
	}

	const blockProps = useBlockProps({style: innerStyles});

	return (
		<RichText
			{...blockProps}
			tagName='div'
			value={text}
			onChange={(value) => setAttributes({ text: value })}
		/>
	);
}

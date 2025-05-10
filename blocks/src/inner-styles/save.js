// Импорты React и WordPress-компонентов
import { useBlockProps, RichText } from "@wordpress/block-editor";

/**
 * Save function: Сохранение блока
 */

export default function Save({ attributes }) {
	const { text } = attributes
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
	const blockProps = useBlockProps.save({style: innerStyles});

	return (
		<RichText.Content
			{...blockProps}
			tagName='div'
			
			value={text}
		/>
	);
}
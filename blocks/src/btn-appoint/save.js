// Импорты React и WordPress-компонентов
import { useBlockProps, RichText } from "@wordpress/block-editor";

/**
 * Save function: Сохранение блока
 */

export default function Save({ attributes }) {
	const { text } = attributes
	return (
		<RichText.Content
			{...useBlockProps.save()}
			tagName='a'
			className="btn-appointment alignfull"
			href="#appointment"
			value={text}
		/>
	);
}
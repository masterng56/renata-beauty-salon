import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function save({ attributes }) {
	const { heroTitle, heroDesc, backgroundImage, gradientStartColor, gradientEndColor, gradientAngle } = attributes;

	const blockProps = useBlockProps.save({
		style: {
			background: `linear-gradient(${gradientAngle}deg, ${gradientStartColor} 24.51%, ${gradientEndColor} 99.9%), url(${backgroundImage})`,
			backgroundSize: 'cover'
		}
	});

	return (
		<section {...blockProps} className='row img-cover container-fluid shadow-two alignfull'>
			<div className="container pb-5">
				<div className="site-titles">
					<div className="title-wrapper col-12 col-sm-7 col-lg-6 col-xl-5">
						<div className="site-title main-title">
							<RichText.Content
								tagName="h1"
								value={heroTitle}
							/>
						</div>
						<p className="site-slogan font-releway font24">
							<RichText.Content
								tagName="span"
								value={heroDesc}
							/>
						</p>
						<a href="#appointment" className="btn-appointment" type="button">Записаться</a>
					</div>
				</div>
			</div>
		</section>
	);
}
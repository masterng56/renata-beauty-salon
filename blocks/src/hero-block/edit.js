import {
	useBlockProps,
	RichText,
	MediaUpload,
	MediaUploadCheck,
	InspectorControls,
	PanelColorSettings,
} from "@wordpress/block-editor";
import {
	Button,
	PanelBody,
	PanelRow,
	RangeControl,
} from "@wordpress/components";
import "./editor.scss";

export default function Edit({ attributes, setAttributes }) {
	const {
		heroTitle,
		heroDesc,
		backgroundImage,
		gradientStartColor,
		gradientEndColor,
		gradientAngle,
	} = attributes;

	const onSelectImage = (media) => {
		setAttributes({
			backgroundImage: media.url,
		});
	};

	const onRemoveImage = () => {
		setAttributes({
			backgroundImage: "",
		});
	};

	const blockProps = useBlockProps({
		style: {
			background: `linear-gradient(${gradientAngle}deg, ${gradientStartColor} 24.51%, ${gradientEndColor} 99.9%), url(${backgroundImage})`,
			backgroundSize: "cover",
		},
	});

	return (
		<>
			<InspectorControls>
				<PanelBody title="Настройки фона" initialOpen={true}>
					<PanelRow>
						<MediaUploadCheck>
							<MediaUpload
								onSelect={onSelectImage}
								allowedTypes={["image"]}
								value={backgroundImage}
								render={({ open }) => (
									<Button
										onClick={open}
										variant="primary"
										className="editor-bg-image-button"
									>
										{backgroundImage
											? "Изменить фоновое изображение"
											: "Выбрать фоновое изображение"}
									</Button>
								)}
							/>
						</MediaUploadCheck>
					</PanelRow>
					{backgroundImage && (
						<PanelRow>
							<Button onClick={onRemoveImage} isDestructive variant="secondary">
								Удалить фоновое изображение
							</Button>
						</PanelRow>
					)}
				</PanelBody>
				<PanelBody title="Настройки градиента" initialOpen={false}>
					<PanelColorSettings
						colorSettings={[
							{
								value: gradientStartColor,
								onChange: (color) =>
									setAttributes({ gradientStartColor: color }),
								label: "Начальный цвет градиента",
							},
							{
								value: gradientEndColor,
								onChange: (color) => setAttributes({ gradientEndColor: color }),
								label: "Конечный цвет градиента",
							},
						]}
					/>
					<RangeControl
						label="Угол градиента"
						value={gradientAngle}
						onChange={(value) => setAttributes({ gradientAngle: value })}
						min={0}
						max={360}
						step={0.1}
					/>
				</PanelBody>
			</InspectorControls>

			<section
				{...blockProps}
				className="row img-cover container-fluid shadow-two alignfull"
			>
				<div className="container pb-5">
					<div className="site-titles">
						<div className="title-wrapper col-12 col-sm-7 col-lg-6 col-xl-5">
							<div className="site-title main-title">
								<RichText
									tagName="h1"
									value={heroTitle}
									onChange={(value) => setAttributes({ heroTitle: value })}
									placeholder={"Введите заголовок"}
									allowedFormats={[]}
								/>
							</div>
							<p className="site-slogan font-releway font24">
								<RichText
									tagName="span"
									value={heroDesc}
									onChange={(value) => setAttributes({ heroDesc: value })}
									placeholder={"Введите описание"}
									allowedFormats={[]}
								/>
							</p>
							<a href="#appointment" className="btn-appointment" type="button">
								Записаться
							</a>
						</div>
					</div>
				</div>
			</section>
		</>
	);
}

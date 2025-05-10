import { __ } from "@wordpress/i18n";
import { useBlockProps, MediaUpload } from "@wordpress/block-editor";
import {
	PanelBody,
	Button,
	TextControl,
	TextareaControl,
	InspectorControls,
} from "@wordpress/components";
import { useState } from "@wordpress/element";

export default function Edit({ attributes, setAttributes }) {
	const { slides } = attributes;

	const updateSlide = (index, field, value) => {
		const newSlides = [...slides];
		newSlides[index][field] = value;
		setAttributes({ slides: newSlides });
	};

	const addSlide = () => {
		setAttributes({
			slides: [
				...slides,
				{ imageUrl: "", name: "Новое имя", text: "Новый отзыв" },
			],
		});
	};

	const removeSlide = (index) => {
		const newSlides = slides.filter((_, i) => i !== index);
		setAttributes({ slides: newSlides });
	};

	return (
		<div {...useBlockProps()}>
			<InspectorControls>
				<PanelBody title="Настройки слайдов">
					{slides.map((slide, index) => (
						<PanelBody
							key={index}
							title={`Слайд ${index + 1}`}
							initialOpen={false}
						>
							<MediaUpload
								onSelect={(media) => updateSlide(index, "imageUrl", media.url)}
								render={({ open }) => (
									<Button onClick={open} variant="primary">
										{slide.imageUrl
											? "Изменить изображение"
											: "Добавить изображение"}
									</Button>
								)}
							/>
							{slide.imageUrl && (
								<img
									src={slide.imageUrl}
									alt=""
									style={{ width: "100%", marginTop: "10px" }}
								/>
							)}
							<TextControl
								label="Имя клиента"
								value={slide.name}
								onChange={(value) => updateSlide(index, "name", value)}
							/>
							<TextareaControl
								label="Текст отзыва"
								value={slide.text}
								onChange={(value) => updateSlide(index, "text", value)}
							/>
							<Button
								variant="link"
								isDestructive
								onClick={() => removeSlide(index)}
							>
								Удалить слайд
							</Button>
						</PanelBody>
					))}
					<Button
						variant="secondary"
						onClick={addSlide}
						style={{ marginTop: "1rem" }}
					>
						+ Добавить слайд
					</Button>
				</PanelBody>
			</InspectorControls>

			{/* Предварительный просмотр */}
			<section className="shadow-two">
				<div className="container">
					<div className="reviews text-center">
						<h2>Отзывы клиентов</h2>
						<div
							id="carouselExampleCaptions"
							className="carousel slide carousel-fade"
							data-bs-ride="carousel"
						>
							<ol className="carousel-indicators">
								{slides.map((_, idx) => (
									<li
										key={idx}
										data-bs-target="#carouselExampleCaptions"
										data-bs-slide-to={idx}
										className={idx === 0 ? "active indicators" : "indicators"}
									></li>
								))}
							</ol>
							<div className="carousel-inner">
								{slides.map((slide, idx) => (
									<div
										key={idx}
										className={`carousel-item${idx === 0 ? " active" : ""}`}
									>
										<div className="csrusel-person col-12">
											{slide.imageUrl && (
												<img
													className="carousel-img d-block"
													src={slide.imageUrl}
													alt=""
												/>
											)}
											<h5 className="carousel-title">{slide.name}</h5>
										</div>
										<p className="carusel-review">{slide.text}</p>
									</div>
								))}
							</div>
							<a
								className="carousel-control-prev"
								href="#carouselExampleCaptions"
								role="button"
								data-bs-slide="prev"
							>
								<span className="carousel-control-prev-icon" aria-hidden="true">
									<i className="fas fa-angle-left"></i>
								</span>
								<span className="sr-only">Предыдущий</span>
							</a>
							<a
								className="carousel-control-next"
								href="#carouselExampleCaptions"
								role="button"
								data-bs-slide="next"
							>
								<span className="carousel-control-next-icon" aria-hidden="true">
									<i className="fas fa-angle-right"></i>
								</span>
								<span className="sr-only">Следующий</span>
							</a>
						</div>
					</div>
				</div>
			</section>
		</div>
	);
}
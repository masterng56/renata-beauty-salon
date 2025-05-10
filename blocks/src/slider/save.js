import { useBlockProps } from '@wordpress/block-editor';

export default function Save({ attributes }) {
	const { slides } = attributes;

	return (
		<div {...useBlockProps.save()} >
			<div className="container">
				<div className="reviews text-center">
					<h2>Отзывы клиентов</h2>
					<div
						id="carouselExampleCaptions"
						className="carousel slide carousel-fade"
						data-ride="carousel"
					>
						<ol className="carousel-indicators">
							{slides.map((_, idx) => (
								<li
									key={idx}
									data-target="#carouselExampleCaptions"
									data-slide-to={idx}
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
							data-slide="prev"
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
							data-slide="next"
						>
							<span className="carousel-control-next-icon" aria-hidden="true">
								<i className="fas fa-angle-right"></i>
							</span>
							<span className="sr-only">Следующий</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	);
}
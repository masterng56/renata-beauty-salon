import { useState } from 'react';

const SliderComponent = ({ slides = [] }) => {
    const [currentSlide, setCurrentSlide] = useState(0);

    const nextSlide = () => {
        setCurrentSlide((prev) => (prev + 1) % slides.length);
    };

    const prevSlide = () => {
        setCurrentSlide((prev) => (prev - 1 + slides.length) % slides.length);
    };

    const goToSlide = (index) => {
        setCurrentSlide(index);
    };

    if (!Array.isArray(slides) || slides.length === 0) {
        return null;
    }

    return (
        <div className="reviews-slider">
            <button className="slider-arrow left" onClick={prevSlide}>&larr;</button>
            <div className="slider-content">
                <img src={slides[currentSlide].image} alt={slides[currentSlide].title} />
                <h3>{slides[currentSlide].title}</h3>
                <p>{slides[currentSlide].description}</p>
            </div>
            <button className="slider-arrow right" onClick={nextSlide}>&rarr;</button>

            <div className="slider-dots">
                {slides.map((slide, index) => (
                    <span
                        key={`slide-${slide.id || index}`}
                        className={`dot ${index === currentSlide ? 'active' : ''}`}
                        onClick={() => goToSlide(index)}
                    ></span>
                ))}
            </div>
        </div>
    );
};

export default SliderComponent; 
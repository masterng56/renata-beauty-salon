// получаем массив всех вкладок
const tabs = document.querySelectorAll(".tab");
// получаем массив всех блоков с содержимым вкладок
const contents = document.querySelectorAll(".content");

tabs[0].classList.add('tab--active');
contents[0].classList.add('content--active');

// запускаем цикл для каждой вкладки и добавляем на неё событие
for (let i = 0; i < tabs.length; i++) {
	tabs[i].addEventListener("click", ( event ) => {

		// сначала нам нужно удалить активный класс именно с вкладок
		let tabsChildren = event.target.parentElement.children;
		console.log(tabsChildren);
		for (let t = 0; t < tabsChildren.length; t++) {
			tabsChildren[t].classList.remove("tab--active");
		}
		// добавляем активный класс
		tabs[i].classList.add("tab--active");
		// теперь нужно удалить активный класс с блоков содержимого вкладок
		let tabContentChildren = event.target.parentElement.nextElementSibling.children;
		for (let c = 0; c < tabContentChildren.length; c++) {
			tabContentChildren[c].classList.remove("content--active");
		}
		// добавляем активный класс
		contents[i].classList.add("content--active");

	});
}
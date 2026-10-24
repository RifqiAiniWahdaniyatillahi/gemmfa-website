import './bootstrap';

const navToggle = document.querySelector('[data-nav-toggle]');
const nav = document.querySelector('[data-nav]');

if (navToggle && nav) {
	navToggle.addEventListener('click', () => {
		nav.classList.toggle('is-open');
	});
}

const searchInput = document.querySelector('[data-search-input]');
const searchItems = document.querySelectorAll('[data-search-item]');

if (searchInput && searchItems.length) {
	searchInput.addEventListener('input', (event) => {
		const query = event.target.value.toLowerCase().trim();

		searchItems.forEach((item) => {
			const haystack = item.getAttribute('data-search-item') || '';
			const match = haystack.toLowerCase().includes(query) || query === '';
			item.style.display = match ? '' : 'none';
		});
	});
}

const animatedSections = document.querySelectorAll('.card, .tile, .hero__card');

if (animatedSections.length && 'IntersectionObserver' in window) {
	const observer = new IntersectionObserver(
		(entries) => {
			entries.forEach((entry) => {
				if (entry.isIntersecting) {
					entry.target.classList.add('reveal');
					observer.unobserve(entry.target);
				}
			});
		},
		{ threshold: 0.2 }
	);

	animatedSections.forEach((section) => observer.observe(section));
}

const lightboxTriggers = document.querySelectorAll('[data-lightbox]');

if (lightboxTriggers.length) {
	const lightbox = document.createElement('div');
	lightbox.className = 'lightbox';
	lightbox.innerHTML = `
		<div class="lightbox__backdrop" data-lightbox-close></div>
		<div class="lightbox__content" role="dialog" aria-modal="true">
			<button class="lightbox__close" type="button" data-lightbox-close aria-label="Tutup">&times;</button>
			<img class="lightbox__image" src="" alt="" />
			<div class="lightbox__footer">
				<span class="lightbox__caption"></span>
				<a class="lightbox__download" href="" download>Unduh</a>
			</div>
		</div>
	`;

	document.body.appendChild(lightbox);

	const imageEl = lightbox.querySelector('.lightbox__image');
	const captionEl = lightbox.querySelector('.lightbox__caption');
	const downloadEl = lightbox.querySelector('.lightbox__download');

	const openLightbox = (event) => {
		event.preventDefault();
		const target = event.currentTarget;
		const src = target.getAttribute('href');
		const caption = target.getAttribute('data-caption') || '';

		imageEl.src = src;
		imageEl.alt = caption;
		captionEl.textContent = caption;
		downloadEl.href = src;
		lightbox.classList.add('is-open');
	};

	const closeLightbox = () => {
		lightbox.classList.remove('is-open');
		imageEl.src = '';
		imageEl.alt = '';
		captionEl.textContent = '';
		downloadEl.href = '';
	};

	lightboxTriggers.forEach((trigger) => {
		trigger.addEventListener('click', openLightbox);
	});

	lightbox.addEventListener('click', (event) => {
		if (event.target.matches('[data-lightbox-close]')) {
			closeLightbox();
		}
	});

	document.addEventListener('keydown', (event) => {
		if (event.key === 'Escape') {
			closeLightbox();
		}
	});
}

const passwordToggles = document.querySelectorAll('[data-password-toggle]');

if (passwordToggles.length) {
	passwordToggles.forEach((toggle) => {
		const input = toggle.parentElement?.querySelector('[data-password-input]');
		if (!input) {
			return;
		}

		toggle.addEventListener('click', () => {
			const isHidden = input.getAttribute('type') === 'password';
			input.setAttribute('type', isHidden ? 'text' : 'password');
			toggle.textContent = isHidden ? 'Sembunyikan' : 'Tampilkan';
			toggle.setAttribute('aria-label', isHidden ? 'Sembunyikan password' : 'Tampilkan password');
		});
	});
}

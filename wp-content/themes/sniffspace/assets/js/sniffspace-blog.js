(function () {
	var storageKey = 'sniffspaceBlogView';
	var postList = document.querySelector('[data-blog-post-list]');
	var buttons = document.querySelectorAll('[data-blog-view]');
	var sidebar = document.getElementById('ss-blog-sidebar');
	var sidebarOpenButton = document.querySelector('[data-blog-sidebar-open]');
	var sidebarCloseButtons = document.querySelectorAll('[data-blog-sidebar-close]');
	var mobileQuery = window.matchMedia('(max-width: 767px)');

	if (!postList && !sidebar) {
		return;
	}

	function setView(view, shouldPersist) {
		if (!postList) {
			return;
		}

		var nextView = !mobileQuery.matches && view === 'list' ? 'list' : 'grid';

		postList.classList.toggle('is-grid', nextView === 'grid');
		postList.classList.toggle('is-list', nextView === 'list');

		buttons.forEach(function (button) {
			var isActive = button.getAttribute('data-blog-view') === nextView;
			button.classList.toggle('is-active', isActive);
			button.setAttribute('aria-pressed', isActive ? 'true' : 'false');
		});

		if (shouldPersist !== false) {
			try {
				window.localStorage.setItem(storageKey, nextView);
			} catch (error) {
				return;
			}
		}
	}

	function closeSidebar() {
		document.body.classList.remove('ss-blog-sidebar-open');

		if (sidebarOpenButton) {
			sidebarOpenButton.setAttribute('aria-expanded', 'false');
		}
	}

	function openSidebar() {
		document.body.classList.add('ss-blog-sidebar-open');

		if (sidebarOpenButton) {
			sidebarOpenButton.setAttribute('aria-expanded', 'true');
		}
	}

	buttons.forEach(function (button) {
		button.addEventListener('click', function () {
			setView(button.getAttribute('data-blog-view'));
		});
	});

	if (sidebar && sidebarOpenButton) {
		sidebarOpenButton.addEventListener('click', openSidebar);
	}

	sidebarCloseButtons.forEach(function (button) {
		button.addEventListener('click', closeSidebar);
	});

	document.addEventListener('keydown', function (event) {
		if (event.key === 'Escape') {
			closeSidebar();
		}
	});

	function handleViewportChange() {
		if (mobileQuery.matches) {
			setView('grid', false);
			return;
		}

		closeSidebar();

		try {
			setView(window.localStorage.getItem(storageKey) || 'grid');
		} catch (error) {
			setView('grid');
		}
	}

	if (mobileQuery.addEventListener) {
		mobileQuery.addEventListener('change', handleViewportChange);
	} else if (mobileQuery.addListener) {
		mobileQuery.addListener(handleViewportChange);
	}

	handleViewportChange();
}());

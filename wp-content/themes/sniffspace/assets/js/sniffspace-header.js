( function() {
	const drawer = document.getElementById( 'ss-mobile-drawer' );
	const trigger = document.querySelector( '.ss-menu-trigger' );
	const overlay = document.querySelector( '.ss-drawer-overlay' );
	const closeButtons = document.querySelectorAll( '[data-ss-drawer-close]' );
	const toggles = document.querySelectorAll( '.ss-drawer-section-toggle' );
	const siteHeader = document.querySelector( '.ss-site-header' );
	const backToTopButton = document.querySelector( '.ss-back-to-top' );

	function openPanel( toggle, panel, icon ) {
		toggle.setAttribute( 'aria-expanded', 'true' );
		panel.classList.add( 'is-open' );
		panel.style.maxHeight = panel.scrollHeight + 'px';

		if ( icon ) {
			icon.textContent = '-';
		}
	}

	function closePanel( toggle, panel, icon ) {
		toggle.setAttribute( 'aria-expanded', 'false' );
		panel.style.maxHeight = panel.scrollHeight + 'px';
		panel.offsetHeight;
		panel.classList.remove( 'is-open' );
		panel.style.maxHeight = '0px';

		if ( icon ) {
			icon.textContent = '+';
		}
	}

	function openDrawer() {
		document.body.classList.add( 'ss-drawer-open' );
		drawer.setAttribute( 'aria-hidden', 'false' );
		trigger.setAttribute( 'aria-expanded', 'true' );
		overlay.hidden = false;
	}

	function closeDrawer() {
		document.body.classList.remove( 'ss-drawer-open' );
		drawer.setAttribute( 'aria-hidden', 'true' );
		trigger.setAttribute( 'aria-expanded', 'false' );
		overlay.hidden = true;
	}

	if ( drawer && trigger && overlay ) {
		trigger.addEventListener( 'click', openDrawer );

		closeButtons.forEach( function( button ) {
			button.addEventListener( 'click', closeDrawer );
		} );

		document.addEventListener( 'keydown', function( event ) {
			if ( event.key === 'Escape' ) {
				closeDrawer();
			}
		} );

		drawer.addEventListener( 'click', function( event ) {
			if ( event.target instanceof HTMLAnchorElement ) {
				closeDrawer();
			}
		} );
	}

	toggles.forEach( function( toggle ) {
		toggle.addEventListener( 'click', function() {
			const panelId = toggle.getAttribute( 'aria-controls' );
			const panel = panelId ? document.getElementById( panelId ) : null;
			const icon = toggle.querySelector( '.ss-drawer-section-icon' );
			const isOpen = toggle.getAttribute( 'aria-expanded' ) === 'true';

			if ( ! panel ) {
				return;
			}

			toggles.forEach( function( otherToggle ) {
				const otherPanelId = otherToggle.getAttribute( 'aria-controls' );
				const otherPanel = otherPanelId ? document.getElementById( otherPanelId ) : null;
				const otherIcon = otherToggle.querySelector( '.ss-drawer-section-icon' );

				if ( otherPanel && otherToggle !== toggle ) {
					closePanel( otherToggle, otherPanel, otherIcon );
				}
			} );

			if ( isOpen ) {
				closePanel( toggle, panel, icon );
			} else {
				openPanel( toggle, panel, icon );
			}
		} );
	} );

	document.querySelectorAll( '.ss-drawer-section-panel' ).forEach( function( panel ) {
		if ( panel.classList.contains( 'is-open' ) ) {
			panel.style.maxHeight = panel.scrollHeight + 'px';
		} else {
			panel.style.maxHeight = '0px';
		}
	} );

	function getScrollTop() {
		return Math.max(
			window.scrollY || 0,
			document.documentElement ? document.documentElement.scrollTop : 0,
			document.body ? document.body.scrollTop : 0
		);
	}

	function updateScrollUi() {
		const scrollTop = getScrollTop();

		if ( siteHeader ) {
			siteHeader.classList.toggle( 'ss-header-scrolled', scrollTop > 8 );
		}

		if ( backToTopButton ) {
			const shouldShowBackToTop = window.innerWidth >= 768 && scrollTop > 240;
			backToTopButton.classList.toggle( 'ss-back-to-top-visible', shouldShowBackToTop );
			backToTopButton.tabIndex = shouldShowBackToTop ? 0 : -1;
		}
	}

	window.addEventListener( 'scroll', updateScrollUi, { passive: true } );
	window.addEventListener( 'resize', updateScrollUi );
	updateScrollUi();

	if ( backToTopButton ) {
		backToTopButton.addEventListener( 'click', function() {
			window.scrollTo( { top: 0, behavior: 'smooth' } );

			if ( document.documentElement ) {
				document.documentElement.scrollTo( { top: 0, behavior: 'smooth' } );
			}

			if ( document.body ) {
				document.body.scrollTo( { top: 0, behavior: 'smooth' } );
			}
		} );
	}
}() );

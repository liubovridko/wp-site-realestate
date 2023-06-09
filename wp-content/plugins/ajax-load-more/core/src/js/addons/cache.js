import axios from 'axios';

/**
 * Create a single post cache file.
 *
 * @param {object} alm     The ALM object.
 * @param {string} content The content to cache.
 * @param {string} type    The type of cache to create.
 * @since 5.3.1
 */
export function createCacheFile(alm, content, type = 'standard') {
	if (alm.addons.cache !== 'true' || !content || content === '') {
		return false;
	}
	const name = type === 'single' ? alm.addons.single_post_id : `page-${alm.page + 1}`;

	const formData = new FormData();
	formData.append('action', 'alm_cache_from_html');
	formData.append('security', alm_localize.alm_nonce);
	formData.append('cache_id', alm.addons.cache_id);
	formData.append('cache_logged_in', alm.addons.cache_logged_in);
	formData.append('canonical_url', alm.canonical_url);
	formData.append('name', name);
	formData.append('html', content.trim());

	axios.post(alm_localize.ajaxurl, formData).then(function (response) {
		console.log('Cache created for: ' + alm.canonical_url);
	});
}

/**
 * Create a WooCommerce cache file.
 *
 * @param {Object} alm
 * @param {String} content
 * @since 5.3.1
 */
export function wooCache(alm, content) {
	if (alm.addons.cache !== 'true' || !content || content === '') {
		return false;
	}

	let formData = new FormData();
	formData.append('action', 'alm_cache_from_html');
	formData.append('security', alm_localize.alm_nonce);
	formData.append('cache_id', alm.addons.cache_id);
	formData.append('cache_logged_in', alm.addons.cache_logged_in);
	formData.append('canonical_url', alm.canonical_url);
	formData.append('name', `page-${alm.page}`);
	formData.append('html', content.trim());

	axios.post(alm_localize.ajaxurl, formData).then(function () {
		console.log('Cache created for post: ' + alm.canonical_url);
	});
}

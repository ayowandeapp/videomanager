let axios = require('axios');
let BASE_URL = 'https://www.googleapis.com/youtube/v3/search';

module.exports = function (options, callback){
	if (!options.apikey) {
		throw new Error('youtube search require a key');
	}
	let params = {
		part: 'snippet',
		key: options.apikey,
		q: options.term,
		maxResults: (options.items) ? options.items : 5,
		type: 'video'

	};
	axios.get(BASE_URL, { params })
		.then(response => {
			//console.log('search response', response);
			if(callback){
				callback(response.data.items)
			}

		})
		.catch(error => console.error(error));
}
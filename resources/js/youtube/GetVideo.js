let axios = require('axios');
let BASE_URL = 'https://www.googleapis.com/youtube/v3/videos';

module.exports = function (options, callback){
	if (!options.apikey) {
		throw new Error('youtube search require a key');
	}
	//alert(options.videoId);
	let params = {
		part: 'snippet',
		key: options.apikey,
		id: options.videoId,
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
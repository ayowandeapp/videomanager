<template>
	<div class="container">
		<form method="get" v-on:submit="handleFormSubmit()">
			<input type="text" class="form-control" v-model="searchInput">
			<video-group v-bind:videos="videos"></video-group>
		</form>
	</div>
	
</template>
<script>

	import VideoGroup from './VideoGroup.vue';
	import Search from './search';

    export default {
    	components: {
    		VideoGroup
    	},
    	data(){
    		return{
    			searchInput:'',
    			videos:[]
    		}
    	},
    	created() {
    	},
    	methods: {
    		handleFormSubmit(){
	    		Search({apikey: 'AIzaSyAFn9IUTghHLVO2ueKCiz_zYW2q0RuBYUg',
	    			term: this.searchInput,
	    			items:10
	    		}, 
	    			response => this.videos = response);

    		}

    	}
}
</script>
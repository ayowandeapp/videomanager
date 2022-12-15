<template>
	<div class="container">
		<video-group v-bind:videos="videos"></video-group>

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
    			videos:[]
    		}
    	},
    	created() {
    		Search({apikey: '#',
    			term: 'laravel repository'
    		}, 
    			response => this.videos = response);
    	},
    	methods: {

    	}
}
</script>
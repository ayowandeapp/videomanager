<template>
	<div class="row">
		<video-item v-for ="video in videos" v-bind:video="video" :key="video.id.videoId"></video-item>

	</div>
</template>
<script>
	import VideoItem from './VideoItem.vue';

    export default {
    	props:['videos'],
    	data(){
    		return{
    		}
    	},
    	components: {
    		VideoItem
    	}
}
</script>
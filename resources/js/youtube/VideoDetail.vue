<style type="text/css">
	.su-youtube {
		margin: 0 auto;
	  	display: block;
	}
</style>
<template>
	<div class="container-fluid">
		<div class="row" v-if="video">
			<div class="col-md-8">
				<h2>{{video.snippet.title}}</h2>
				<br>
				<small>Channel: {{video.snippet.channelTitle}}</small>
			<p>{{video.snippet.description}}</p>
			<div class="su-youtube embed-responsive-item">
				<iframe width="420" height="315" :src="url"></iframe>
			</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<playlists></playlists>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<comments v-bind:videoId="videoId"></comments>
			</div>
		</div>
	</div>
</template>
<script>
	import Comments from './comments/Comments.vue';
	import Playlists from './playlist/Playlist.vue';
	import GetVideo from './GetVideo';


    export default {
    	components: {
    		'comments': Comments,
    		'playlists': Playlists,

    	},
    	data(){
    		return{
    			videoId: '',
    			url: '',
    			video: ''
    			
    		}
    	},
    	created() {   		
    		GetVideo({
    			apikey: '',
    			videoId: this.$route.params.id
    		},
    		response => {
    			console.log(response);
    			this.video = response[0];
    			});
    		this.videoId = this.$route.params.id;
    		this.url = 'https://www.youtube.com/embed/'+this.videoId;
    		

    	},
    	methods: {



    	}
}
</script>
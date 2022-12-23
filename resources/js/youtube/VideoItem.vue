<template>
	<div class="col-lg-4">
		<div class="card card-body text-right">
		  <img class="card-img-top" :src="videoImage" :alt="videoTitle"width="200px">
		  <div class="card-body">
		    <h4 class="card-title font-20 mt-0">{{videoTitle}}</h4>
		    <p class="card-text">{{videoDescription}}</p>
		    <router-link class="btn btn-primary waves-effect waves-light" v-bind:to="{name:'videoDetail', params:{id:video.id.videoId}}">
				Show Video
			</router-link>
		  </div>
		</div>
	</div>
</template>
<script>
    export default {
    	props:['video'],
    	computed: {
    		videoTitle() {
    			return this.video.snippet.title;
    		},
    		videoDescription() {
    			return this.video.snippet.description;
    		},
    		videoImage(){
    			return this.video.snippet.thumbnails.medium.url;
    		}

    	}
}
</script>

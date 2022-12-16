<template>
	<div class="col-sm-6">
		<div class="card" style="width:400px">
		  <img class="card-img-top" :src="videoImage" :alt="videoTitle"width="200px">
		  <div class="card-body">
		    <h4 class="card-title">{{videoTitle}}</h4>
		    <p class="card-text">{{videoDescription}}</p>
		    <router-link class="btn btn-primary" v-bind:to="{name:'videoDetail', params:{id:video.id.videoId,video:video}}">
				Home
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
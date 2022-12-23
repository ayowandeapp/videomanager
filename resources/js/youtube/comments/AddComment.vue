<template>
	<div class="card">
	    <div class="card-body">

	        <div class="m-t-20">
	        	<form method="post" @click.prevent="createComments()">
	            <h6 class="sub-title"><b>Add Comment</b></h6>
	            <p class="text-muted mb-3 font-13">
	                Bootstrap maxlength supports textarea as well as inputs. Even on old IE.
	            </p>
	            <textarea id="textarea" class="form-control" maxlength="225" rows="3" placeholder="This textarea has a limit of 225 chars." v-model="body"></textarea>
	            <input class="btn btn-primary waves-effect waves-light" value="submit" type="submit">
	        </form>
	        </div>            
	    </div>
	</div>
	
</template>
<script>

    export default {
    	props:['videoId'],
    	components: {
    	},
    	data(){
    		return{
    			body:''
    		}
    	},
    	created() {
    	},
    	methods: {
    		createComments(){
    			axios.get('api/video/comments',{'video_id':this.videoId,'body':this.body}).then((response)=>{
    				this.comments = response.data
    			});
    		}

    	}
}
</script>
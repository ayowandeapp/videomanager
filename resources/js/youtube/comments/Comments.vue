<template>
	<div class="container">
		<div class="row">
			<div class="card">
			    <div class="card-body">

			        <div class="m-t-20">
			        	<form method="post" @submit.prevent="createComments()">
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


			<div class="col-lg-12" v-for="comment in comments">
                <div class="card text-white bg-dark">
                    <div class="card-body">
                    	<h3 class="card-title font-20 mt-0">{{comment.created_at}}</h3>
                        <p class="card-text">{{comment.body}}</p>
                        <a href="#" class="btn btn-danger">Button</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card text-white bg-dark">
                    <div class="card-body">
                        <h3 class="card-title font-20 mt-0">Special title treatment</h3>
                        <p class="card-text">With supporting text below as a natural lead-in to
                            additional content.</p>
                        <a href="#" class="btn btn-danger">Button</a>
                    </div>
                </div>
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
    			comments:[],
    			body:''

    		}
    	},
    	created() {
    		this.fetchComments();
    		window.Echo.channel('comments').listen('.comment.created', event => {
    			console.log('event',event);
    			this.fetchComments();
    		})
    	},
    	methods: {
    		fetchComments(){
    			var url = window.Laravel.basePath;
    			axios.get(url+'api/video/comments/'+this.videoId).then((response)=>{
    				//console.log(response.data);
    				this.comments = response.data.data;

    			});
    		},
    		createComments(){
    			var url = window.Laravel.basePath;
    			//alert(this.videoId + this.body);
    			axios.post(url+'api/video/comments',{ videoId:this.videoId, body:this.body }).then(response=>{
    				this.body='';
    				//console.log(response.data);
    				this.fetchComments();
    			});
    		}

    	}
}
</script>
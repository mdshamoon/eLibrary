<template>
   
    <div class="row no-gutters">
        
            <div class="col-md-4 text-center text-md-left mt-2 mt-sm-0">
            <img :src="public_path+'images/cover/'+book.cover" class="img img-fluid" alt="" style="max-height:250px">
            </div>
            <div class="col-md-8">
                <div class="card-body text-center text-md-left">
                    <h5 class="card-title">{{book.name}}</h5>
                    <p class="card-text">Author: {{book.author}}</p>
                    <p class="card-text"><small class="text-muted">Genres: {{book.genre}}</small></p>
                    <p class="card-text">Quantity: {{book.quantity}}</p>
                    <div class="text-center text-md-left">
                     <a v-if="book.user_id==null" href="javascript:void(0)"  class="badge badge-primary  bookNotRead" @click="markRead">
                        Click to mark as read</a>
                        
                    <a v-else href="javascript:void(0)" class="badge badge-success readBook" @click="markRead">
                        <i class="fa fa-check"></i> Read this book
                    </a>
                    </div>
                    
                            
                   
                </div>
            </div>
            
  </div>


                   
                                               

</template>

<script>


export default {
    mounted(){
 
    },
  
 
    props:{
        book:{
            type:Object,
            required:true,
        }
    },
    methods:{
        markRead: function(){
            var self=this;
            console.log('here');
            axios.post( this.$route, {
                id: this.book.id
                    
                })
                .then(function (response) {
                    console.log(response)
                    if(response.data=="attached")
                    self.book.user_id="0";
                    else
                    self.book.user_id=null;
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    }
    
}
</script>
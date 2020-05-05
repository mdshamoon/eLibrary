<template>
<div class="card shadow mb-4" >
            <div class="card-header py-3">
                <h6 class="h4 m-0 font-weight-bold text-primary">Books</h6>
            </div>
            <div class="card-body row" >
               
                
                
                <div class=" mb-4 col-md-6 col-sm-6 booklist" v-for="book in pagedbook" :key="book.name" >
                    <div class="card">
   
       <Card :book="book"></Card>
       </div>
       
   </div>
   <div>
   
</div>


</div>
<div class="flex ml-auto mr-4">
 <Paginate
                :page-count="books.length/4"
                :click-handler="clickCallback"
                :prev-text="'Prev'"
                :next-text="'Next'"
                :container-class="'bookslist'">

                
                </Paginate>
                </div>
</div>

                   
                                               

</template>

<script>
import Paginate from 'vuejs-paginate';
import Card from './Card.vue';
export default {
     components:{
Card,Paginate
     },

    props:{
        books:{
            type:Array,
            required:true,
        }
    },
    data(){
        return {
            pagedbook: this.books.slice(0,4)
        }
    },

    methods: {
    clickCallback: function(pageNum) {
        let start=(pageNum-1)*4;
      this.pagedbook=this.books.slice(start,start+4);
       document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0;
    }
  }
    
}
</script>

<style lang="scss" >
.bookslist {
    display: inline-block;
    padding-left: 0;
    margin: 0 0 20px 0;
    border-radius: 4px;
}
.bookslist > li {
    display: inline;
}

.bookslist > li:first-child > a, .bookslist > li:first-child > span {
    margin-left: 0;
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
}
.bookslist > li > a, .bookslist > li > span {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: #337ab7;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
}

.bookslist > .active > a, .bookslist > .active > span, .bookslist > .active > a:hover, .bookslist > .active > span:hover, .bookslist > .active > a:focus, .bookslist > .active > span:focus {
    z-index: 2;
    color: #fff;
    cursor: default;
    background-color: #337ab7;
    border-color: #337ab7;
}
.bookslist > li > a:hover, .bookslist > li > span:hover, .bookslist > li > a:focus, .bookslist > li > span:focus {
    z-index: 3;
    color: #23527c;
    background-color: #eee;
    border-color: #ddd;
}

</style>
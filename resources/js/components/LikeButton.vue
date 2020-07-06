<template>
    <div>
        
        <button class="colorbutton2 " @click="likePost"><img v-bind:src="'/img/' + likeImage"  style="max-width: 25px"></button>
    </div>
</template>

<script>
    export default {

        props: ['postId', 'liked'],

        mounted() {
            console.log('Component mounted.')
        },


        data: function(){
                return{
                    status: this.liked,
                }
        },

        methods:{
            likePost(){
                    axios.post('/like/' + this.postId )
                    .then(response => {

                        this.status = ! this.status;
                        console.log(response.data);
                    })
                    
                    .catch(errors =>{

                        if(errors.response.status == 401){
                            window.location = '/login';
                        }

                    });
            }
        },

        computed:{
            likeImage(){
                
                return (this.status) ? 'heart-iconred.png' : 'heart-iconclean.png'
            }
        },
    }
</script>

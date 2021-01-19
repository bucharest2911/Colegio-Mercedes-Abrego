new Vue({
    el:'#root',
    data:{
        id:'',
        nombre:'',
        salon:''
    },
    methods:{
       guardargrado:function(e){
           console.log('hola')
            e.preventDefault();
       }
    }
}) 
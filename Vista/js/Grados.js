const grado=new Vue({
    el:'#grado',
    data:{
        nombregrado:'',
        id_grupo:'',
        id_grado:'',
        nombre_grupo:'',
        grados:[],
        grupos:[],
        selecciongrado:'',
        selecciongrupo:'',
        salones:[]
    },
mounted(){
this.ListarGrado();
this.ListarGrupo();
this.ListarSalon();
},
    methods:{
ListarGrado(){
    fetch(' http://localhost/Colegio-Mercedes/Controlador/ControladorGrado.php',{
        
                //body:formdata,
               
            
            }).then(res=>res.json()
        
        
        )
            .then(data=>{
                console.log(data)
             
           this.grados=data
            })
},

ListarGrupo(){
    fetch(' http://localhost/Colegio-Mercedes/Controlador/ControladorGrupo.php',{
        
        //body:formdata,
       
    
    }).then(res=>res.json()


)
    .then(data=>{
        console.log(data)
     
   this.grupos=data
    })
},
AgregarGradoGrupo(e){
    const formdata=new FormData();
    formdata.append('selecciongrado',this.selecciongrado)
    formdata.append('selecciongrupo',this.selecciongrupo)
   
    fetch(' http://localhost/Colegio-Mercedes/Controlador/ControladorInsertarSalon.php',{
        method:'POST',
        body:formdata,
       
    
    }).then(res=>res.json())
    .then(data=>{
        console.log(data)
    })
    e.preventDefault();
},

ListarSalon(){
    fetch(' http://localhost/Colegio-Mercedes/Controlador/ControladorListarSalon.php',{
        
        //body:formdata,
       
    
    }).then(res=>res.json()


)
    .then(data=>{
        console.log(data)
     this.salones=data
   
    })
}


    }
})
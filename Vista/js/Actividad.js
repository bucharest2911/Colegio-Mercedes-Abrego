

Vue.component('modal', {
    template: '#modal-template'
  })




const actividad=new  Vue({
    el:'#actividad',


    data:{
   materias:[],
   detalle:'',
   materiaid:'',
   grados:[],
   grado:'',
 materiaseleccion:'',
 gradoseleccion:'',
 nombreactividad:'',
 showModal: false
   
    },
    mounted(){
   this.recuperarid()
   this.buscarMateria()
 
    },
   
    methods:{
   
   recuperarid(){
   fetch('http://localhost/Colegio-Mercedes/Controlador/ControladorSesionDocente.php').then(res=>{
       return res.text()
   }).then(data=>{
       console.log(data)
       this.materiaid=data
   })
   },

   buscarMateria(){
       console.log(this.materiaid)
       const formdata=new FormData()
       formdata.append('materia',this.materiaid)
       
       fetch(' http://localhost/Colegio-Mercedes/Controlador/ControladorBuscarMateria.php',{
        method:'POST',
        body:formdata,
       
    
    }) .then(res=>res.json())
    .then(data=>{
       this.materias=data
    data.forEach(dato=>{
 
          
        })
    })
   },

   ListarSalon(){

    const formdata=new FormData()
    formdata.append('grado',this.materiaseleccion)
    fetch(' http://localhost/Colegio-Mercedes/Controlador/ControladorBuscargrado.php  ',{
        method:'POST',
     
       body:formdata
    
    }).then(res=>res.json()


) .then(data=>{
     console.log(data)
    this.grados=data
   //this.docentes=data
    })
},

GuardarActividad(e){
    const formdata=new FormData()
    formdata.append('materiaseleccion',this.materiaseleccion)
    formdata.append('gradoseleccion',this.gradoseleccion)
    formdata.append('detalle',this.detalle)
    formdata.append('nombreactividad',this.nombreactividad)
    fetch(' http://localhost/Colegio-Mercedes/Controlador/ControladorGuardarActividad.php  ',{
        method:'POST',
     
       body:formdata
    
    }).then(res=>res.json()


) .then(data=>{
     console.log(data)
  
   //this.docentes=data
    })
    this.showModal=true
    e.preventDefault()
},
CerrarSesion(){
    fetch('http://localhost/Colegio-Mercedes/Controlador/ControladorSesionDocente.php').then(res=>{
        return res.text()
    }).then(data=>{
        console.log(data)
        location.href='LoginDocentes.html'
    })
}

 

    }

}) 


 
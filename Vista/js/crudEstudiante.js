const estudiante =new Vue ({
    el:'#estudiante',

    data:{
        nombreestudiante:'',
        apellidoestudiante:'',
        correoestudiante:'',
        email:'',
        contraseña:'',
        tipo_identificacion:'',
        tipoidestudiante:'',
        tipoidacudiente:'',
        numeroid:'',
        nombreacudiente:'',
        idacudiente:'',
        cedulaestudiante:'',
        apellidoacudiente:'',
        emailacudiente:'',
        selecciontipo:'',
        contraseñaestudiante:'',
        selecciontipoacudiente:'',
        tipo_estudiante:4,
        tipo_acudiente:2,
        cedulacudiente:'',
        contraseñacudiente:'',
        grados:'',
        gradoseleccion:''
       
        


    },
mounted(){
    this.ListarSalon()
console.log(this.nombreacudiente)
},
    methods:{
        buscaracudiente(){
            const formdata=new FormData();
            formdata.append('acudiente',this.idacudiente)
            
          
            fetch(' http://localhost/Colegio-Mercedes/Controlador/ControladorBuscarAcudiente.php',{
               method:'POST',
               body:formdata,
              
           
           }) .then(res=>res.json())
           .then(data=>{
               console.log(data.forEach(dato=>{
                   console.log(dato.nombre)

                   this.nombreacudiente=dato.nombre
                   this.apellidoacudiente=dato.apellido
                   this.contraseñacudiente=dato.contraseña
                   this.cedulacudiente=dato.numero_identificacion
                   this.emailacudiente=dato.email
               }))
           })
},


ListarSalon(){
    fetch(' http://localhost/Colegio-Mercedes/Controlador/ControladorListarSalon.php  ',{
        method:'POST',
     
       
    
    }).then(res=>res.json()


) .then(data=>{
     console.log(data)
   this.grados=data
   //this.docentes=data
    })
},

Limpiar(){
    this.tipo_identificacion='',
    this.tipoidestudiante='',
    this.tipoidacudiente='',
    this.numeroid='',
    this.nombreacudiente='',
    this.idacudiente='',
    this.cedulaestudiante='',
    this.apellidoacudiente='',
    this.emailacudiente='',
    this.selecciontipo='',
    this.contraseñaestudiante='',
    this.selecciontipoacudiente=''





   
},


Guardar(e){
    const formdata=new FormData();
    formdata.append('nombreestudiante',this.nombreestudiante)
    formdata.append('apellidoestudiante',this.apellidoestudiante)

    formdata.append('cedulaestudiante',this.cedulaestudiante)
    formdata.append('tipoidestudiante',this.tipoidestudiante)
    formdata.append('correoestudiante',this.correoestudiante)
    formdata.append('contraseñaestudiante',this.contraseñaestudiante)
    formdata.append('acudiente',this.idacudiente)
    formdata.append('gradogrupo',this.gradoseleccion)
    fetch(' http://localhost/Colegio-Mercedes/Controlador/ControladorEstudiante.php',{
        method:'POST',
        body:formdata,
       
    
    }).then(res=>res.json())
    .then(data=>{
        console.log(data)
     
        

    })
  
    e.preventDefault();



},

GuardarAcudiente(e){
    const formdata=new FormData();
    formdata.append('nombreacudiente',this.nombreacudiente)
    formdata.append('apellidoacudiente',this.apellidoacudiente)
    formdata.append('correoacudiente',this.emailacudiente)
    formdata.append('tipoidacudiente',this.selecciontipoacudiente)
    formdata.append('cedulaacudiente',this.idacudiente)
    formdata.append('contraseñaacudiente',this.contraseñacudiente)
    fetch(' http://localhost/Colegio-Mercedes/Controlador/ControladorGuardarAcudiente.php',{
        method:'POST',
        body:formdata,
       
    
    }).then(res=>res.json())
    .then(data=>{
        console.log(data)
     
        

    })
  
    e.preventDefault();
}







    },

   

})